<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeLoan;
use App\Models\Client;


class LoanController extends Controller
{
    public function homeIndex()
    {
        return HomeLoan::all();
    }

    public function homeStore(Request $request)
    {
        $request->validate([
            'loan_description' => 'required',
        ]);

        $homeLoan = new HomeLoan;
        $homeLoan->loan_description = $request->loan_description;
        $homeLoan->save();

        return response()->json($homeLoan, 201);
    }

    public function clientIndex()
    {
        return Client::all();
    }

    public function clientStore(Request $request)
    {
        $request->validate([
            'client_name' => 'required',
            'contact_number' => 'required',
            'address' => 'required',
        ]);

        $client = new Client;
        $client->client_name = $request->client_name;
        $client->contact_number = $request->contact_number;
        $client->address = $request->address;
        $client->save();

        return response()->json($client, 201);
    }
    
       
    public function getLoans()
    {
        $homeloans = HomeLoan::all();
        return response()->json($homeloans);
    }
}
