<?php

namespace App\Imports;

use App\Model\Guru;
use Maatwebsite\Excel\Concerns\ToModel;

class GuruImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Guru([
            'nama' => $row[0],
            'nip' => $row[1],
            'no_telepon' => $row[2],
            'email' => $row[3],
            'alamat' => $row[4],
            'photo' => $row[5]
        ]);
    }
}
