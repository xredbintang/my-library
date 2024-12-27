<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    public function buat(){
        return view('buku');
    }

    public function buatbuku (BookRequest $request){
        $validated = $request->validated();
        dd($validated);
    }
}
