<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(DepartamentosSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(FirmasSeeder::class);
        $this->call(CabeceraSeeder::class);
        $this->call(StatusSeeder::class);
    }
}
