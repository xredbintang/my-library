<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function create()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
     
        $request->validate([
            'file' => 'required|file|mimes:jpg,png,pdf|max:2048',
        ]);

       
        if ($request->file('file')->isValid()) {
            $file = $request->file('file');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->storeAs('uploads', $fileName);

            return back()->with('success', 'Gambar berhasil diupload!')->with('filename',$fileName);
        }

        return back()->with('error', 'File gagal diupload');
    }
}
