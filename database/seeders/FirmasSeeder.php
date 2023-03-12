<?php

namespace Database\Seeders;
use App\Models\Firma;

use Illuminate\Database\Seeder;

class FirmasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Firma::create([
            'user_id' => 1,
            'img_path' => 'public/signatures/firmaadmin.png'
        ]);

        Firma::create([
            'user_id' => 2,
            'img_path' => 'public/signatures/firmaprueba.png'
        ]);

        Firma::create([
            'user_id' => 3,
            'img_path' => 'public/signatures/firmaprueba2.png'
        ]);
    }
}
