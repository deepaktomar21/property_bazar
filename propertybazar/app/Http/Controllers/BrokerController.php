<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Broker;
use Illuminate\Support\Facades\Validator;

class BrokerController extends Controller
{

   

    public function showIndex(Request $request)
    {
        // Get the search query
        $search = $request->input('search');

        // Query brokers with search functionality
        $query = Broker::query();
        if ($search) {
            $query->where('id', $search)
                  ->orWhere('broker_name', 'LIKE', "%{$search}%")
                  ->orWhere('property_type', 'LIKE', "%{$search}%");
        }

        // Paginate results
        $brokers = $query->paginate(10); // Adjust the number as needed

        // Pass the brokers and the search term to the view
        return view('admin.broker.list', [
            'brokers' => $brokers,
            'search' => $search,
        ]);
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Broker::whereIn('id', $ids)->delete();

        return response()->json(["success" => "Brokers details have been deleted"]);
    }

    public function create()
    {
        $brokers = Broker::orderBy('id')->get();
        return view('admin.broker.create', ['brokers' => $brokers]);
    }

    public function brokerStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'broker_name' => 'required',
            'membership_id' => 'required',
            'location' => 'required',
            'contact_number' => 'required',
            'deals_description' => 'required'
        ]);

        if ($validator->passes()) {
            $broker = new Broker();
            $broker->broker_name = $request->broker_name;
            $broker->membership_id = $request->membership_id;
            $broker->location = $request->location;
            $broker->contact_number = $request->contact_number;
            $broker->deals_description = $request->deals_description;
            $broker->save();

            return redirect()->route('admin.broker.list');
        } else {
            return redirect()->route('admin.broker.create')->withErrors($validator)->withInput();
        }
    }

    public function brokerEdit($id)
    {
        $broker = Broker::findOrFail($id);
        return view('admin.broker.edit', ['broker' => $broker]);
    }

    public function brokerUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'broker_name' => 'required',
            'membership_id' => 'required',
            'location' => 'required',
            'contact_number' => 'required',
            'deals_description' => 'required'
        ]);

        if ($validator->passes()) {
            $broker = Broker::findOrFail($id);
            $broker->broker_name = $request->broker_name;
            $broker->membership_id = $request->membership_id;
            $broker->location = $request->location;
            $broker->contact_number = $request->contact_number;
            $broker->deals_description = $request->deals_description;
            $broker->save();

            return redirect()->route('admin.broker.list');
        } else {
            return redirect()->route('admin.broker.edit', $id)->withErrors($validator)->withInput();
        }
    }

    public function brokerDestroy($id)
    {
        $broker = Broker::findOrFail($id);
        $broker->delete();

        return back();
    }

    public function brokerShow($id)
    {
        $broker = Broker::findOrFail($id);
        return view('admin.broker.show', ['broker' => $broker]);
    }
}
