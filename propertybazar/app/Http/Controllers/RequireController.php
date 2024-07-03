<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requirement;
use Illuminate\Support\Facades\Validator;


class RequireController extends Controller
{
    // public function showList(){
    //     return view('admin.require.list');
    //     $inventorys = Inventory::get();
    //     return view('admin.requirements.reqiurelist',['inventorys' => $inventorys]);
    //   }

    public function showList(Request $request)
    {
        // Get the search query
        $search = $request->input('search');

        // Query offers with search functionality
        $query = Requirement::query();
        if ($search) {
            $query->where('id', $search)
                  ->orWhere('location', 'LIKE', "%{$search}%")
                  ->orWhere('property_type', 'LIKE', "%{$search}%");
        }

        // Paginate results
        $requirements = $query->paginate(10); // Adjust the number as needed

        // Pass the offers and the search term to the view
        return view('admin.require.list', [
            'requirements' => $requirements,
            'search' => $search,
        ]);
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Requirement::whereIn('id', $ids)->delete();

        return response()->json(["success" => "Requirements have been deleted"]);
    }

    public function create()
    {
        $requirements = Requirement::orderBy('id')->get();
        // $company = Company::orderBy('id')->get();

        // $requirements = Re->paginate(10); // Adjust the number as needed
        // Initialize requirement variable or fetch it from your database
        return view('admin.require.create', ['requirements'=>$requirements]);
    }


    public function requireStore(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'location' => 'required',
            'property_type' => 'required',
            'price' => 'required',
            'area_sqrtFit' => 'required',
            'user_name' => 'required',
            'membership_id' => 'required',
            'contact_number' => 'required',
        ]);

        if ($validator->passes()) {
            // Save data here
            $requirement = new Requirement();
            $requirement->location = $request->location;
            $requirement->property_type = $request->property_type;
            $requirement->price = $request->price;
            $requirement->area_sqrtFit = $request->area_sqrtFit;
            $requirement->user_name = $request->user_name;
            $requirement->membership_id = $request->membership_id;
            $requirement->contact_number = $request->contact_number;
            $requirement->save();

            return redirect()->route('admin.require.list');
        } else {
            return redirect()->route('admin.require.create')->withErrors($validator)->withInput();
        }
    }

    public function requireEdit($id)
    {
        $requirement = Requirement::findOrFail($id);

        return view('admin.require.edit', ['requirement' => $requirement]);
    }

    public function requireUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'location' => 'required',
            'property_type' => 'required',
            'price' => 'required',
            'area_sqrtFit' => 'required',
            'user_name' => 'required',
            'membership_id' => 'required',
            'contact_number' => 'required',
        ]);

        if ($validator->passes()) {
            // Save data here
            $requirement = Requirement::find($id);
            $requirement->location = $request->location;
            $requirement->property_type = $request->property_type;
            $requirement->price = $request->price;
            $requirement->area_sqrtFit = $request->area_sqrtFit;
            $requirement->user_name = $request->user_name;
            $requirement->membership_id = $request->membership_id;
            $requirement->contact_number = $request->contact_number;
            $requirement->save();

            return redirect()->route('admin.require.list');
        } else {
            return redirect()->route('admin.require.edit', $id)->withErrors($validator)->withInput();
        }
    }

    public function requireDestroy($id)
    {
        $requirement = Requirement::findOrFail($id);
        $requirement->delete();

        return back();
    }

    public function requireShow($id)
    {
        $requirement = Requirement::findOrFail($id);

        return view('admin.require.show', ['requirement' => $requirement]);
    }
}
