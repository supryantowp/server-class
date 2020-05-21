<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'nik' => 111,
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin12345')
        ]);

        Role::create([
            'name' => 'admin'
        ]);

        Role::create([
            'name' => 'siswa'
        ]);

        $user->assingRole('admin');
    }
}
