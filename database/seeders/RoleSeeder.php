<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name'=>'Admin']);
        $role->permissions()->attach([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]);

        $role = Role::create(['name'=>'Instructor']);
        $role->syncPermissions(['Leer cursos', 'Actualizar cursos']);

        $role = Role::create(['name'=>'Alumno']);
        $role->syncPermissions(['Leer cursos']);

    }
}
