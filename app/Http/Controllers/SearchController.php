<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class SearchController extends Controller
{
    public function getSearch (Request $request) {
        $search = $request->search;
        $ticket_results = Ticket::where('name', 'LIKE', '%'.$search.'%')->get();
        if (!$ticket_results->first()){
            // dd('test');
            $ticket_results = Ticket::where('body', 'LIKE', '%'.$search.'%')->get();
        }

        return view('search', compact('search', 'ticket_results'));

    }
}
