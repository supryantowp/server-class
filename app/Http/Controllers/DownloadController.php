<?php

namespace App\Http\Controllers;

use App\Model\Berkas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function download($id)
    {
        $berkas = Berkas::whereId($id)->first();
        return response()->download(storage_path("app/public/berkas/" . $berkas->filename));
    }
}
