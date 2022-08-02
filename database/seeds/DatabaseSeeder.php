<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        DB::table('users')->insert([
            'name' => 'rijal',
            'email' => 'kasir@gmail.com',
            'role' => 'kasir',
            'foto' => 'default.jpg',
            'username' => 'rijal',
            'password' => bcrypt('admin123'),
        ]);

        DB::table('acces')->insert([
            'user' => 2,
            'kelola_akun' => 0,
            'kelola_produk' => 1,
            'transaksi' => 1,
            'kelola_laporan' => 1,
        ]);
    }
}
