<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Select;
use App\Models\User;

use Illuminate\Support\Facades\Validator;



class UserController extends Controller
{

     public function select(Request $request)
    {
        $search = $request->input('search');

        $query = Select::with('user'); // Load related user data

        if ($search) {
            $query->where('id', $search)
                  ->orWhere('name', 'LIKE', "%{$search}%")
                  ->orWhereHas('user', function ($query) use ($search) {
                      $query->where('membership_id', 'LIKE', "%{$search}%")
                            ->orWhere('name', 'LIKE', "%{$search}%"); // Add name search from users table
                  });
        }

        $selects = $query->paginate(20);

        return view('admin.user.select', [
            'selects' => $selects,
            'search' => $search,
        ]);
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;

        if (!empty($ids)) {
            Select::whereIn('id', $ids)->delete();
            return response()->json(["success" => "Users have been deleted"]);
        } else {
            return response()->json(["error" => "No users selected for deletion"]);
        }
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'rera_no' => 'required',
            'city' => 'required',
            'zones' => 'required',
            'area' => 'required',
            'company' => 'required',
            'working_area' => 'required',
            'deal_in' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'end_date' => 'required',
        ]);

        if ($validator->passes()) {
            $user = User::findOrFail($request->user_id);
            $data = $request->all();
            $data['name'] = $user->name;
            $data['membership_id'] = $user->membership_id;
            Select::create($data);

            $request->session()->flash('success', 'Company added successfully');
            return redirect()->route('admin.user.select');
        } else {
            return redirect()->route('admin.user.create')->withErrors($validator)->withInput();
        }
    }

    public function edit($id)
    {
        $select = Select::with('user')->findOrFail($id);
        return view('admin.user.edit', ['select' => $select]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'rera_no' => 'required',
            'city' => 'required',
            'zones' => 'required',
            'area' => 'required',
            'company' => 'required',
            'working_area' => 'required',
            'deal_in' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'end_date' => 'required',
        ]);

        if ($validator->passes()) {
            $user = User::findOrFail($request->user_id);
            $select = Select::findOrFail($id);
            $data = $request->all();
            $data['name'] = $user->name;
            $data['membership_id'] = $user->membership_id;
            $select->update($data);

            $request->session()->flash('success', 'User updated successfully');
            return redirect()->route('admin.user.select');
        } else {
            return redirect()->route('admin.user.edit', $id)->withErrors($validator)->withInput();
        }
    }

    public function destroy($id)
    {
        $select = Select::where('id', $id)->first();
        $select->delete();
        return back();
    }

    public function show($id)
    {
        $select = Select::with('user')->findOrFail($id);
        return view('admin.user.show', ['select' => $select]);
    }}
