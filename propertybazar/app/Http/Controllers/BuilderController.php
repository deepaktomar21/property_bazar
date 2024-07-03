<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Add this line
use App\Models\Builder;

class BuilderController extends Controller
{
    public function builderIndex(Request $request)
    {
        // Get the search query
        $search = $request->input('search');

        // Query builders with search functionality
        $query = Builder::query();
        if ($search) {
            $query->where('id', $search)
                  ->orWhere('builder_name', 'LIKE', "%{$search}%")
                  ->orWhere('property_type', 'LIKE', "%{$search}%");
        }

        // Paginate results
        $builders = $query->paginate(10); // Adjust the number as needed

        // Pass the builders and the search term to the view
        return view('admin.builder.list', [
            'builders' => $builders,
            'search' => $search,
        ]);
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Builder::whereIn('id', $ids)->delete();

        return response()->json(["success" => "Builder details have been deleted"]);
    }

    public function create()
    {
        $builders = Builder::orderBy('id')->get();
        return view('admin.builder.create', ['builders' => $builders]);
    }

    public function builderStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'builder_name' => 'required',
            'membership_id' => 'required',
            'rera_no' => 'required',
            'city' => 'required',
            'zones' => 'required',
            'area' => 'required',
            'company' => 'required',
            'working_area' => 'required',
            'deal_in' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'end_date' => 'required'
        ]);

        if ($validator->passes()) {
            $builder = new Builder();
            $builder->builder_name = $request->builder_name;
            $builder->membership_id = $request->membership_id;
            $builder->rera_no = $request->rera_no;
            $builder->city = $request->city;
            $builder->zones = $request->zones;
            $builder->area = $request->area;
            $builder->company = $request->company;
            $builder->working_area = $request->working_area;
            $builder->deal_in = $request->deal_in;
            $builder->email	 = $request->email;
            $builder->phone = $request->phone;
            $builder->end_date = $request->end_date;
            $builder->save();

            return redirect()->route('admin.builder.list');
        } else {
            return back()->withErrors($validator)->withInput();
        }
    }

    public function builderEdit($id)
    {
        $builder = Builder::findOrFail($id);
        return view('admin.builder.edit', ['builder' => $builder]);
    }

    public function builderUpdate(Request $request, $id) // Corrected method name
    {
        $validator = Validator::make($request->all(), [
            'builder_name' => 'required',
            'membership_id' => 'required',
            'rera_no' => 'required',
            'city' => 'required',
            'zones' => 'required',
            'area' => 'required',
            'company' => 'required',
            'working_area' => 'required',
            'deal_in' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'end_date' => 'required'
        ]);

        if ($validator->passes()) {
            $builder = Builder::findOrFail($id);
            $builder->builder_name = $request->builder_name;
            $builder->membership_id = $request->membership_id;
            $builder->rera_no = $request->rera_no;
            $builder->city = $request->city;
            $builder->zones = $request->zones;
            $builder->area = $request->area;
            $builder->company = $request->company;
            $builder->working_area = $request->working_area;
            $builder->deal_in = $request->deal_in;
            $builder->email	 = $request->email;
            $builder->phone = $request->phone;
            $builder->end_date = $request->end_date;
            $builder->save();

            return redirect()->route('admin.builder.list');
        } else {
            return back()->withErrors($validator)->withInput();
        }
    }

    public function builderDestroy($id)
    {
        $builder = Builder::findOrFail($id);
        $builder->delete();

        return back();
    }

    public function builderShow($id)
    {
        $builder = Builder::findOrFail($id);
        return view('admin.builder.show', ['builder' => $builder]);
    }
}
