<?php

namespace Database\Seeders;

use App\Access;
use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'hilmi',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'foto' => 'default.jpg',
            'username' => 'admin',
            'password' => bcrypt('admin123'),

        ]);
        $role = Access::create([
            'user' => $user->id,
            'kelola_akun' => 1,
            'kelola_produk' => 1,
            'transaksi' => 1,
            'kelola_laporan' => 1,

            $role
        ]);

        $role = Role::create(['name' => 'admin']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
