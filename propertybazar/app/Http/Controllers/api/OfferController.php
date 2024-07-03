<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer; // Ensure Offer model is imported
use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{
    public function offerIndex()
    {
        return response()->json(Offer::all(), 200);
    }
    public function offerStore(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'building_name' => 'required',
            'location' => 'required',
            'offers' => 'required',
            'price' => 'required',
            'description' => 'required',
            'images' => 'nullable|image', 
            'contact_number' => 'required',
        ]);

        if ($validator->fails()) {
            // Return validation errors with a 422 Unprocessable Entity status
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Handle the image upload
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = public_path('uploads');
            $file->move($path, $filename);
        } else {
            $filename = null; // Handle the case where no image is provided
        }

        // Create a new offer
        $offer = Offer::create([
            'building_name' => $request->building_name,
            'location' => $request->location,
            'offers' => $request->offers,
            'price' => $request->price,
            'description' => $request->description,
            'images' => $filename,
            'contact_number' => $request->contact_number,
        ]);

        // Return the created offer with a 201 Created status
        return response()->json($offer, 201);
    }
    public function offers()
    {
        $offers = Offer::all();
        return response()->json($offers);
    }

}

