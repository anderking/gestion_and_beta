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
            "nombre"            => "Falla de iluminación",
            "servicio_id"  		=> 1,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Falla de Toma-Corriente",
            "servicio_id"  		=> 1,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Corto Circuito",
            "servicio_id"  		=> 1,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Falla de Tablero Eléctrico",
            "servicio_id"  		=> 1,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Instalación de Brecker",
            "servicio_id"  		=> 1,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Instalación de Cableado",
            "servicio_id"  		=> 1,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Otros",
            "servicio_id"  		=> 1,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Falla de A/A de Ventana",
            "servicio_id"  		=> 2,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Falla de A/A de Central",
            "servicio_id"  		=> 2,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Mantenimiento de A/A",
            "servicio_id"  		=> 2,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Instalación de A/A",
            "servicio_id"       => 2,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Bote de Agua de A/A",
            "servicio_id"       => 2,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Reparación de Filtro de Agua",
            "servicio_id"       => 2,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Otros",
            "servicio_id"       => 2,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Reparación de Baño",
            "servicio_id"       => 3,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Reparación de Cerradura",
            "servicio_id"       => 3,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Pintura",
            "servicio_id"       => 3,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Albañilería",
            "servicio_id"       => 3,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Mudanza",
            "servicio_id"       => 3,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Herrería",
            "servicio_id"       => 3,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Otros",
            "servicio_id"       => 3,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Marcadores",
            "servicio_id"       => 4,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Borradores",
            "servicio_id"       => 4,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Carpeta Tamaño Carta",
            "servicio_id"       => 4,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Carpeta Tamaño Oficio",
            "servicio_id"       => 4,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Sobres Tamaño Carta",
            "servicio_id"       => 4,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Sobres Tamaño Oficio",
            "servicio_id"       => 4,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Hojas Blanca Tamaño Carta",
            "servicio_id"       => 4,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Hojas Blanca Tamaño Oficio",
            "servicio_id"       => 4,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Bolígrafos",
            "servicio_id"       => 4,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Clips",
            "servicio_id"       => 4,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        DB::table('items')->insert([
            "nombre"            => "Grapas",
            "servicio_id"       => 4,
            "descripcion"       => "Co nesciunt aliquid dolores dolore molestias, distinctio perspiciatis sequi inventore blanditiis iste possimus fugit sed odit quis doloribus? Eaque.",
            "created_at"        => Carbon\Carbon::now(),
            "updated_at"        => Carbon\Carbon::now()
        ]);
        
    }
}
