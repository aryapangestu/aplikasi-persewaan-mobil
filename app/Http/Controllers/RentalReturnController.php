<?php

namespace App\Http\Controllers;

use App\Models\RentalReturn;
use App\Http\Requests\StoreRentalReturnRequest;
use App\Http\Requests\UpdateRentalReturnRequest;
use App\Models\Car;
use App\Models\Rental;

class RentalReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $rentals = Rental::where('user_id', $user->id)
            ->where('rental_status', 'Success')
            ->get();

        return view('balik-mobil.index', ['rentals' => $rentals]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id)
    {
        $rental = Rental::find($id);
        $car = Car::find($rental->car_id);

        if (!$rental) {
            return redirect()->route('balik-mobil')->with('error', 'Rental tidak ditemukan.');
        }

        $returnDate = now();
        $startDate = $rental->start_date;

        // Menghitung selisih hari antara tanggal pengembalian dan tanggal sewa
        $rentalDays = max($returnDate->diffInDays($startDate), 1);

        // Menghitung biaya berdasarkan tarif harian dan jumlah hari sewa
        $rentalFee = $rental->car->rental_rate_per_day * $rentalDays;

        $rental->update([
            'rental_status' => "Completed",
        ]);

        $car->update([
            'available' => true,
        ]);

        RentalReturn::create([
            'rental_id' => $id,
            'return_date' => $returnDate,
            'rental_days' => $rentalDays,
            'rental_fee' => $rentalFee,
        ]);

        return redirect()->route('balik-mobil')->with('message', 'Rental berhasil dikembalikan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(RentalReturn $rentalReturn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RentalReturn $rentalReturn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRentalReturnRequest $request, RentalReturn $rentalReturn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RentalReturn $rentalReturn)
    {
        //
    }
}
