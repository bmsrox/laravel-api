<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FilesController extends Controller
{
    public function show()
    {
        $pathToFile = storage_path ('app/GraceHopper.pdf');
        return response()->download($pathToFile, 'Amazing Grace');
    }

    public function create(Request $request)
    {
        $path = $request->file('photo')->store ('testing');
        return response()->json(['path' => $path], Response::HTTP_OK);
    }
}
