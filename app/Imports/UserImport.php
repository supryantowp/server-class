<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $user = new  User([
            'nik' => $row[0],
            'name' => $row[1],
            'email' => $row[2],
            'password' => bcrypt(12345678)
        ]);

        $user->assignRole('siswa');

        return $user;
    }
}
