<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            "nombre"            => "Item 1",
            "servicio_id"  		=> 1,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Item 2",
            "servicio_id"  		=> 2,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Item 3",
            "servicio_id"  		=> 2,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Item 4",
            "servicio_id"  		=> 3,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Item 5",
            "servicio_id"  		=> 3,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Item 6",
            "servicio_id"  		=> 3,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Item 7",
            "servicio_id"  		=> 4,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Item 8",
            "servicio_id"  		=> 5,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Item 9",
            "servicio_id"  		=> 5,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Item 10",
            "servicio_id"  		=> 5,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Item 11",
            "servicio_id"  		=> 5,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Item 12",
            "servicio_id"  		=> 5,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
    }
}
