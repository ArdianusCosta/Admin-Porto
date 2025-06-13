<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AboutMe;
use Illuminate\Http\Request;

class AboutMeController extends Controller
{
    public function index()
    {
        $about = AboutMe::first();
        if(!$about){
            return response()->json([
                'judul' => null,
                'isi' => null,
                'nama_isi' => null,
                'foto_about_me' => null,
                'project_selesai' => null,
                'tahun_pengalaman' => null,
            ]);
        }

        return response()->json([
                'judul' => $about->judul,
                'isi' => strip_tags($about->isi),
                'nama_isi' => $about->nama_isi,
                'foto_about_me' => asset('storage/' . $about->foto_about_me),
                'project_selesai' => $about->project_selesai,
                'tahun_pengalaman' => $about->tahun_pengalaman,
        ]);
    }
}
