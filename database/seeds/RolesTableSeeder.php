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

                'create_manga' => false,
                'view_manga' => false,
                'update_manga' => false,
                'delete_manga' => false,

                'create_group' => false,
                'view_group' => false,
                'update_group' => false,
                'delete_group' => false,

                'create_user' => false,
                'view_user' => false,
                'update_user' => false,
                'delete_user' => false,

                'add_copyright' => false,
                'view_settings' => false,
                'assign_task' => false,

                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ],
            [
                'id' => "2",
                'role_name' => "Super Moderator",

                'create_manga' => false,
                'view_manga' => false,
                'update_manga' => false,
                'delete_manga' => false,

                'create_group' => false,
                'view_group' => false,
                'update_group' => false,
                'delete_group' => false,

                'create_user' => false,
                'view_user' => false,
                'update_user' => false,
                'delete_user' => false,

                'add_copyright' => false,
                'view_settings' => false,
                'assign_task' => false,

                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ],
            [
                'id' => "3",
                'role_name' => "Moderator",

                'create_manga' => false,
                'view_manga' => false,
                'update_manga' => false,
                'delete_manga' => false,

                'create_group' => false,
                'view_group' => false,
                'update_group' => false,
                'delete_group' => false,

                'create_user' => false,
                'view_user' => false,
                'update_user' => false,
                'delete_user' => false,

                'add_copyright' => false,
                'view_settings' => false,
                'assign_task' => false,

                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ],
            [
                'id' => "4",
                'role_name' => "Group Leader",

                'create_manga' => false,
                'view_manga' => false,
                'update_manga' => false,
                'delete_manga' => false,

                'create_group' => false,
                'view_group' => false,
                'update_group' => false,
                'delete_group' => false,

                'create_user' => false,
                'view_user' => false,
                'update_user' => false,
                'delete_user' => false,

                'add_copyright' => false,
                'view_settings' => false,
                'assign_task' => false,

                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ],
            [
                'id' => "5",
                'role_name' => "Group Member",

                'create_manga' => false,
                'view_manga' => false,
                'update_manga' => false,
                'delete_manga' => false,

                'create_group' => false,
                'view_group' => false,
                'update_group' => false,
                'delete_group' => false,

                'create_user' => false,
                'view_user' => false,
                'update_user' => false,
                'delete_user' => false,

                'add_copyright' => false,
                'view_settings' => false,
                'assign_task' => false,

                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ],
            [
                'id' => "99",
                'role_name' => "Admin",

                'create_manga' => true,
                'view_manga' => true,
                'update_manga' => true,
                'delete_manga' => true,

                'create_group' => true,
                'view_group' => true,
                'update_group' => true,
                'delete_group' => true,

                'create_user' => true,
                'view_user' => true,
                'update_user' => true,
                'delete_user' => true,

                'add_copyright' => true,
                'view_settings' => true,
                'assign_task' => true,

                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
