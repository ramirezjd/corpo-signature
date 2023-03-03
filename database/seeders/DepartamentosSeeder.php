<?php

namespace Database\Seeders;
use App\Models\Departamento;

use Illuminate\Database\Seeder;

class DepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $departamentoAdmin = Departamento::create([
            'nombre_departamento' => 'Departamento Administrador',
            'codigo_departamento' => 'admin123',
            'descripcion_departamento' => 'Departamento no seleccionable, unicamente con el proposito de servir al usuario master. No borrar',
        ]);

        $departamentoTest = Departamento::create([
            'nombre_departamento' => 'Departamento de Prueba',
            'codigo_departamento' => 'abc321',
            'descripcion_departamento' => 'Departamento de prueba, con funcion de prueba',
        ]);
    }
}
