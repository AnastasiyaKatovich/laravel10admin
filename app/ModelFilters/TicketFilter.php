<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class TicketFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function country($country_id = null){
        if ($country_id!=0) {
            return $this->where('country_id', $country_id);
        }
    }

    public function from($event_value = null){
        if ($event_value) {
            return $this->where('event_datetime', '>', $event_value);
        }
    }

    public function to($event_value = null){
        if ($event_value) {
            return $this->where('event_datetime', '<', $event_value);
        }
    }



    public function online($online = null){
        if ($online=='on') {
            return $this->where('online', 1);
        }
        else{
            return $this->where('online', 0);
        }

    }
}
