<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\Subcatalog;
use App\Models\Country;
use App\Models\Ticket;
use App\Models\TicketFavorite;
use Auth;
use App\Http\Requests\TicketRequest;

class CatalogsController extends Controller
{
    //
    public function getOne (Catalog $catalog) {
        $subcatalogs = SubCatalog::where('catalog_id', $catalog->id)->get();
        $countries = Country::all();
        $favorite = TicketFavorite::where('user_id', optional(Auth::user())->id)->pluck('ticket_id')->toArray();
        return view('catalog', compact('catalog', 'subcatalogs', 'countries', 'favorite'));
    }


    public function subcatalog ($id) {
        $catalog = Catalog::find($id);
        $subcatalogs = Subcatalog::where('catalog_id', $catalog->id)->get();
        return view('includes.select_subcatalog', compact('subcatalogs'));
    }

}
