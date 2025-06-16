<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('bahasa')->get();

        $result = $projects->map(function($item){
            return [ 
                'foto_project' => asset('storage/' . $item->foto_project),
                'judul_project' => $item->judul_project,
                'bahasa_pemrograman' => $item->bahasa->pluck('bahasa_pemrograman'),
                'isi_project' => html_entity_decode(strip_tags($item->isi_project)),
                'url_project' => $item->url_project,
                'urutan_project' => $item->urutan_project,
            ];
        });
        return response()->json($result);
    }
}
