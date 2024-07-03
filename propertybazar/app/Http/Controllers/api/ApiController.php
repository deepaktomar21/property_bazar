<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4',
            'confirm_password' => 'required|same:password',
            'user_type' => 'required|string' // Add usertype to validation rules
        ]);

        if ($validator->fails()) {
            return response()->json(["status" => 400, "success" => false, "message" => $validator->messages()->first()]);
        }

        $user = new User;
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->confirm_password = Hash::make($request->confirm_password);


        // Set the usertype
        $user->user_type = $request->user_type;

        // Generate membership ID
        $user->membership_id = 'MEM' . strtoupper(Str::random(8));

        $user->save();

        if ($user) {
            return response()->json(["status" => 200, "data" => $user, "message" => 'Registered successfully']);
        } else {
            return response()->json(["status" => 400, "message" => 'Something went wrong']);
        }
    }

    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication successful
            $user = Auth::user(); // Use 'user' instead of 'User'

            return response()->json([
                "data" => $user, // Use lowercase 'data' for consistency
                "status" => 200,
                "message" => 'Login successful',
            ]);
        } else {
            // Authentication failed
            return response()->json(["status" => 400, "message" => 'Incorrect email or password'], 400);
        }
    }
    public function getUsers(Request $request)
    {
        // Retrieve users ordered by creation date in descending order
        $users = User::orderBy('created_at', 'desc')->get();

        return response()->json([
            "status" => 200,
            "data" => $users
        ]);
    }

    public function userupdate(Request $request, $user_id)
    {
        // Find the user by ID
        $user = User::find($user_id);

        // Check if the user exists
        if (!$user) {
            return response()->json(['status' => 404, 'success' => false, 'message' => 'User not found']);
        }

        // Validate the request data, excluding the current user's mobile number from the uniqueness check
        $validator = Validator::make($request->all(), [
            'rera_no' => 'nullable|string|max:255',
            'cities' => 'nullable|string|max:255',
            'zones' => 'nullable|string|max:255',
            'area' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'working_area' => 'nullable|string|max:255',
            'deal_in' => 'nullable|string|max:255',
            'end_date' => 'nullable|date_format:Y-m-d',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Add image validation
        ]);

        if ($validator->fails()) {
            return response()->json(["status" => 400, "success" => false, "message" => $validator->messages()->first()]);
        }

        // Handle the image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = public_path('uploads');
            $file->move($path, $filename);
            $user->image = $filename; // Update the user's image field
        }

        // Update user details
        $user->rera_no = $request->rera_no;
        $user->cities = $request->cities;
        $user->zones = $request->zones;
        $user->area = $request->area;
        $user->company = $request->company;
        $user->working_area = $request->working_area;
        $user->deal_in = $request->deal_in;
        $user->end_date = $request->end_date;
        $user->save();

        return response()->json(['status' => 200, 'success' => true, 'message' => 'User updated successfully']);
    }
}