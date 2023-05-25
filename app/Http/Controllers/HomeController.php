<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Log;


class HomeController extends Controller
{
    //прописываем это!!!!
    public function getIndex(){
        return view('home');
    }

    public function postIndex(Request $request){
        Log::info($request->all());
        return redirect()->back();

       }

}
