<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'APP_NAME' => 'Global Comics',
            'MAIL_USERNAME' => 'global.comics.no.reply@gmail.com',
            'STORAGE_PATH' => 'public/site/upload/',
            'CAPTCHA_KEY' => "6Lch3rUUAAAAALd1R2-B5Q01W-R2l6BMXdtyDkRS",
            'CAPTCHA_SECRET' => "6Lch3rUUAAAAALfX-Q2kF4TstYl3MY8T8puvnlcu",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
