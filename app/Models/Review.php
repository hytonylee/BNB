<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function bookable()
    {
        return $this->belongsTo(Bookable::class);
    }

    public function booking()
    {
        return $this->belongTo(Booking::class);
    }

    public function getIncrementing()
    {
        //since we have change the id as uuid, we need to change disable the getIncrementing function.
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
}
