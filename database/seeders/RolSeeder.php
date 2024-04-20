<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Tecnico']);
        $role2 = Role::create(['name' => 'General']);

        Permission::create(['name' => 'tecnico.raza.home'])->syncRoles([$role1,$role2]);
    }
}
