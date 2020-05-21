<?php

use App\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');
        $nik = 10010;

        for ($i = 0; $i < 33; $i++) {
            User::create([
                'nik' => $nik + $i,
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => bcrypt(12345678)
            ]);
        }
    }
}
