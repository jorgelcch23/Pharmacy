<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pharmacy;

class PharmacySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pharmacies = [
            [
                'name' => "Farmaguti",
                "address" => "Av. Bolivar #715 entre Comercio y Manchego (Frente al mercado central)",
                "phone" => 75757502,
                "gps" => "BuF3DKPha2UizBLQ6",
                "location" => "https://maps.app.goo.gl/qdujKWkUaBunfREF6",
            ],
            [
                "name" => "Alfredo Guzma",
                "address" => "Calle Mendez Arcor S/N",
                "phone" => 73158308,
                "gps" => "BuF3DKPha2UizBLQ6",
                "location" => "https://maps.app.goo.gl/qdujKWkUaBunfREF6",
            ],
            [
                "name" => "Mustafa",
                "address" => "Av. Humber Suarez Roca a lado de colchone maxiking",
                "phone" => 73158308,
                "gps" => "BuF3DKPha2UizBLQ6",
                "location" => "https://maps.app.goo.gl/qdujKWkUaBunfREF6",
            ]
        ];

        foreach ($pharmacies as $pharmacy) {
            Pharmacy::create([
                'name' => $pharmacy['name'],
                'address' => $pharmacy['address'],
                'phone' => $pharmacy['phone'],
                'gps' => $pharmacy['gps'],
                'location' => $pharmacy['location']
            ]);
        }
    }
}