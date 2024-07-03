<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class EventController extends Controller
{
    public function eventAdd(Request $request, $user_id)
    {
        // Validate the request data without 'user_id'
        $validator = Validator::make($request->all(), [
            'event_date' => 'required|date_format:d/m/Y',
            'event_charge' => 'required|numeric',
            'event_description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            // Return validation errors with a 422 Unprocessable Entity status
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Convert date to MySQL format
        $eventDate = Carbon::createFromFormat('d/m/Y', $request->event_date)->format('Y-m-d');

        // Handle the image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = public_path('uploads');
            $file->move($path, $filename);
        } else {
            $filename = null; // Handle the case where no image is provided
        }


        $event = Event::create([
            'user_id' => $user_id,
            'event_date' => $eventDate,
            'event_charge' => $request->event_charge,
            'event_description' => $request->event_description,
            'image' => $filename,
        ]);

        return response()->json(['event' => $event], 201);
    }


    public function events()
    {

        $events = Event::with('user')->get();

        $eventsWithUserNames = $events->map(function ($event) {
            return [
                'id' => $event->id,
                'event_date' => $event->event_date,
                'event_charge' => $event->event_charge,
                'event_description' => $event->event_description,
                'image' => $event->image,
                'user_id' => $event->user_id,
                'user_name' => $event->user ? $event->user->name : null,
            ];
        });

        return response()->json($eventsWithUserNames);
    }




}