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
            'documento_usuario' => 'V-12345678',
            'email' => 'admin@corposaludfirmas.com',
            'password' => bcrypt('corpoAdmin001'),
            'departamento_id' => 1,
        ]);

        $testUser = User::create([
            'nombres_usuario' => 'Usuario De',
            'apellidos_usuario' => 'Pruebas Varias',
            'documento_usuario' => 'V-87654321',
            'email' => 'test@corposaludfirmas.com',
            'password' => bcrypt('corpoAdmin001'),
            'departamento_id' => 2,
        ]);

        $testUser2 = User::create([
            'nombres_usuario' => 'Fulanito DeTal',
            'apellidos_usuario' => 'Sandy Papo',
            'documento_usuario' => 'V-11223344',
            'email' => 'test2@corposaludfirmas.com',
            'password' => bcrypt('corpoAdmin001'),
            'departamento_id' => 2,
        ]);
    }
}
