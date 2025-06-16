<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        $contact = Contact::all()->map(function($item){
            return [
                'icon' => $item->icon,
                'url' => $item->url,
                'status' => $item->status,
            ];
        });
        return response()->json($contact);
    }
}
