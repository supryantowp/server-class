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
        User::create([
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

        DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_type' => 'App\User',
            'model_id' => 1
        ]);
    }
}
