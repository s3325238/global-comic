<?php

use Illuminate\Database\Seeder;

class UniqueLengthTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unique_lengths')->insert([
            [
                'video_length' => 40,
                'chapter_length' => 40,
                'manga_length' => 40,
                'role_length' => 40,
                'random_array' => '[99]',
                'random_number' => 99,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
