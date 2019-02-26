<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departamentos')->insert([
            "nombre"        => "Departamento 1",
            "descripcion"   => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
        ]);
        DB::table('departamentos')->insert([
            "nombre"        => "Departamento 2",
            "descripcion"   => "Cimi fugiat ipsam non amet est sequi pariatur veniam consequuntur eum voluptate aliquam expedita beatae rerum, voluptatem omnis.",
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
        ]);
        DB::table('departamentos')->insert([
            "nombre"        => "Departamento 3",
            "descripcion"   => "Cimi fugiat ipsam non amet est sequi pariatur veniam consequuntur eum voluptate aliquam expedita beatae rerum, voluptatem omnis.",
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
        ]);
    }
}
