<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Kathe',
            'email' => 'kathe@gmail.com',
            'password' => bcrypt('1234')
        ])->assignRole('Tecnico');
        
        // Crea 9 usuarios adicionales usando la fábrica
        User::factory(9)->create();
    }
}
