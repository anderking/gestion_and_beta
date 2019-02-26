<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PrecioDocumentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Para la carrera con el id 1
    	DB::table('precio_documentos')->insert([
    		"carrera_id"		=> 1,
    		"documento_id"		=> 1,
    		"precio"			=> 10,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
    	DB::table('precio_documentos')->insert([
    		"carrera_id"		=> 1,
    		"documento_id"		=> 2,
    		"precio"			=> 30,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
     	DB::table('precio_documentos')->insert([
    		"carrera_id"		=> 1,
    		"documento_id"		=> 3,
    		"precio"			=> 10,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
    	DB::table('precio_documentos')->insert([
    		"carrera_id"		=> 1,
    		"documento_id"		=> 4,
    		"precio"			=> 20,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
    	DB::table('precio_documentos')->insert([
    		"carrera_id"		=> 1,
    		"documento_id"		=> 5,
    		"precio"			=> 10,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);

    	//Para la carrera con el id 2
    	DB::table('precio_documentos')->insert([
    		"carrera_id"		=> 2,
    		"documento_id"		=> 1,
    		"precio"			=> 10,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
    	DB::table('precio_documentos')->insert([
    		"carrera_id"		=> 2,
    		"documento_id"		=> 2,
    		"precio"			=> 30,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
     	DB::table('precio_documentos')->insert([
    		"carrera_id"		=> 2,
    		"documento_id"		=> 3,
    		"precio"			=> 10,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
    	DB::table('precio_documentos')->insert([
    		"carrera_id"		=> 2,
    		"documento_id"		=> 4,
    		"precio"			=> 20,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
    	DB::table('precio_documentos')->insert([
    		"carrera_id"		=> 2,
    		"documento_id"		=> 5,
    		"precio"			=> 10,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);

    	//Para la carrera con el id 3
    	DB::table('precio_documentos')->insert([
    		"carrera_id"		=> 3,
    		"documento_id"		=> 1,
    		"precio"			=> 10,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
    	DB::table('precio_documentos')->insert([
    		"carrera_id"		=> 3,
    		"documento_id"		=> 2,
    		"precio"			=> 30,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
     	DB::table('precio_documentos')->insert([
    		"carrera_id"		=> 3,
    		"documento_id"		=> 3,
    		"precio"			=> 10,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
    	DB::table('precio_documentos')->insert([
    		"carrera_id"		=> 3,
    		"documento_id"		=> 4,
    		"precio"			=> 20,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
    	DB::table('precio_documentos')->insert([
    		"carrera_id"		=> 3,
    		"documento_id"		=> 5,
    		"precio"			=> 10,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);

    	//Para la carrera con el id 4
    	DB::table('precio_documentos')->insert([
    		"carrera_id"		=> 4,
    		"documento_id"		=> 1,
    		"precio"			=> 10,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
    	DB::table('precio_documentos')->insert([
    		"carrera_id"		=> 4,
    		"documento_id"		=> 2,
    		"precio"			=> 30,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
     	DB::table('precio_documentos')->insert([
    		"carrera_id"		=> 4,
    		"documento_id"		=> 3,
    		"precio"			=> 10,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
    	DB::table('precio_documentos')->insert([
    		"carrera_id"		=> 4,
    		"documento_id"		=> 4,
    		"precio"			=> 20,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
    	DB::table('precio_documentos')->insert([
    		"carrera_id"		=> 4,
    		"documento_id"		=> 5,
    		"precio"			=> 10,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);

    	//Para la carrera con el id 5
    	DB::table('precio_documentos')->insert([
    		"carrera_id"		=> 5,
    		"documento_id"		=> 1,
    		"precio"			=> 10,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
    	DB::table('precio_documentos')->insert([
    		"carrera_id"		=> 5,
    		"documento_id"		=> 2,
    		"precio"			=> 30,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
     	DB::table('precio_documentos')->insert([
    		"carrera_id"		=> 5,
    		"documento_id"		=> 3,
    		"precio"			=> 10,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
    	DB::table('precio_documentos')->insert([
    		"carrera_id"		=> 5,
    		"documento_id"		=> 4,
    		"precio"			=> 20,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
    	DB::table('precio_documentos')->insert([
    		"carrera_id"		=> 5,
    		"documento_id"		=> 5,
    		"precio"			=> 10,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);

    	//Para la carrera con el id 6
    	DB::table('precio_documentos')->insert([
    		"carrera_id"		=> 6,
    		"documento_id"		=> 1,
    		"precio"			=> 10,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
    	DB::table('precio_documentos')->insert([
    		"carrera_id"		=> 6,
    		"documento_id"		=> 2,
    		"precio"			=> 30,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
     	DB::table('precio_documentos')->insert([
    		"carrera_id"		=> 6,
    		"documento_id"		=> 3,
    		"precio"			=> 10,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
    	DB::table('precio_documentos')->insert([
    		"carrera_id"		=> 6,
    		"documento_id"		=> 4,
    		"precio"			=> 20,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
    	DB::table('precio_documentos')->insert([
    		"carrera_id"		=> 6,
    		"documento_id"		=> 5,
    		"precio"			=> 10,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
    }
}
