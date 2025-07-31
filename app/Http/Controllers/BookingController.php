<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Http\Resources\BookingResource;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function allBookings(Request $request)
    {
        $bookings = Booking::select(
            'bookings.*',
            'services.name as service_name',
            'users.name as user_name'
        )
            ->join('services', 'bookings.service_id', '=', 'services.id')
            ->join('users', 'bookings.user_id', '=', 'users.id')

            ->get();
        return BookingResource::collection($bookings);
    }

    public function user_bookings(Request $request)
    {
        $bookings = Booking::select(
            'bookings.*',
            'services.name as service_name',
            'users.name as user_name'
        )
            ->join('services', 'bookings.service_id', '=', 'services.id')
            ->join('users', 'bookings.user_id', '=', 'users.id')
            ->where('bookings.user_id', auth()->id())
            ->get();

        return BookingResource::collection($bookings);
    }
    public function store_booking(BookingRequest $request)
    {
       
        Booking::create([
            'user_id'      => auth()->id(),
            'service_id'   => $request->service_id,
            'booking_date' => $request->booking_date,
            'status'       => 'pending',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Booking stored successfully.',

        ], 200);
    }
}
