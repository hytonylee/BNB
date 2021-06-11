<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bookable;

class BookableAvailabilityController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id, Request $request)
    {
        // dd('Hello there!');
        $data = $request->validate([
            'from' => 'required|date_format:Y-m-d|after_or_equal:today',
            'to' => 'required|date_format:Y-m-d|after_or_equal:from'
        ]);

        // dd($data);
        $bookable = Bookable::findOrFail($id);

        return $bookable->availableFor($data['from'], $data['to'])
                ? response()->json([])
                : response()->json([], 404);
    }
}
