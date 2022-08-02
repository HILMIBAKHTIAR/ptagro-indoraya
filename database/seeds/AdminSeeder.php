<?php

namespace Database\Seeders;

use App\Access;
use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'nama' => 'hilmi',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'foto' => 'default.jpg',
            'username' => 'admin',
            'password' => bcrypt('admin123'),
        ]);

        DB::table('access')->insert([
            'user' => 1,
            'kelola_akun' => 1,
            'kelola_produk' => 1,
            'transaksi' => 1,
            'kelola_laporan' => 1,
        ]);
    }
}
