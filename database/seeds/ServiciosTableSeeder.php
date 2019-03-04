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
            "nombre"            => "Electricidad",
            "tipo_servicio_id"  => 1,
            "descripcion"       => "Electricidad",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('servicios')->insert([
            "nombre"            => "Refrigeracion",
            "tipo_servicio_id"  => 1,
            "descripcion"       => "Refrigeracion.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('servicios')->insert([
            "nombre"            => "Infraestructura ",
            "tipo_servicio_id"  => 2,
            "descripcion"       => "Infraestructura",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('servicios')->insert([
            "nombre"            => "Articulos de oficina",
            "tipo_servicio_id"  => 2,
            "descripcion"       => "Articulos de oficina",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
    }
}
