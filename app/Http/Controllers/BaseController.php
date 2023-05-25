<?php

namespace App\Http\Controllers;
use App\Models\Page;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    //
    public function getIndex(){
        return view('index');
    }

    public function getText($url = null){
        // dd($url);
        $page=Page::where('url', $url)->first();
        return view('page', compact('page'));

    }
}
