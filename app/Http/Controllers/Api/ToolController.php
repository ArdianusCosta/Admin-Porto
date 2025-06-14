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
        $pakai = ToolPakai::all();

        $result = $pakai->map(function($item){
            return [
                'id' => $item->id,
                'judul_tool' => $item->judul_tool,
                'urutan_tools' => $item->urutan_tools,
                'foto_tool' => asset('storage/' . $item->foto_tool),
                'deskripsi_tool' => html_entity_decode(strip_tags($item->deskripsi_tool)),
            ];
        });

        return response()->json($result);
    }
}
