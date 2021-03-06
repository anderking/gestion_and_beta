<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \DB::table('user_roles')->insert(array(
            'user_id'       => 1,
            'role_id'       => 1
        ));
      \DB::table('user_roles')->insert(array(
            'user_id'       => 2,
            'role_id'       => 2
        ));
      \DB::table('user_roles')->insert(array(
            'user_id'       => 3,
            'role_id'       => 3
        ));
      \DB::table('user_roles')->insert(array(
            'user_id'       => 4,
            'role_id'       => 4
        ));
      \DB::table('user_roles')->insert(array(
            'user_id'       => 5,
            'role_id'       => 5
        ));
      \DB::table('user_roles')->insert(array(
            'user_id'       => 6,
            'role_id'       => 6
        ));
      \DB::table('user_roles')->insert(array(
            'user_id'       => 7,
            'role_id'       => 7
        ));
    }
}
