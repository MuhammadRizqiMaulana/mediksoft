<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'nama' => 'Admin Aplikasi',
            'uname' => 'admin@email.com',
            'pwd' => bcrypt('12345'),
            'idkaryawan' => '1',
            'idlevel' => '1',
            'aktif' => '1',
            'remember_token' => Str::random(60),
        ]);
    }
}
