<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = User::create([
            'nombres_usuario' => 'Administrador Master',
            'apellidos_usuario' => 'Corposalud Firmas',
            'documento_usuario' => 'V-21003727',
            'email' => 'admin@corposaludfirmas.com',
            'password' => bcrypt('corpoAdmin001'),
            'departamento_id' => 1,
        ]);

        $testUser = User::create([
            'nombres_usuario' => 'Administrador Master',
            'apellidos_usuario' => 'Corposalud Firmas',
            'documento_usuario' => 'V-21003727',
            'email' => 'test@corposaludfirmas.com',
            'password' => bcrypt('corpoAdmin001'),
            'departamento_id' => 2,
        ]);
    }
}
