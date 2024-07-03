<?php

namespace App\Http\Controllers\buyer;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Requirement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyerDashBoardController extends Controller
{
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
      }

    public function dashboard() {

        return view('buyer.buyerDashboard');

    }



    public function BuyerList(Request $request)
    {
        $search = $request->input('search');

        $query = User::where('user_type', 'Buyer');

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('id', $search)
                  ->orWhere('name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%")
                  ->orWhere('mobile', 'LIKE', "%{$search}%");

            });
        }

        // Paginate results
        $users = $query->paginate(10);

        return view('buyer.management.list', [
            'users' => $users,
            'search' => $search,
        ]);
    }

    public function BuyerShow($id)
    {

        $user = User::where('user_type', 'Buyer')->findOrFail($id);

        return view('buyer.management.show', compact('user'));
    }


    public function BuyerOfferIndex(Request $request)
    {
        // Get the search query
        $search = $request->input('search');

        // Query offers with search functionality
        $query = Offer::query();

        // Filter to show only brokers
        $query->whereHas('user', function ($query) {
            $query->where('user_type', 'Buyer');
        });

        // Add search functionality if a search term is provided
        if ($request->filled('search')) {
            $searchTerm = $request->get('search');
            $query->where(function ($query) use ($searchTerm) {
                $query->whereHas('user', function ($query) use ($searchTerm) {
                        $query->where('name', 'like', '%' . $searchTerm . '%')
                              ->orWhere('user_type', 'like', '%' . $searchTerm . '%');
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

        // Paginate results
        $offers = $query->paginate(10); // Adjust the number as needed

        // Pass the offers and the search term to the view
        return view('buyer.offer.list', [
            'offers' => $offers,
            'search' => $search,
        ]);
    }


    public function BrokerOfferShow($id)
    {

        $offer = Offer::with('user')->findOrFail($id);

        return view('buyer.offer.show', compact('offer'));
    }


    public function BuyerRequirementIndex(Request $request)
    {

        $search = $request->input('search');


        $query = Requirement::query();


        $query->whereHas('user', function ($query) {
            $query->where('user_type', 'Buyer');
        });

        if ($request->filled('search')) {
            $searchTerm = $request->get('search');
            $query->where(function ($query) use ($searchTerm) {
                $query->whereHas('user', function ($query) use ($searchTerm) {
                        $query->where('name', 'like', '%' . $searchTerm . '%')
                              ->orWhere('user_type', 'like', '%' . $searchTerm . '%');
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



        $offers = $query->paginate(10);


        return view('buyer.requirement.list', [
            'offers' => $offers,
            'search' => $search,
        ]);
    }


    public function BuyerRequirementShow($id)
    {

        $offer = Requirement::with('user')->findOrFail($id);

        return view('buyer.requirement.show', compact('offer'));
    }



}