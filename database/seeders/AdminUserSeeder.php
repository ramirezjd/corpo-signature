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
            'primer_nombre_usuario' => 'Administrador',
            'segundo_nombre_usuario' => 'Master',
            'primer_apellido_usuario' => 'Corposalud',
            'segundo_apellido_usuario' => 'Firmas',
            'documento_usuario' => 'V-12345678',
            'email' => 'admin@corposaludfirmas.com',
            'password' => bcrypt('corpoAdmin001'),
            'departamento_id' => 1,
        ]);

        $testUser = User::create([
            'primer_nombre_usuario' => 'Usuario',
            'segundo_nombre_usuario' => 'De',
            'primer_apellido_usuario' => 'Pruebas',
            'segundo_apellido_usuario' => 'Varias',
            'documento_usuario' => 'V-87654321',
            'email' => 'test@corposaludfirmas.com',
            'password' => bcrypt('corpoAdmin001'),
            'departamento_id' => 2,
        ]);

        $testUser2 = User::create([
            'primer_nombre_usuario' => 'Fulanito',
            'segundo_nombre_usuario' => 'DeTal',
            'primer_apellido_usuario' => 'Sandy',
            'segundo_apellido_usuario' => 'Papo',
            'documento_usuario' => 'V-11223344',
            'email' => 'test2@corposaludfirmas.com',
            'password' => bcrypt('corpoAdmin001'),
            'departamento_id' => 2,
        ]);
    }
}
