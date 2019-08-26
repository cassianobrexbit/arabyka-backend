<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
        $permissions = [

            //Permissoes
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            //usuarios
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            //auditor
            'manager-list',
            'manager-create',
            'manager-edit',
            'manager-delete',
            //propriedades
            'farm-list',
            'farm-create',
            'farm-edit',
            'farm-delete',
            //unidades produtoras
            'unity-list',
            'unity-create',
            'unity-edit',
            'unity-delete',
            //países
            'country-list',
            'country-create',
            'country-edit',
            //cidades
            'county-list',
            'county-create',
            'county-edit',
            //estados
            'state-list',
            'state-create',
            'state-edit',
            //região produtora
            'region-list',
            'region-create',
            'region-edit'

         ];


         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
     }
}
