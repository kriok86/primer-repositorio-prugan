<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use function Laravel\Prompts\password;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user= User::create([
                    'name'=>'Claudio Lopez',
                    'email'=>'kriok86@gmail.com',
                    'password'=>bcrypt('12345678'),
                ]);
        $user->assignRole('Admin');

        User::factory(5)->create();
    }
}
