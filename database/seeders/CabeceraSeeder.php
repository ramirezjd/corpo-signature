<?php

namespace Database\Seeders;

use App\Models\Cabecera;
use Illuminate\Database\Seeder;

class CabeceraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cabecera::create([
            'nombre_cabecera' => 'Primera cabecera',
            'cuerpo_cabecera' => 'Primera linea que deberia ser CORPOSALUD
            Segunda linea que deberia ser algo mas
            Tercera linea que es algo como SEDE SAN CRISTOBAL
            Cuarta Linea: SAN CRISTOBAL, TACHIRA, VENEZUELA',
            'img_path' => 'public/logos/9LZm42nGw3Xlhre2umWB8sAU3H5Wi4Hp2nVN5uwq.jpg',
        ]);
    }
}
