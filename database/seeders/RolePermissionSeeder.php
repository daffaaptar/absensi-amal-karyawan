<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name'=>'tambah-user']);
        Permission::create(['name'=>'edit-user']);
        Permission::create(['name'=>'hapus-user']);
        Permission::create(['name'=>'lihat-user']);

        Permission::create(['name'=>'tambah-tulisan']);
        Permission::create(['name'=>'edit-tulisan']);
        Permission::create(['name'=>'hapus-tulisan']);
        Permission::create(['name'=>'lihat-tulisan']);

        //Role
        Role::create(['name'=>'super-admin']);
        Role::create(['name'=>'admin']);
        Role::create(['name'=>'karyawan']);

        //Super Admin
        $roleSuperadmin = Role::findByName('super-admin');
        $roleSuperadmin->givePermissionTo('tambah-user');
        $roleSuperadmin->givePermissionTo('edit-user');
        $roleSuperadmin->givePermissionTo('hapus-user');
        $roleSuperadmin->givePermissionTo('lihat-user');
        $roleSuperadmin->givePermissionTo('tambah-tulisan');
        $roleSuperadmin->givePermissionTo('edit-tulisan');
        $roleSuperadmin->givePermissionTo('hapus-tulisan');
        $roleSuperadmin->givePermissionTo('lihat-tulisan');

        //Admin
        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo('lihat-user');
        $roleAdmin->givePermissionTo('lihat-tulisan');

        //Karyawan
        $roleKaryawan = Role::findByName('karyawan');
        $roleKaryawan->givePermissionTo('tambah-tulisan');
        $roleKaryawan->givePermissionTo('lihat-tulisan');

    }
}
