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
                'name' => 'Farmaguti',
                'address' => 'Av. Bolivar #715 entre Comercio y Manchego (Frente al mercado central)',
                'phone' => 75757502,
                'gps' => 'BuF3DKPha2UizBLQ6',
                'location' => 'https://maps.app.goo.gl/qdujKWkUaBunfREF6',
            ],
            [
                'name' => 'Alfredo Guzma',
                'address' => 'Calle Mendez Arcor S/N',
                'phone' => 73158308,
                'gps' => 'BuF3DKPha2UizBLQ6',
                'location' => 'https://maps.app.goo.gl/qdujKWkUaBunfREF6',
                
            ],
            [
                'name' => 'Mustafa',
                'address' => 'Av. Humber Suarez Roca a lado de colchone maxiking',
                'phone' => 69760866,
                'gps' => 'BuF3DKPha2UizBLQ6',
                'location' => 'https://maps.app.goo.gl/qdujKWkUaBunfREF6',
                
            ],
            [
                'name' => 'Farmagreen',
                'address' => 'Av. Humber Suarez Roca frente a la plazuela 21 de Diciembre',
                'phone' => 77884568,
                'gps' => 'BuF3DKPha2UizBLQ6',
                'location' => 'https://maps.app.goo.gl/qdujKWkUaBunfREF6',
                
            ],
            [
                'name' => 'Vida Nueva Camiri',
                'address' => 'Calle Tarija frente a Heladeria Baloo',
                'phone' => 73630481,
                'gps' => 'BuF3DKPha2UizBLQ6',
                'location' => 'https://maps.app.goo.gl/qdujKWkUaBunfREF6',
                
            ],
            [
                'name' => 'Heroes del Chaco',
                'address' => 'Av. Humber Suarez Roca entre Calle 8 y 9 ',
                'phone' => 65016768,
                'gps' => 'BuF3DKPha2UizBLQ6',
                'location' => 'https://maps.app.goo.gl/qdujKWkUaBunfREF6',
                
            ],
            [
                'name' => 'Zeizim',
                'address' => 'Av. Carlos Daher, Rotonda la Torre Terminal ',
                'phone' => 70925805,
                'gps' => 'BuF3DKPha2UizBLQ6',
                'location' => 'https://maps.app.goo.gl/qdujKWkUaBunfREF6',
                
            ],
            [
                'name' => 'Jesus de Narazeth',
                'address' => 'Av. Humber Suarez Roca frente al Hospital',
                'phone' => 0,
                'gps' => 'BuF3DKPha2UizBLQ6',
                'location' => 'https://maps.app.goo.gl/qdujKWkUaBunfREF6',
                
            ],
            [
                'name' => 'Sagrado Corazon',
                'address' => 'Calle Comercio entre Sucre y Bolivar',
                'phone' => 71043694,
                'gps' => 'BuF3DKPha2UizBLQ6',
                'location' => 'https://maps.app.goo.gl/qdujKWkUaBunfREF6',
                
            ],
            [
                'name' => 'Parapety',
                'address' => 'Av. Humber Suarez Roca entrada al Cementerio',
                'phone' => 76809434,
                'gps' => 'BuF3DKPha2UizBLQ6',
                'location' => 'https://maps.app.goo.gl/qdujKWkUaBunfREF6',
                
            ],
            [
                'name' => 'Farmabriana',
                'address' => 'Calle Oruro frente a Banco Bisa',
                'phone' => 69097236,
                'gps' => 'BuF3DKPha2UizBLQ6',
                'location' => 'https://maps.app.goo.gl/qdujKWkUaBunfREF6',
                
            ],
            [
                'name' => 'Lisbeth Yobana',
                'address' => 'Av. Bolivar Esq. Oruro',
                'phone' => 76809434,
                'gps' => 'BuF3DKPha2UizBLQ6',
                'location' => 'https://maps.app.goo.gl/qdujKWkUaBunfREF6',
                
            ],
            [
                'name' => 'Emanuel Shaddai',
                'address' => 'Calle Cochabamba antes de llegar a casino militar',
                'phone' => 71383586,
                'gps' => 'BuF3DKPha2UizBLQ6',
                'location' => 'https://maps.app.goo.gl/qdujKWkUaBunfREF6',
                
            ],
            [
                'name' => 'Sensano',
                'address' => 'Av. Bolivar al mercado entre C. Comercio y C. Manchego',
                'phone' => 77377345,
                'gps' => 'BuF3DKPha2UizBLQ6',
                'location' => 'https://maps.app.goo.gl/qdujKWkUaBunfREF6',
                
            ],
            [
                'name' => 'Vera Cruz',
                'address' => 'Av. Santa Cruz frente al Monumento el Chiriguano',
                'phone' => 72361098,
                'gps' => 'BuF3DKPha2UizBLQ6',
                'location' => 'https://maps.app.goo.gl/qdujKWkUaBunfREF6',
                
            ],
            [
                'name' => 'Civeraz',
                'address' => 'C. Sucre entre C. Comercio y C. Manchego',
                'phone' => 73106520,
                'gps' => 'BuF3DKPha2UizBLQ6',
                'location' => 'https://maps.app.goo.gl/qdujKWkUaBunfREF6',
                
            ],
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