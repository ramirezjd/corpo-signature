<?php

namespace Database\Seeders;
use App\Models\Status;

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'nombre_status' => "Pendiente",
            'descripcion_status' => "El documento esta pendiente por una o mas aprobaciones de firma",
        ]);
        
        Status::create([
            'nombre_status' => "Aprobado",
            'descripcion_status' => "El documento fue aprobado por todos los firmantes",
        ]);
    }
}
