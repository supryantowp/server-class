<?php

use App\Model\Guru;
use Faker\Factory;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');
        for ($i = 0; $i < 15; $i++) {
            Guru::create([
                'nama' => $faker->name,
                'nip'  => $faker->numberBetween(90, 1000),
                'no_telepon' => $faker->numberBetween(11, 100),
                'email' => $faker->name . '@gmail.com',
                'alamat'    => $faker->address,
                'photo' => 'default.jpg'
            ]);
        }
    }
}
