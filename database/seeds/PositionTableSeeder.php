<?php

use Illuminate\Database\Seeder;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            [
                'name' => 'Translator',
                'badge' => 'primary'
            ],
            [
                'name' => 'Type Setter',
                'badge' => 'info'
            ],
            [
                'name' => 'Cleaner',
                'badge' => 'success'
            ],
        ]);
    }
}
