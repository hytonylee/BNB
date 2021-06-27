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
    public function scopeBetweenDates(Builder $query, $from, $to)
    {
      return $query->where('to', '>=', $from)
          ->where('from', '<=', $to);
    }

    // find booking by review_key
    // since php7, you can add what class expect to return in a function
    // ?Booking this means you expect instance of booking to return or null
    public static function findByReviewKey(string $reviewKey): ?Booking
    {
      return static::where('review_key', $reviewKey)->with('bookable')->get()->first();
    }

    protected static function boot()
    {
      parent::boot();

      static::creating(function($booking){
        $booking->review_key = Str::uuid();
      });
    }
}
