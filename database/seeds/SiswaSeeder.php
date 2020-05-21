<?php

use App\Model\Siswa;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');
        $nik = 181910540;
        $nisn = 112121;

        for ($i = 0; $i < 33; $i++) {
            Siswa::create([
                'nama' => $faker->name,
                'email' => $faker->name . '@gmail.com',
                'nik'   => $nik + $i,
                'nisn'  => $nisn + $i,
                'jenis_kelamin' => 'Laki Laki',
                'tanggal_lahir' => $faker->date,
                'alamat'    => $faker->address,
                'no_telepon'    => $faker->numberBetween(1, 1000),
                'photo' => 'default.jpg'
            ]);

            DB::table('model_has_roles')->insert([
                'role_id' => 2,
                'model_type' => 'App\User',
                'model_id' => $i
            ]);
        }
    }
}
