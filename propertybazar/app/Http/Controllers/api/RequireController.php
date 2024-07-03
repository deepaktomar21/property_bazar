<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Requirement;
use Illuminate\Http\Request;

class RequireController extends Controller
{
    /**
     * Display a listing of the requirements.
     *
     * @return \Illuminate\Http\Response
     */
    public function requireIndex()
    {
        return Requirement::all();
    }

    /**
     * Store a newly created requirement in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function requireStore(Request $request)
    {
        // Create the requirement without validation
        $requirement = Requirement::create([
            'location' => $request->input('location'),
            'property_type' => $request->input('property_type'),
            'price' => $request->input('price'),
            'area_sqrtFit' => $request->input('area_sqrtFit'),
            'user_name' => $request->input('user_name'),
            'membership_id' => $this->generateMembershipId($request->input('user_name'), $request->input('contact_number')),
            'contact_number' => $request->input('contact_number'),
            'description' => $request->input('description'),
        ]);

        // Return response
        return response()->json([
            'success' => true,
            'message' => 'Requirement added successfully',
            'data' => $requirement,
        ], 200);
    }

    /**
     * Generate a unique 6-digit membership ID using name and phone.
     *
     * @param string $user_name
     * @param string $contact_number
     * @return string
     */
    private function generateMembershipId($user_name, $contact_number)
    {
        // Combine name and phone
        $input = $user_name . $contact_number;

        // Hash the combined string
        $hash = md5($input);

        // Convert hash to a number and take the first 6 digits
        $number = substr(preg_replace('/[^0-9]/', '', $hash), 0, 6);

        // Ensure it's exactly 6 digits
        return str_pad($number, 6, '0', STR_PAD_LEFT);
    }

    /**
     * Display the specified requirement.
     *
     * @param \App\Models\Requirement $requirement
     * @return \Illuminate\Http\Response
     */
    public function show(Requirement $requirement)
    {
        return $requirement;
    }

    // Uncomment and implement if needed

    // public function update(Request $request, Requirement $requirement)
    // {
    //     $requirement->update($request->all());
    //     return response()->json($requirement, 200);
    // }

    // public function destroy(Requirement $requirement)
    // {
    //     $requirement->delete();
    //     return response()->json(null, 204);
    // }

    public function getRequirements()
    {
        $requirements = Requirement::all();
        return response()->json($requirements);
    }



    public function BrokerOfferIndex(Request $request)
    {
        // Get the search query
        $search = $request->input('search');

        // Query offers with search functionality
        $query = Requirement::query();

        // Filter to show only brokers
        $query->whereHas('user', function ($query) {
            $query->where('user_type', 'broker');
        });

        // Add search functionality if a search term is provided
        if ($request->filled('search')) {
            $searchTerm = $request->get('search');
            $query->where(function ($query) use ($searchTerm) {
                $query->whereHas('user', function ($query) use ($searchTerm) {
                        $query->where('name', 'like', '%' . $searchTerm . '%');
                    })
                    ->orWhere('description', 'like', '%' . $searchTerm . '%')
                    ->orWhere('want_to_list', 'like', '%' . $searchTerm . '%')
                    ->orWhere('service_type', 'like', '%' . $searchTerm . '%')
                    ->orWhere('property_type', 'like', '%' . $searchTerm . '%')
                    ->orWhere('city', 'like', '%' . $searchTerm . '%')
                    ->orWhere('zone', 'like', '%' . $searchTerm . '%')
                    ->orWhere('location', 'like', '%' . $searchTerm . '%')
                    ->orWhere('price', 'like', '%' . $searchTerm . '%')
                    ->orWhere('configuration', 'like', '%' . $searchTerm . '%')
                    ->orWhere('furnished_type', 'like', '%' . $searchTerm . '%')
                    ->orWhere('sqft', 'like', '%' . $searchTerm . '%');
            });
        }

        // Get all the results
        $offers = $query->get();

        // Return the offers as a JSON response
        return response()->json([
            'status' => 200,
            'message' => 'Broker fetched successfully',
            'data' => $offers,
        ]);
    }
}