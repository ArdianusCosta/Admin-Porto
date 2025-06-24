<?php

namespace App\Http\Controllers\Api;

use App\Models\Navbar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NavbarController extends Controller
{
    public function index(Request $request)
    {
        $lang = $request->get('lang','id');
        $navbars = Navbar::orderBy('urutan')->get()->map(function($item) use ($lang){
            return [
                'navbar' => $item->navbar[$lang] ?? $item->navbar['id'],
                'slug' => $item->slug,
            ];
        });

        return response()->json($navbars);
    }
}