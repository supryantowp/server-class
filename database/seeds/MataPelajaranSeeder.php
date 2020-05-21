<?php

use App\Model\MataPelajaran;
use Illuminate\Database\Seeder;

class MataPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MataPelajaran::create([
            'mata_pelajaran' => "Pendidikan Ibu Pekerti"
        ]);
        MataPelajaran::create([
            'mata_pelajaran' => "Bahasa Indonesia"
        ]);
        MataPelajaran::create([
            'mata_pelajaran' => "Matematika"
        ]);
        MataPelajaran::create([
            'mata_pelajaran' => "Pendidikan Kewarga Negaraan"
        ]);
        MataPelajaran::create([
            'mata_pelajaran' => "Bahasa Inggris"
        ]);
        MataPelajaran::create([
            'mata_pelajaran' => "Bahasa Sunda"
        ]);
        MataPelajaran::create([
            'mata_pelajaran' => "Olah Raga"
        ]);
    }
}
