<?php

namespace App\Http\Controllers;

use App\Models\upload;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UploadController extends Controller
{
    public function upload(Request $request)
    {

        $upload = new upload();
        $upload->name = $request->name;
        $upload->path = $request->file('img')->store('imagens');
        $upload->save();

        return \response()->json('success');
    }
}
