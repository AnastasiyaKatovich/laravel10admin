<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Catalog;
use Auth;
use App\Http\Requests\TicketRequest;

class TicketController extends Controller
{
    public function getIndex(){
      $catalogs = Catalog::all();
      return view('ticket_add',  compact('catalogs'));
    }
    public function getAll(){
        $tickets = Ticket::where('active', '!=', 0)->orderBy('id', 'DESC')->get(); // Select * FROM tickets WHERE active = 1 ORDER BY id DESC
        $ticket_media_arr = [];
        foreach($tickets as $one){
            $mediaItems = $one->getMedia();
                $ticket_media_arr[$one->id] = optional(optional($mediaItems)[0])->getFullUrl();
        }
        return view('tickets', compact('tickets', 'ticket_media_arr'));
    }
    public function getOne(Ticket $ticket){
        $ticket_media_arr = [];

            $mediaItems = $ticket->getMedia();
                $ticket_media_arr[$ticket->id] = optional(optional($mediaItems)[0])->getFullUrl();

        return view('ticket',compact('ticket', 'ticket_media_arr'));
    }
    public function postIndex(TicketRequest $request){
        $request['user_id'] = Auth::user()->id;
        $request['subcatalog_id'] = 0;
        unset($request['_token']);
        /*
        $ticket = new Ticket;
        $ticket->name = $request->name;
        $ticket->save();
        */
        $ticket = Ticket::create($request->all());
        if ($request->hasFile('picture')) {
            $ticket->addMedia($request->file('picture'))->toMediaCollection();
        }

        //return redirect()->back();
        return redirect('tickets');
    }
}
