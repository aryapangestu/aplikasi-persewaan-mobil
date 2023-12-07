<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Car;
use App\Models\Rental;
use App\Models\RentalReturn;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // User::factory()->count(5)->create();

        User::factory()->create([
            'name' => 'Arya Pangestu',
            'email' => 'customer@example.com',
            'address' => 'Alamat Customer',
            'phone_number' => '081234567890',
            'driving_license_number' => 'DL123456',
            'password' => Hash::make('password'),
        ]);
        $this->call(CarSeeder::class);
        Rental::factory()->count(5)->create();
        RentalReturn::factory()->count(5)->create();

        User::factory()->create([
            'name' => 'Arya Admin',
            'email' => 'admin@example.com',
            'address' => 'Alamat Admin',
            'phone_number' => '081234567891',
            'driving_license_number' => 'DL789012',
            'password' => Hash::make('password'),
            'user_type' => 'admin',
        ]);
    }
}
