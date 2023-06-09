<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketMain extends Model
{
    use HasFactory;
    public function main(){
        return $this->belongsTo(Ticket::class);
    }
}
