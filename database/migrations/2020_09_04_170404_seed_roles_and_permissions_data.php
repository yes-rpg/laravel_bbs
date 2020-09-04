<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
class SeedRolesAndPermissionsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //需清除缓存,否则会报错
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        //创建权限
        Permission::create(['name' => 'manage_contents']);
        Permission::create(['name' => 'manage_users']);
        Permission::create(['name' => 'edit_setting']);

        //创建角色
        $founder = Role::create(['name' => 'Founder']);
        $maintainer = Role::create(['name' => 'Maintainer']);

        //赋予权限
        $founder -> givePermissionTo('manage_contents');
        $founder -> givePermissionTo('manage_users');
        $founder -> givePermissionTo('edit_setting');

        $maintainer->givePermissionTo('manage_contents');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        app(Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        $tableNames = config('permission.table_names');
        Model::unguard();
        DB::table($tableNames['role_has_permissions'])->delete();
        DB::table($tableNames['model_has_roles'])->delete();
        DB::table($tableNames['model_has_permissions'])->delete();
        DB::table($tableNames['roles'])->delete();
        DB::table($tableNames['permissions'])->delete();
        Model::reguard();
    }
}
