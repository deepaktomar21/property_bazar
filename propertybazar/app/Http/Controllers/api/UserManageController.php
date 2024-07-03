<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Make sure to import the User model
use App\Models\Select; // Make sure to import the Select model
use Illuminate\Support\Facades\Hash; // Import Hash facade

class UserManageController extends Controller
{
  public function user_info()
    {
        $user = User::with('selects')->findOrFail(request()->user()->id);
        return response()->json(['user' => $user]);
    }

    public function users()
    {
        $users = User::where('role', 'user')->with('selects')->get();
        return response()->json(['users' => $users]);
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|numeric|digits:10|unique:users,mobile,' . $id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'sometimes|nullable|string|min:4|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        return response()->json(['message' => 'User updated successfully']);
    }

    public function Userupdate(Request $request)
    {
        // Validate the request data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'rera_no' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zones' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'working_area' => 'required|string|max:255',
            'deal_in' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:20',
            'end_date' => 'required|date',
        ]);

        // Retrieve the Select model associated with the user_id or create a new instance
        $select = Select::firstOrNew(['user_id' => $request->user_id]);

        // Fetch the user details from the users table
        $user = User::findOrFail($request->user_id);

        // Update the fields with the data from the request and the fetched user data
        $select->user_id = $request->user_id;
        $select->name = $user->name; // Fetch the name from the User model
        $select->membership_id = $user->membership_id; // Fetch the membership_id from the User model
        $select->rera_no = $request->rera_no;
        $select->city = $request->city;
        $select->zones = $request->zones;
        $select->area = $request->area;
        $select->company = $request->company;
        $select->working_area = $request->working_area;
        $select->deal_in = $request->deal_in;
        $select->email = $request->email;
        $select->phone = $request->phone;
        $select->end_date = $request->end_date;

        // Save the updated or new model
        $select->save();

        // Return a JSON response indicating success along with the updated data
        return response()->json([
            'message' => 'User Management updated successfully',
            'data' => $select
        ]);
    }

    public function getUsers()
    {
        $selects = Select::all();
        return response()->json($selects);
    }
}
