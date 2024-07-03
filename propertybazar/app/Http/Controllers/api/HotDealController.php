<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deal;


class HotDealController extends Controller
{
    // Retrieve all deals or filter by status
    public function dealIndex(Request $request)
    {
        $status = $request->query('status');
        if ($status) {
            $deals = Deal::where('status', $status)->get();
        } else {
            $deals = Deal::all();
        }
        return response()->json($deals);
    }

    // Create a new deal
    public function dealStore(Request $request)
    {
        // No validation here
        $deal = Deal::create($request->all());
        return response()->json($deal, 200);
    }

    // Update the status of a deal
    public function updatedealStatus(Request $request, $id)
    {
        $deal = Deal::findOrFail($id);

        // No validation here
        $deal->status = $request->input('status');
        $deal->save();

        return response()->json($deal);
    }
    
    public function getDeals()
    {
        $deals = Deal::all();
        return response()->json($deals);
    }
}

