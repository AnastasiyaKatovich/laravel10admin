<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;

use Illuminate\Support\Facades\Log;


class HomeController extends Controller
{
    //прописываем это!!!!
    public function getIndex(){
        $catalogs=Catalog::all();
        return view('home', compact('catalogs'));
    }

    public function postIndex(Request $request){
        Log::info($request->all());
        return redirect()->back();

       }

       public function getCatalog(Catalog $catalog){
        return view('catalog_edit', compact('catalog'));
    }
    public function postCatalog(Catalog $catalog, Request $request){
        unset($request['_token']);
        $catalog->update($request->all());
        return redirect('/dashboard');

       }
       public function getDelete(Catalog $catalog){
        $catalog->delete();
        return redirect()->back();
    }

}
