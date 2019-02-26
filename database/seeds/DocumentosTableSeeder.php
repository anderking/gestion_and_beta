<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('documentos')->insert([
            "nombre" => "Pensum",
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
        ]);
    	DB::table('documentos')->insert([
    		"nombre" => "Constancia de Notas Simples",
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);

        DB::table('documentos')->insert([
            "nombre" => "Constancia de Buena Conducta",
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
        ]);

        DB::table('documentos')->insert([
            "nombre" => "Constancia de Carga Horaria",
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
        ]);
        DB::table('documentos')->insert([
            "nombre" => "Constancia de Modalidad de Estudio",
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
        ]);
    }
}
