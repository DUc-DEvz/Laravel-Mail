<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * User roles:
     * - Use the constant ROLE_ADMIN to designate an administrator.
     * - Use the constant ROLE_USER to designate a regular user.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    'username'   => 'admin',
                    'email' => 'admin@example.com',
                    'email_verified_at' => Carbon::now(),
                    'role'              => User::ROLE_ADMIN,
                    'password'          => Hash::make('password123'),
                    'remember_token'    => null,
                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now(),
                ],
                [
                    'username'          => 'user1',
                    'email'             => 'user1@example.com',
                    'email_verified_at' => Carbon::now(),
                    'role'              => User::ROLE_USER,
                    'password'          => Hash::make('password123'),
                    'remember_token'    => null,
                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now(),
                ],
                [
                    'username'          => 'user2',
                    'email'             => 'user2@example.com',
                    'email_verified_at' => Carbon::now(),
                    'role'              => User::ROLE_USER,
                    'password'          => Hash::make('password123'),
                    'remember_token'    => null,
                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now(),
                ],
            ]
        );
    }
}
