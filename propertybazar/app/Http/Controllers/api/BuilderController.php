<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Builder;
use Illuminate\Support\Facades\Validator;

class BuilderController extends Controller
{
    public function builderStore(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'builder_name' => 'required|string|max:255',
            'rera_no' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zones' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'working_area' => 'required|string|max:255',
            'deal_in' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'end_date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 400);
        }

        // Create a new builder
        $builder = Builder::create([
            'builder_name' => $request->input('builder_name'),
            'membership_id' => $this->generateMembershipId($request->input('builder_name'), $request->input('phone')),
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
            'message' => 'Builder added successfully',
            'data' => $builder
        ], 200);
    }

    /**
     * Generate a unique 6-digit membership ID using name and phone.
     *
     * @param string $builder_name
     * @param string $contact_number
     * @return string
     */
    private function generateMembershipId($builder_name, $contact_number)
    {
        // Combine name and phone
        $input = $builder_name . $contact_number;

        // Hash the combined string
        $hash = md5($input);

        // Convert hash to a number and take the first 6 digits
        $number = substr(preg_replace("/[^0-9]/", '', $hash), 0, 6);

        // Ensure it's exactly 6 digits
        return str_pad($number, 6, '0', STR_PAD_LEFT);
    }

    public function getBuilders()
    {
        $builders = Builder::all();
        return response()->json($builders);
    }
}
