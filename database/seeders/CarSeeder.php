<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = [
            ['brand' => 'Toyota', 'model' => 'Avanza', 'plate_number' => 'B 1234 CD', 'rental_rate_per_day' => 200000, 'available' => true],
            ['brand' => 'Honda', 'model' => 'Jazz', 'plate_number' => 'D 5678 EF', 'rental_rate_per_day' => 250000, 'available' => true],
            ['brand' => 'Suzuki', 'model' => 'Ertiga', 'plate_number' => 'F 9101 GH', 'rental_rate_per_day' => 220000, 'available' => true],
            ['brand' => 'Nissan', 'model' => 'Grand Livina', 'plate_number' => 'A 2345 BC', 'rental_rate_per_day' => 230000, 'available' => true],
            ['brand' => 'Mitsubishi', 'model' => 'Xpander', 'plate_number' => 'E 6789 JK', 'rental_rate_per_day' => 270000, 'available' => true],
            ['brand' => 'Daihatsu', 'model' => 'Sigra', 'plate_number' => 'C 3456 DE', 'rental_rate_per_day' => 190000, 'available' => true],
            ['brand' => 'Ford', 'model' => 'EcoSport', 'plate_number' => 'G 7890 LM', 'rental_rate_per_day' => 260000, 'available' => true],
        ];

        // Iterasi dan masukkan data mobil ke dalam tabel
        foreach ($cars as $carData) {
            Car::create($carData);
        }
    }
}
