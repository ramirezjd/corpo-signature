<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //Documents related
        Permission::create(['name' => 'listar documento']);
        Permission::create(['name' => 'crear documento']);
        Permission::create(['name' => 'ver documento']);
        Permission::create(['name' => 'editar documento']);
        Permission::create(['name' => 'firmar documento']);
        Permission::create(['name' => 'previsualizar documento']);
        Permission::create(['name' => 'descargar documento']);
        Permission::create(['name' => 'ver todos documentos']);

        //Usuario related
        Permission::create(['name' => 'listar usuario']);
        Permission::create(['name' => 'crear usuario']);
        Permission::create(['name' => 'ver usuario']);
        Permission::create(['name' => 'editar usuario']);
        Permission::create(['name' => 'borrar usuario']);

        //Role related
        Permission::create(['name' => 'listar roles']);
        Permission::create(['name' => 'crear roles']);
        Permission::create(['name' => 'ver roles']);
        Permission::create(['name' => 'editar roles']);
        Permission::create(['name' => 'borrar roles']);

        //Permission related
        Permission::create(['name' => 'listar permisos']);
        Permission::create(['name' => 'ver permisos']);
        Permission::create(['name' => 'editar permisos']);

        //Departamento related
        Permission::create(['name' => 'listar departamento']);
        Permission::create(['name' => 'crear departamento']);
        Permission::create(['name' => 'ver departamento']);
        Permission::create(['name' => 'editar departamento']);
        Permission::create(['name' => 'borrar departamento']);

        //Cabecera related
        Permission::create(['name' => 'listar cabecera']);
        Permission::create(['name' => 'crear cabecera']);
        Permission::create(['name' => 'ver cabecera']);
        Permission::create(['name' => 'editar cabecera']);
        Permission::create(['name' => 'borrar cabecera']);

        $role = Role::create(['name' => 'super-admin']);
        $role->syncPermissions(Permission::all());
        
        $role = Role::create(['name' => 'Supervisor General']);
        $role->givePermissionTo(
            [
                'listar documento',
                'previsualizar documento',
                'ver todos documentos',
                'listar usuario',
                'ver usuario',
                'listar roles',
                'ver roles',
                'listar permisos',
                'ver permisos'
            ]
        );

        $role = Role::create(['name' => 'Integral']);
        $role->givePermissionTo(
            [
                'listar documento',
                'crear documento',
                'firmar documento',
                'previsualizar documento',
                'ver usuario'
            ]
        );

        $role = Role::create(['name' => 'Firmante']);
        $role->givePermissionTo(
            [
                'listar documento',
                'firmar documento',
                'previsualizar documento',
                'ver usuario'
            ]
        );

        $role = Role::create(['name' => 'Solicitante']);
        $role->givePermissionTo(
            [
                'listar documento',
                'crear documento',
                'previsualizar documento',
                'ver usuario'
            ]
        );      
    }
}
