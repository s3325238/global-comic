<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [[
                'name' => 'Super Admin',
                'email' => 'admin@gmail.com',
                'language' => 'en',
                'password' => '$2y$10$3B4Xw.mY9DtpkTOsczTjyeWJM42Tr8N7gVIgEHfT9pxJjS5gn/MAC', // password 123456
                'verifyToken' => null,
                'status' => 1,
                'avatar' => 'default-avatar.png',
                'role_id' => '99',

                'remember_token' => Str::random(60),
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Vietnamese Guest',
                'email' => 'vietnamese@gmail.com',
                'language' => 'vi',
                'password' => '$2y$10$3B4Xw.mY9DtpkTOsczTjyeWJM42Tr8N7gVIgEHfT9pxJjS5gn/MAC', // password 123456
                'verifyToken' => null,
                'status' => 1,
                'avatar' => 'default-avatar.png',
                'role_id' => '1',

                'remember_token' => Str::random(60),
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'English Guest',
                'email' => 'english@gmail.com',
                'language' => 'en',
                'password' => '$2y$10$3B4Xw.mY9DtpkTOsczTjyeWJM42Tr8N7gVIgEHfT9pxJjS5gn/MAC', // password 123456
                'verifyToken' => null,
                'status' => 1,
                'avatar' => 'default-avatar.png',
                'role_id' => '1',

                'remember_token' => Str::random(60),
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Japanese Guest',
                'email' => 'japanese@gmail.com',
                'language' => 'jp',
                'password' => '$2y$10$3B4Xw.mY9DtpkTOsczTjyeWJM42Tr8N7gVIgEHfT9pxJjS5gn/MAC', // password 123456
                'verifyToken' => null,
                'status' => 1,
                'avatar' => 'default-avatar.png',
                'role_id' => '1',

                'remember_token' => Str::random(60),
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Korean Guest',
                'email' => 'korean@gmail.com',
                'language' => 'kr',
                'password' => '$2y$10$3B4Xw.mY9DtpkTOsczTjyeWJM42Tr8N7gVIgEHfT9pxJjS5gn/MAC', // password 123456
                'verifyToken' => null,
                'status' => 1,
                'avatar' => 'default-avatar.png',
                'role_id' => '1',

                'remember_token' => Str::random(60),
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Super Moderator',
                'email' => 'moderator@gmail.com',
                'language' => 'en',
                'password' => '$2y$10$3B4Xw.mY9DtpkTOsczTjyeWJM42Tr8N7gVIgEHfT9pxJjS5gn/MAC', // password 123456
                'verifyToken' => null,
                'status' => 1,
                'avatar' => 'default-avatar.png',
                'role_id' => '2',

                'remember_token' => Str::random(60),
                'created_at' => now(),
                'updated_at' => now(),
            ]]);
    }
}
