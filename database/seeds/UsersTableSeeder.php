<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \DB::table('users')->insert(array(
              'role_id'       => 1,
              'name'          => 'Administrador',
              'email'         => 'admin@admin.com',
              'avatar'        => 'admin.jpg',
              'password'      => bcrypt('admin'),
              'cedula'        => '1',
              'address'       => 'Direccion',
              'phone'         => '1',
              'created_at'    => Carbon\Carbon::now(),
              'updated_at'    => Carbon\Carbon::now()
      ));

      \DB::table('users')->insert(array(
              'role_id'       => 2,
              'name'          => 'Estudiante',
              'email'         => 'estudiante@estudiante.com',
              'avatar'        => 'estudiante.jpg',
              'password'      => bcrypt('estudiante'),
              'cedula'        => '12',
              'address'       => 'Direccion',
              'phone'         => '12',
              'created_at'    => Carbon\Carbon::now(),
              'updated_at'    => Carbon\Carbon::now()
      ));
      
      \DB::table('users')->insert(array(
                'role_id'       => 3,
                'name'          => 'Docente',
                'email'         => 'docente@docente.com',
                'avatar'        => 'docente.jpg',
                'password'      => bcrypt('docente'),
                'cedula'        => '123',
                'address'       => 'Direccion',
                'phone'         => '123',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
      ));

      \DB::table('users')->insert(array(
                'role_id'       => 4,
                'name'          => 'Secretario',
                'email'         => 'secretario@secretario.com',
                'avatar'        => 'secretario.jpg',
                'password'      => bcrypt('secretario'),
                'cedula'        => '1234',
                'address'       => 'Direccion',
                'phone'         => '1234',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
      ));

      \DB::table('users')->insert(array(
                'role_id'       => 5,
                'name'          => 'Director Administrativo',
                'email'         => 'directoradm@directoradm.com',
                'avatar'        => 'directoradm.jpg',
                'password'      => bcrypt('directoradm'),
                'cedula'        => '12345',
                'address'       => 'Direccion',
                'phone'         => '12345',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
      ));
      
      \DB::table('users')->insert(array(
                'role_id'       => 6,
                'name'          => 'Director de Programa',
                'email'         => 'directorpro@directorpro.com',
                'avatar'        => 'directorpro.jpg',
                'password'      => bcrypt('directorpro'),
                'cedula'        => '123456',
                'address'       => 'Direccion',
                'phone'         => '123456',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
      ));

      \DB::table('users')->insert(array(
                'role_id'       => 7,
                'name'          => 'Encargado de Servicio',
                'email'         => 'encargadoserv@encargadoserv.com',
                'avatar'        => 'encargadoserv.jpg',
                'password'      => bcrypt('encargadoserv'),
                'cedula'        => '1234567',
                'address'       => 'Direccion',
                'phone'         => '1234567',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
      ));
    }
}
