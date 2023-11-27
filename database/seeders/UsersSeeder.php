<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Add Users
         *
         */
        if (User::where('email', '=', 'admin@housemates.io')->first() === null) {

            $newUser = User::create([
                'name' => 'HouseMates',
                'email' => 'admin@housemates.io',
                'password' => bcrypt('adminadmin'),
            ]);

        }
    }
}