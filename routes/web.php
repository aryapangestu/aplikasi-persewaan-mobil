<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\RentalReturnController;
use App\Models\Rental;
use App\Models\RentalReturn;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('/dashboard', function () {
        $userType = auth()->user()->user_type;

        if ($userType === 'admin') {
            return view('dashboards.admin');
        } elseif ($userType === 'customer') {
            // Get the currently authenticated user
            $user = auth()->user();
            $rentedReturnIds = RentalReturn::all()->pluck('rental_id')->toArray();
            // Retrieve rental returns associated with the user
            $rentals = Rental::where('user_id', $user->id)->where('rental_status', 'Completed')->whereIn('id', $rentedReturnIds)->get();

            return view('dashboards.user', ['rentals' => $rentals]);
        } else {
            // Tambahkan tindakan sesuai kebutuhan jika tipe pengguna tidak sesuai
            abort(403, 'Unauthorized');
        }
    })->name('dashboard');

    Route::middleware(['check.user.type:customer'])->group(function () {

        Route::get('pinjam-mobil', [RentalController::class, 'index'])->name('pinjam-mobil');
        Route::get('/sewa/{id}', [RentalController::class, 'store'])->name('sewa.create');

        Route::get('balik-mobil', [RentalReturnController::class, 'index'])->name('balik-mobil');
        Route::get('/balik/{id}', [RentalReturnController::class, 'store'])->name('balik.create');

        Route::get('/profile', function () {
            return view('profil.index');
        })->name('profiles.index');
    });

    Route::middleware(['check.user.type:admin'])->group(function () {
        Route::get('manage-mobil', [CarController::class, 'index'])->name('manage-mobil');
        Route::post('manage-mobil', [CarController::class, 'store'])->name('manage-mobil.create');
        Route::delete('manage-mobil-del/{id}', [CarController::class, 'destroy'])->name('manage-mobil.delete');
        Route::put('manage-mobil-put/{id}', [CarController::class, 'update'])->name('manage-mobil.edit');
    });
});

Route::get('/', function () {
    return to_route('login');
});
