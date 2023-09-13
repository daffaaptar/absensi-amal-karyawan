<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Superadmin = User::create([
            'name' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $Superadmin->assignRole('super-admin');

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $admin->assignRole('admin');

        $karyawan = User::create([
            'name' => 'karyawan',
            'email' => 'karyawan@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $karyawan->assignRole('karyawan');
    }
}
