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
            "nombre"        => "Departamento de Sistemas",
            "descripcion"   => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
        ]);
        DB::table('departamentos')->insert([
            "nombre"        => "Departamento de  Matemáticas",
            "descripcion"   => "Cimi fugiat ipsam non amet est sequi pariatur veniam consequuntur eum voluptate aliquam expedita beatae rerum, voluptatem omnis.",
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
        ]);
        DB::table('departamentos')->insert([
            "nombre"        => "Departamento de Investigación de Operaciones y Estadística",
            "descripcion"   => "Cimi fugiat ipsam non amet est sequi pariatur veniam consequuntur eum voluptate aliquam expedita beatae rerum, voluptatem omnis.",
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
        ]);
        DB::table('departamentos')->insert([
            "nombre"        => "Departamento de Estudios Básicos y Sociales",
            "descripcion"   => "Cimi fugiat ipsam non amet est sequi pariatur veniam consequuntur eum voluptate aliquam expedita beatae rerum, voluptatem omnis.",
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
        ]);
        DB::table('departamentos')->insert([
            "nombre"        => "Departamento de Manufactura y Producción",
            "descripcion"   => "Cimi fugiat ipsam non amet est sequi pariatur veniam consequuntur eum voluptate aliquam expedita beatae rerum, voluptatem omnis.",
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
        ]);
        DB::table('departamentos')->insert([
            "nombre"        => "Departamento de Física",
            "descripcion"   => "Cimi fugiat ipsam non amet est sequi pariatur veniam consequuntur eum voluptate aliquam expedita beatae rerum, voluptatem omnis.",
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
        ]);
    }
}
