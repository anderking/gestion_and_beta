<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Traits\Seedable;

class VoyagerDatabaseSeeder extends Seeder
{
    use Seedable;

    protected $seedersPath = __DIR__.'/';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seed('DataTypesTableSeeder');
        $this->seed('DataRowsTableSeeder');
        $this->seed('MenusTableSeeder');
        $this->seed('MenuItemsTableSeeder');
        $this->seed('RolesTableSeeder');
        $this->seed('UsersTableSeeder');
        $this->seed('UserRolesTableSeeder');
        $this->seed('CarrerasTableSeeder');
        $this->seed('PensumTableSeeder');
        $this->seed('DocumentosTableSeeder');
        $this->seed('PrecioDocumentoTableSeeder');
        $this->seed('PrecioProgramaTableSeeder');
        $this->seed('TipoServiciosTableSeeder');
        $this->seed('ServiciosTableSeeder');
        $this->seed('ItemsTableSeeder');
        $this->seed('DepartamentosTableSeeder');
        $this->seed('PermissionsTableSeeder');
        $this->seed('PermissionRoleTableSeeder');
        $this->seed('SettingsTableSeeder');
    }
}
