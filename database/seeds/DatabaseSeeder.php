<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->call(RolesTableSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(PositionTableSeeder::class);
        
    }
}