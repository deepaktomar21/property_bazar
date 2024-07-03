<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Validator;


class EventController extends Controller
{
    public function eventIndex(Request $request)
    {
        $search = $request->input('search');

        $query = Event::query();
        if ($search) {
            $query->where('id', $search)
                  ->orWhere('event_date',  "%{$search}%")
                  ->orWhere('event_description',  "%{$search}%");
        }

        $events = $query->paginate(10);

        return view('admin.event.list', [
            'events' => $events,
            'search' => $search,
        ]);
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;

        if (!empty($ids)) {
            Event::whereIn('id', $ids)->delete();
            return response()->json(["success" => "Event have been deleted"]);
        } else {
            return response()->json(["error" => "No valid IDs provided for deletion"]);
        }
    }

    public function eventCreate()
    {
        return view('admin.event.create');
    }

    public function eventStore(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'event_date' => 'required',
            'event_charge' => 'required',
            'event_description' => 'required',
            'image' => 'nullable', // updated validation for image

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

         // Upload images
         if ($request->hasFile('images')) {
            $file = $request->file('images');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/';
            $file->move($path, $filename);
        } else {
            $filename = null; // or handle the case where no image is provided
        }

        //$event = new Event;
        Event::create([
        'event_date' => $request->event_date,
       'event_charge' => $request->event_charge,
        'event_description' => $request->event_description,
       'image' => $imageName,
    ]);

        return redirect()->route('admin.event.list')->with('success', 'News added successfully');
    }

    public function eventEdit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.event.edit', ['event' => $event]);
    }

    public function eventUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'event_date' => 'required',
            'event_charge' => 'required',
            'event_description' => 'required',
            'image' => 'required', // updated validation for image
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $event = Event::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $image->image = $imageName;
        }

        $event->event_date = $request->event_date;
        $event->event_charge = $request->event_charge;
        $event->event_description = $request->event_description;
        $event->image = $imageName;
        $event->save();
        return redirect()->route('admin.event.list')->with('success', 'Event updated successfully');
    }

    public function eventDestroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('admin.event.list')->with('success', 'Event deleted successfully');
    }

    public function eventShow($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.event.show', ['event' => $event]);
    }
}
