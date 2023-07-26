<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use EloquentFilter\Filterable;

class Ticket extends Model implements HasMedia
{
    use HasFactory, Filterable, InteractsWithMedia;
    public $fillable = ['user_id', 'place_id', 'catalog_id', 'subcatalog_id', 'body', 'name', 'event_datetime', 'price', 'active', 'online', 'country_id', 'currency_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function currency(){
        return $this->belongsTo(Currency::class);
    }
}
