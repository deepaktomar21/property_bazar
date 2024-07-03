<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agent;
use Illuminate\Support\Facades\Validator;



class AgentController extends Controller
{

    public function index()
    {
        return Agent::all();
    }

    public function agentStore(Request $request)
    {
        $agent = Agent::create([
            'agent_name' => $request->input('agent_name'),
            'membership_id' =>  $this->generateMembershipId($request->agent_name, $request->contact_number),
            'rera_no' => $request->input('rera_no'),
            'city' => $request->input('city'),
            'zones' => $request->input('zones'),
            'area' => $request->input('area'),
            'company' => $request->input('company'),
            'working_area' => $request->input('working_area'),
            'deal_in' => $request->input('deal_in'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'end_date' => $request->input('end_date'),



        ]);

        return response()->json([
            'success' => true,
            'message' => 'Agent added successfully',
            'data' => $agent
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

 public function getAgents()
    {
        $agents = Agent::all();
        return response()->json($agents);
    }

}
