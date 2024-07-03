<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;


class ClientController extends Controller
{
    public function clientIndex(Request $request)
    {
        // Get the search query
        $search = $request->input('search');

        // Query home loans with search functionality
        $query = Client::query();
        if ($search) {
            $query->where('id', $search)
                  ->orWhere('client_name', 'LIKE', "%{$search}%")
                  ->orWhere('address', 'LIKE', "%{$search}%");
        }

        // Paginate results
        $clients = $query->paginate(10); // Adjust the number as needed

        // Pass the home loans and the search term to the view
        return view('admin.client.list', [
            'clients' => $clients,
            'search' => $search,
        ]);
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        // Perform validation if $ids contain valid IDs before deletion
        if (!empty($ids)) {
            client::whereIn('id', $ids)->delete();
            return response()->json(["success" => "Home loans have been deleted"]);
        } else {
            return response()->json(["error" => "No valid IDs provided for deletion"]);
        }
    }

    public function clientAdd()
    {
        return view('admin.client.create');
    }

    public function clientStore(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [

            'client_name' => 'required|string|max:255',
            'contact_number' => 'required|max:255',
            'address' => 'required',
        ]);

        if ($validator->passes()) {
            $client = new Client();
            $client->client_name = $request->client_name;
            $client->contact_number = $request->contact_number;
            $client->address = $request->address;
            $client->save();

            return redirect()->route('admin.client.list')->with('success', 'client created successfully');
        } else {
            return redirect()->route('admin.client.create')->withErrors($validator)->withInput();
        }
    }

    public function clientEdit($id)
    {
        $client = client::findOrFail($id);
        return view('admin.client.edit', ['client' => $client]);
    }

    public function clientUpdate(Request $request, $id)
    {
       // dd($request->all());
        $validator = Validator::make($request->all(), [
            'client_name' => 'required|string|max:255',
            'contact_number' => 'required|max:255',
            'address' => 'required',
        ]);

        if ($validator->passes()) {

            $client = Client::findOrFail($id);
            $client->client_name = $request->client_name;
            $client->contact_number = $request->contact_number;
            $client->address = $request->address;
            $client->save();

            return redirect()->route('admin.client.list')->with('success', 'Home loan updated successfully');
        } else {
            return redirect()->route('admin.client.edit', $id)->withErrors($validator)->withInput();
        }
    }

    public function clientDestroy($id)
    {
        $client = client::findOrFail($id);
        $client->delete();

        return redirect()->route('admin.client.list')->with('success', 'client deleted successfully');
    }

    public function clientShow($id)
    {
        $client = Client::findOrFail($id);
        return view('admin.client.show', ['client' => $client]);
    }
}
