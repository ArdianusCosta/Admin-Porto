<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use App\Models\ToolPakai;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function index()
    {
        $tool = Tool::first();
       
        if(!$tool){
            return response()->json([
                'judul' => null,
                'isi' => null,
            ]);
        }
        return response()->json([
            'judul' => $tool->judul,
            'isi' => strip_tags($tool->isi),
        ]);
    }

    public function tool()
    {
        $pakai = ToolPakai::first();

        if(!$pakai){
            return response()->json([
                'judul_tool' => null,
                'foto_tool' => null,
                'deskripsi_tool' => null,
            ]);
        }

        return response()->json([
            'judul_tool' => $pakai->judul_tool,
            'foto_tool' => asset('storage/' . $pakai->foto_tool),
            'deskripsi_tool' => strip_tags($pakai->deskripsi_tool),
        ]);
    }
}
