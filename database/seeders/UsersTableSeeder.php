<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // You can adjust the number of users you want to seed
        $numberOfUsers = 10;

        for ($i = 0; $i < $numberOfUsers; $i++) {
            User::create([
                'name' => 'User' . ($i + 1),
                'email' => 'user' . ($i + 1) . '@example.com',
                'password' => Hash::make('password'), // You may want to change this to something more secure
            ]);
        }
    }
}
