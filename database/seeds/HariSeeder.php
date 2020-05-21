<?php

use App\Model\Hari;
use Illuminate\Database\Seeder;

class HariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hari::create([
            'hari' => 'Senin'
        ]);
        Hari::create([
            'hari' => 'Selasa'
        ]);
        Hari::create([
            'hari' => 'Rabu'
        ]);
        Hari::create([
            'hari' => 'Kamis'
        ]);
        Hari::create([
            'hari' => 'Jumat'
        ]);
    }
}
