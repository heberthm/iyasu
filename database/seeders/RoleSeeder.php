<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()

  {
    
    $role1  =  Role::create(['name' => 'admin']);

    $role2  =  Role::create(['name' => 'user']);

    Permission::create(['name' => 'inicio'])->syncRoles([$role1, $role2]);

    Permission::create(['name' => 'registrar_tratamiento'])->syncRoles([$role1, $role2]);

    Permission::create(['name' => 'abonos'])->syncRoles([$role1]);

    Permission::create(['name' => 'deudores'])->syncRoles([$role1, $role2]);

    Permission::create(['name' => 'pago_honorarios'])->syncRoles([$role1]);

    Permission::create(['name' => 'registros_contables'])->syncRoles([$role1]);

    Permission::create(['name' => 'profesionales'])->syncRoles([$role1]);

    Permission::create(['name' => 'terapias'])->syncRoles([$role1]);

    Permission::create(['name' => 'terapias_adicionales'])->syncRoles([$role1]);

    Permission::create(['name' => 'lavados'])->syncRoles([$role1]);

    Permission::create(['name' => 'estadisticas'])->syncRoles([$role1]);

    Permission::create(['name' => 'register'])->syncRoles([$role1]);



  }
}
