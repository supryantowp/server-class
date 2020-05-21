<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    protected $fillable = ['nama', 'deskripsi', 'type', 'filename'];
}
