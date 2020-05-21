<?php

namespace App\Imports;

use App\Model\MataPelajaran;
use Maatwebsite\Excel\Concerns\ToModel;

class MapelImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new MataPelajaran([
            'mata_pelajaran' => $row[0]
        ]);
    }
}
