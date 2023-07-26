<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Catalog;
use App\Models\Subcatalog;
use App\Models\Country;
use App\Models\Message;
use App\Models\TicketFavorite;
use App\Models\Currency;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

// use App\Models\TicketMain;
use Auth;
use App\Http\Requests\TicketRequest;

class TicketController extends Controller
{
    public function getIndex(){
      $catalogs = Catalog::all();
      $countries = Country::all();
      $currencies = Currency::all();
      return view('ticket_add',  compact('catalogs', 'countries', 'currencies'));
    }
    public function getAll(Request $request){
        $form_add = false;
        $order = 'ASC';
        $default_order = 'event_datetime';
        if ($request->sort_by_date) {
            $order = $request->sort_by_date;
            $default_order = 'event_datetime';
        }
        if ($request->sort_by_id) {
            $order = $request->sort_by_id;
            $default_order = 'id';
        }

        $tickets = Ticket::filter($request->all())->where('active', '!=', 0)->orderBy($default_order, $order)->simplePaginate(6); // Select * FROM tickets WHERE active = 1 ORDER BY id DESC
        if(!$tickets->first()){
            $form_add = true;
        }
        $countries = Country::all();
        $ticket_media_arr = [];
        foreach($tickets as $one){
            $mediaItems = $one->getMedia();
            $ticket_media_arr[$one->id] = optional(optional($mediaItems)[0])->getFullUrl();
        }

        $favorite=TicketFavorite::where('user_id', optional(Auth::user())->id)->pluck('ticket_id')->toArray();
        $catalogs = Catalog::all();
        // dd($favorite);
        return view('tickets', compact('tickets', 'ticket_media_arr', 'favorite', 'countries', 'form_add', 'catalogs'));
    }
    public function getOne(Ticket $ticket){
        $ticket_media_arr = [];
        $mediaItems = $ticket->getMedia();
        $ticket_media_arr[$ticket->id] = optional(optional($mediaItems)[0])->getFullUrl();
        $messages = Message::where('ticket_id', $ticket->id)->orderBy('id', 'DESC')->get();
        return view('ticket',compact('ticket', 'ticket_media_arr', 'messages'));
    }
    public function postIndex(TicketRequest $request){
        $request['user_id'] = Auth::user()->id;
        $request['subcatalog_id'] = 0;

        $request['online'] = ($request->input('online_try')) ? 1 : 0;
        // $request['online'] = ($request->has('online_try'))?1:0;
        unset($request['_token']);
// dd($request->all());

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

    public function myTicket(){

        $main_tickets = Ticket::whereUserId(auth()->user()->id)->get();
        $favorite=TicketFavorite::where('user_id', optional(Auth::user())->id)->pluck('ticket_id')->toArray();
        // dd($main_tickets);
        // $main_tickets = TicketMain::where('user_id', Auth::user()->id)->get();
        return view('main_tickets',compact('main_tickets', 'favorite'));
    }



    public function deleteMain($id = null){
        $main_tickets = Ticket::where('user_id', Auth::user()->id)->where('id', $id)->first();
        if($main_tickets){
            $main_tickets->delete();
        }
        return redirect()->back();
       }


    public function ticketAdd(){
        $catalogs = Catalog::all();
        $currencies = Currency::all();
        return view('ticket_add',compact('catalogs', 'currencies'));
        }



    public function addFavorite(Ticket $ticket){
        $favorite = TicketFavorite::where('user_id', Auth::user()->id)->where('ticket_id',$ticket->id)->first();
        if (!$favorite){
            $favorite = new TicketFavorite;
            $favorite->user_id = Auth::user()->id;
            $favorite->ticket_id = $ticket->id;
            $favorite->save();
        }
        return redirect()->back();
    }

    public function myFavorite(){
        $my_favorites = TicketFavorite::where('user_id', Auth::user()->id)->get();
        return view('my_favorites',compact('my_favorites'));
    }

    public function deleteFavorite($id = null){
        $favorite = TicketFavorite::where('user_id', Auth::user()->id)->where('id', $id)->first();
        if($favorite){
         $favorite->delete();
        }
        return redirect()->back();
       }

       public function deleteFavoriteTicket($ticket_id = null){
        $favorite = TicketFavorite::where('user_id', Auth::user()->id)->where('ticket_id', $ticket_id)->first();
        if($favorite){
         $favorite->delete();
        }
        return redirect()->back();
       }

       public function myMessage(){

        $my_messages = Message::where('user_id', Auth::user()->id)->where('status', 'new')->get();
        return view('my_messages',compact('my_messages'));
    }

       public function postMessage(Request $request, Ticket $ticket){
        $message_test = Message::where('user_id', optional(Auth::user())->id)->where('ticket_id', $ticket->id)->first();
        if ($message_test){
            $message_test->status = 'old';
            $message_test->save();
        }
        $message = new Message;
        $message->user_id = optional(Auth::user())->id;
        $message->ticket_id = $ticket->id;
        $message->body = $request->body;
        $message->status = 'new';
        $message->save();

        return redirect()->back();

       }

    //    public function addMyTicket(Ticket $main){
    //     $main_tickets=TicketMain::where('user_id', Auth::user()->id)->where('ticket_id',$main->id)->first();
    //     if (!$main_tickets){
    //         $main_tickets = new TicketFavorite;
    //         $main_tickets->user_id = Auth::user()->id;
    //         $main_tickets->ticket_id = $main->id;
    //         $main_tickets->save();
    //     }
    //     return redirect()->back();
    // }

    public function getMain(Ticket $ticket){
        $currencies = Currency::all();
        $catalogs = Catalog::all();
        $countries = Country::all();
        return view('ticket_edit', compact('ticket', 'catalogs', 'countries', 'currencies'));
    }
    public function postMain(Ticket $ticket, Request $request){
        $request['online'] = ($request->input('online_try')) ? 1 : 0;
        unset($request['_token']);
        $ticket->update($request->all());
        if ($request->hasFile('picture')) {
            $ticket->addMedia($request->file('picture'))->toMediaCollection();
        }
        return redirect('/ticket/main');

    }

    public function mediaDelete($id = null){
         Media::findOrFail($id)->delete();
        //TicketdeleteMedia
        return redirect()->back();
    }


}
