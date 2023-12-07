<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Rental;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('manage-mobil.index', ['cars' => Car::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'plate_number' => 'required|string|max:255',
            'rental_rate_per_day' => 'required|numeric',
        ]);

        // Simpan data mobil baru
        Car::create([
            'brand' => $request->input('brand'),
            'model' => $request->input('model'),
            'plate_number' => $request->input('plate_number'),
            'rental_rate_per_day' => $request->input('rental_rate_per_day'),
            'available' => true,
        ]);

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('manage-mobil')->with('success', 'Mobil berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Car::where('id', $id)->update([
            'brand' => $request->input('brand'),
            'model' => $request->input('model'),
            'plate_number' => $request->input('plate_number'),
            'rental_rate_per_day' => $request->input('rental_rate_per_day'),
            'available' => $request->has('available'), // Centang checkbox mengirimkan nilai true
        ]);

        return redirect()->route('manage-mobil')->with('success', 'Mobil berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Hapus relasi di tabel rentals
        Rental::where('car_id', $id)->delete();

        // Hapus mobil dari tabel cars
        Car::destroy($id);

        return redirect()->route('manage-mobil')->with('success', 'Mobil berhasil dihapus.');
    }
}
