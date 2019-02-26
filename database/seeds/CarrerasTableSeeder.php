<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarrerasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         DB::table('carreras')->insert([
             "nombre" => "Ingenieria Informatica",
             "created_at"    => Carbon\Carbon::now(),
             "updated_at"    => Carbon\Carbon::now()
         ]);
         DB::table('carreras')->insert([
             "nombre" => "Analisis y Sistemas",
             "created_at"    => Carbon\Carbon::now(),
             "updated_at"    => Carbon\Carbon::now()
         ]);
         DB::table('carreras')->insert([
             "nombre" => "Ingenieria de Produccion",
             "created_at"    => Carbon\Carbon::now(),
             "updated_at"    => Carbon\Carbon::now()
         ]);
         DB::table('carreras')->insert([
             "nombre" => "Licenciatura Matematica",
             "created_at"    => Carbon\Carbon::now(),
             "updated_at"    => Carbon\Carbon::now()
         ]);
         DB::table('carreras')->insert([
             "nombre" => "Licenciatura en Fisica",
             "created_at"    => Carbon\Carbon::now(),
             "updated_at"    => Carbon\Carbon::now()
         ]);
         DB::table('carreras')->insert([
             "nombre" => "Ingenieria Telematica",
             "created_at"    => Carbon\Carbon::now(),
             "updated_at"    => Carbon\Carbon::now()
         ]);

     }
}
