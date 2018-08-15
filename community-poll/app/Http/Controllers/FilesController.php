<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilesController extends Controller
{
    public function show()
    {
        $pathToFile = storage_path ('app/GraceHopper.pdf');
        return response()->download($pathToFile, 'Amazing Grace');
    }
}