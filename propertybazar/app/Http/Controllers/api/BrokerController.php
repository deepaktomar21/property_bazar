<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Broker;
use Illuminate\Support\Str;

class BrokerController extends Controller
{
    public function index()
    {
        return Broker::all();
    }

    public function brokerStore(Request $request)
    {
        $broker = Broker::create([
            'broker_name' => $request->input('broker_name'),
            'membership_id' =>  $this->generateMembershipId($request->broker_name, $request->contact_number),
            'location' => $request->input('location'),
            'contact_number' => $request->input('contact_number'),
            'deals_description' => $request->input('deals_description'),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Broker added successfully',
            'data' => $broker
        ], 200);
    }
/**
     * Generate a unique 6-digit membership ID using name and phone.
     *
     * @param string $broker_name
     * @param string $contact_number
     * @return string
     */
    private function generateMembershipId($broker_name, $contact_number)
    {
        // Combine name and phone
        $input = $broker_name . $contact_number;

        // Hash the combined string
        $hash = md5($input);

        // Convert hash to a number and take the first 6 digits
        $number = substr(preg_replace("/[^0-9]/", '', $hash), 0, 6);

        // Ensure it's exactly 6 digits
        return str_pad($number, 6, '0', STR_PAD_LEFT);
    }


    
      
    public function getBrokers()
    {
        $brokers = Broker::all();
        return response()->json($brokers);
    }
}
