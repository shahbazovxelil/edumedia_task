<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(100)->create();
        DB::table('users')->insert([
            'name' => 'Admin Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => 11111111,
            'role' => 'admin',
            'password' => Hash::make('123456')
        ]);

    }
}
