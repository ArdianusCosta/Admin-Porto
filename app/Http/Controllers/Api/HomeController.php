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
        return Home::latest()->first();
    }

    public function motivasi()
    {
        return Motivasi::latest()->first();
    }
}
