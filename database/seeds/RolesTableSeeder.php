<?php

//use Illuminate\Database\Seeder;
//use TCG\Voyager\Models\Role;


use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    /*public function run()
    {
        $role = Role::firstOrNew(['name' => 'admin']);
        if (!$role->exists) {
            $role->fill([
                    'display_name' => __('voyager::seeders.roles.admin'),
                ])->save();
        }

        $role = Role::firstOrNew(['name' => 'user']);
        if (!$role->exists) {
            $role->fill([
                    'display_name' => __('voyager::seeders.roles.user'),
                ])->save();
        }
    }*/

    public function run()
    {
        DB::table('roles')->insert([
            "name" => "admin",
            "display_name" => "Administrador",
            'created_at'    => Carbon\Carbon::now(),
            'updated_at'    => Carbon\Carbon::now()
        ]);
        DB::table('roles')->insert([
            "name" => "estudiante",
            "display_name" => "Estudiante",
            'created_at'    => Carbon\Carbon::now(),
            'updated_at'    => Carbon\Carbon::now()
        ]);
        DB::table('roles')->insert([
            "name" => "docente",
            "display_name" => "Docente",
            'created_at'    => Carbon\Carbon::now(),
            'updated_at'    => Carbon\Carbon::now()
        ]);
        DB::table('roles')->insert([
            "name" => "secretario",
            "display_name" => "Secretario",
            'created_at'    => Carbon\Carbon::now(),
            'updated_at'    => Carbon\Carbon::now()
        ]);
        DB::table('roles')->insert([
            "name" => "directoradm",
            "display_name" => "Director Administrativo",
            'created_at'    => Carbon\Carbon::now(),
            'updated_at'    => Carbon\Carbon::now()
        ]);
        DB::table('roles')->insert([
            "name" => "directorpro",
            "display_name" => "Director de Programa",
            'created_at'    => Carbon\Carbon::now(),
            'updated_at'    => Carbon\Carbon::now()
        ]);
        DB::table('roles')->insert([
            "name" => "encargadoserv",
            "display_name" => "Encargado de Servicio",
            'created_at'    => Carbon\Carbon::now(),
            'updated_at'    => Carbon\Carbon::now()
        ]);
    }
}
