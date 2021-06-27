<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

//laravel.com/docs/master/eloquent#events
class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['from', 'to'];

    public function bookable()
    {
        return $this->belongsTo(Bookable::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }

    // customise the query
    public function scopeBetweenDates(Builder $query, $from, $to){
        return $query->where('to', '>=', $from)
            ->where('from', '<=', $to);
    }

    protected static function boot()
    {
      parent::boot();

      static::creating(function($booking){
        $booking->review_key = Str::uuid();
      });
    }
}
