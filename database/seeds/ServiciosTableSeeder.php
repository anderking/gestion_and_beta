<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servicios')->insert([
            "nombre"            => "Servicio 1",
            "tipo_servicio_id"  => 1,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('servicios')->insert([
            "nombre"            => "Servicio 2",
            "tipo_servicio_id"  => 1,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('servicios')->insert([
            "nombre"            => "Servicio 3",
            "tipo_servicio_id"  => 2,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('servicios')->insert([
            "nombre"            => "Servicio 4",
            "tipo_servicio_id"  => 2,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('servicios')->insert([
            "nombre"            => "Servicio 5",
            "tipo_servicio_id"  => 2,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
    }
}
