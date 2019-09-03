<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id' => "1",
                'role_name' => "Viewers",
                
                'create_group' => false,
                'view_group' => false,
                'update_group' => false,
                'delete_group' => false,

                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ],
            [
                'id' => "2",
                'role_name' => "Super Moderator",
                
                'create_group' => false,
                'view_group' => false,
                'update_group' => false,
                'delete_group' => false,

                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ],
            [
                'id' => "3",
                'role_name' => "Moderator",

                'create_group' => false,
                'view_group' => false,
                'update_group' => false,
                'delete_group' => false,

                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ],
            [
                'id' => "4",
                'role_name' => "Group Leader",

                'create_group' => false,
                'view_group' => false,
                'update_group' => false,
                'delete_group' => false,

                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ],
            [
                'id' => "5",
                'role_name' => "Group Member",

                'create_group' => false,
                'view_group' => false,
                'update_group' => false,
                'delete_group' => false,
                
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ],
            [
                'id' => "99",
                'role_name' => "Admin",

                'create_group' => true,
                'view_group' => true,
                'update_group' => true,
                'delete_group' => true,

                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
