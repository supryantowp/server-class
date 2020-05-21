<?php

namespace App\Imports;

use App\Model\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Siswa([
            'nik' => $row[0],
            'nama' => $row[1],
            'email' => $row[2],
            'nisn' => $row[3],
            'jenis_kelamin' => $row[4],
        ]);
    }
}
