<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Http\Requests\StoreRentalRequest;
use App\Http\Requests\UpdateRentalRequest;
use App\Models\Car;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pinjam-mobil.index', ['cars' => Car::where('available', true)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id, Request $request)
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store($id, Request $request)
    {
        $car = Car::find($id);

        if (!$car) {
            return redirect()->route('pinjam-mobil')->with('error', 'Mobil tidak ditemukan.');
        }

        $user_id = auth()->user()->id;

        // Ambil tanggal mulai dan berakhir dari parameter URL atau berikan nilai default jika tidak ada
        $startDate = $request->input('start_date', now());
        $endDate = $request->input('end_date', now()->addDay());

        // Lakukan validasi tanggal berakhir sesuai kebutuhan (contoh: minimal 1 hari dari tanggal mulai)
        if ($endDate <= $startDate) {
            return redirect()->route('pinjam-mobil')->with('error', 'Tanggal berakhir tidak valid.');
        }

        // Lakukan operasi update pada mobil
        $car->update([
            'available' => false,
        ]);

        // Buat data Rental
        Rental::create([
            'user_id' => $user_id,
            'car_id' => $id,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'rental_status' => 'Success',
        ]);

        return redirect()->route('pinjam-mobil')->with('message', 'Mobil berhasil disewa!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rental $rental)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rental $rental)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRentalRequest $request, Rental $rental)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rental $rental)
    {
        //
    }
}
