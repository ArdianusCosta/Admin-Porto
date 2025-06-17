<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactPesan;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
       $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'judul' => 'nullable|string',
            'pesan' => 'required',
       ]);

       ContactPesan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'judul' => $request->judul,
            'pesan' => $request->pesan,
       ]);

       return response()->json(['message' => 'Berhasil Contact Admin!'],200);
    }
}
