<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrecioProgramaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Para la carrera con el id 1
    	DB::table('precio_programas')->insert([
    		"carrera_id"		=> 1,
    		"pensum_id"			=> 1,
    		"precio"			=> 100,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
    	DB::table('precio_programas')->insert([
    		"carrera_id"		=> 1,
    		"pensum_id"			=> 2,
    		"precio"			=> 2194,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
     	DB::table('precio_programas')->insert([
    		"carrera_id"		=> 2,
    		"pensum_id"			=> 1,
    		"precio"			=> 100,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
    	DB::table('precio_programas')->insert([
    		"carrera_id"		=> 2,
    		"pensum_id"			=> 2,
    		"precio"			=> 802,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
    	DB::table('precio_programas')->insert([
    		"carrera_id"		=> 3,
    		"pensum_id"			=> 2,
    		"precio"			=> 100,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
    	DB::table('precio_programas')->insert([
    		"carrera_id"		=> 4,
    		"pensum_id"			=> 2,
    		"precio"			=> 100,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
    	DB::table('precio_programas')->insert([
    		"carrera_id"		=> 5,
    		"pensum_id"			=> 2,
    		"precio"			=> 100,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
    	DB::table('precio_programas')->insert([
    		"carrera_id"		=> 6,
    		"pensum_id"			=> 2,
    		"precio"			=> 100,
            "created_at"    => Carbon\Carbon::now(),
            "updated_at"    => Carbon\Carbon::now()
    	]);
    }
}
