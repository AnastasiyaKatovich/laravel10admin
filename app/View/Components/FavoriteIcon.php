<?php

namespace App\View\Components;

use Closure;
use Auth;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\TicketFavorite;

class FavoriteIcon extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $ticketId)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $fav_href = 'ticket/'. $this->ticketId .'/favorite';

        $icon_full = false;
        if (!Auth::guest()) {
            $fav = TicketFavorite::where('user_id', Auth::user()->id)
            ->where('ticket_id', $this->ticketId)->first();
            if ($fav) {
                $fav_href = 'ticket/favorite/'. $fav->id .'/delete';
                $icon_full = true;
            }
        }
        return view('components.favorite-icon', compact('icon_full', 'fav_href'));
    }
}
