<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['from', 'to'];

    public function bookable(){
        return $this->belongsTo(Bookable::class);
    }

    // customise the query
    public function scopeBetweenDates(Builder $query, $from, $to){
        return $query->where('to', '>=', $from)
            ->where('from', '<=', $to);
    }
}
