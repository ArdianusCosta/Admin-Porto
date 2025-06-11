<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Models\Motivasi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $home = Home::first();

        if (!$home) {
            return response()->json([
                'judul' => null,
                'isi' => null,
                'foto_home' => null,
            ]);
        }

        return response()->json([
            'judul' => $home->judul,
            'isi' => $home->isi,
            'foto_home' => asset('storage/' . $home->foto_home),
        ]);
    }

    public function motivasi()
    {
        $motivasi = Home::with('motivasi')->first();
    
        if (!$motivasi || !$motivasi->motivasi) {
            return response()->json([
                'motivasi' => null,
                'foto_motivasi' => null,
            ]);
        }
    
        return response()->json([
            'motivasi' => $motivasi->motivasi->motivasi,
            'foto_motivasi' => asset('storage/' . $motivasi->motivasi->foto_motivasi),
        ]);
    }
    
    
}
