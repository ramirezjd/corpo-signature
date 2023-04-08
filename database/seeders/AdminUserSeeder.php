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
            'rol' => 1,
            'roleName' => 'super-admin',
            'departamento_id' => 1,
        ]);
        $adminUser->assignRole('super-admin');

        $user1 = User::create([
            'primer_nombre_usuario' => 'Usuario',
            'segundo_nombre_usuario' => 'De',
            'primer_apellido_usuario' => 'Pruebas',
            'segundo_apellido_usuario' => 'Varias',
            'documento_usuario' => 'V-87654321',
            'email' => 'test@corposaludfirmas.com',
            'password' => bcrypt('corpoAdmin001'),
            'rol' => 2,
            'roleName' => 'Supervisor General',
            'departamento_id' => 2,
        ]);
        // $user1->assignRole('Integral');
        $user1->givePermissionTo([
            'listar documento',
            'previsualizar documento',
            'ver todos documentos',
            'listar usuario',
            'ver usuario',
            'listar roles',
            'ver roles',
            'listar permisos',
            'ver permisos'
        ]);

        $user2 = User::create([
            'primer_nombre_usuario' => 'Fulanito',
            'segundo_nombre_usuario' => 'DeTal',
            'primer_apellido_usuario' => 'Sandy',
            'segundo_apellido_usuario' => 'Papo',
            'documento_usuario' => 'V-11223344',
            'email' => 'test2@corposaludfirmas.com',
            'password' => bcrypt('corpoAdmin001'),
            'rol' => 3,
            'roleName' => 'Integral',
            'departamento_id' => 2,
        ]);
        $user2->givePermissionTo([
            'listar documento',
            'crear documento',
            'firmar documento',
            'previsualizar documento',
            'ver usuario'
        ]);
        
        $user3 = User::create([
            'primer_nombre_usuario' => 'Supervisor',
            'segundo_nombre_usuario' => 'Visorsuper',
            'primer_apellido_usuario' => 'General',
            'segundo_apellido_usuario' => 'Electrics',
            'documento_usuario' => 'V-554433221',
            'email' => 'testsupervisor@corposaludfirmas.com',
            'password' => bcrypt('corpoAdmin001'),
            'rol' => 3,
            'roleName' => 'Integral',
            'departamento_id' => 2,
        ]);
        $user3->givePermissionTo([
            'listar documento',
            'crear documento',
            'firmar documento',
            'previsualizar documento',
            'ver usuario'
        ]);
    }
}
