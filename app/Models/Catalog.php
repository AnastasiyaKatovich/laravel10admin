<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;
    public $fillable=['name','body'];
    public function tickets(){
        return $this->hasMany(Ticket::class, 'catalog_id');
    }

}
