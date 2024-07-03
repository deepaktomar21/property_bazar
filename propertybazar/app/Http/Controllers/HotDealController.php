<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deal;
use Illuminate\Support\Facades\Validator;

class HotDealController extends Controller
{

    public function showDeal(Request $request)
    {
        // Get the search query
        $search = $request->input('search');

        // Query hot deals with search functionality
        $query = Deal::query();
        if ($search) {
            $query->where('id', $search)
                  ->orWhere('budget', 'LIKE', "%{$search}%")
                  ->orWhere('claimed', 'LIKE', "%{$search}%");
        }

        // Paginate results
        $deals = $query->paginate(10); // Adjust the number as needed

        // Pass the hot deals and the search term to the view
        return view('admin.hotdeals.list', [
            'deals' => $deals,
            'search' => $search,
        ]);
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        // Perform validation if $ids contain valid IDs before deletion
        if (!empty($ids)) {
            Deal::whereIn('id', $ids)->delete();
            return response()->json(["success" => "Hot deals have been deleted"]);
        } else {
            return response()->json(["error" => "No valid IDs provided for deletion"]);
        }
    }

    public function create()
    {
        $deals = Deal::orderBy('id')->get();
        return view('admin.hotdeals.create', ['deals' => $deals]);
    }

    public function dealStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'required_description' => 'required',
            'budget' => 'required',
            'enter_number' => 'required',
            'claimed' => 'required'
        ]);

        if ($validator->passes()) {
            $deal = new Deal();
            $deal->required_description = $request->required_description;
            $deal->budget = $request->budget;
            $deal->enter_number = $request->enter_number;
            $deal->claimed = $request->claimed;
            $deal->save();

            return redirect()->route('admin.hotdeals.list')->with('success', 'Hot deal created successfully');
        } else {
            return redirect()->route('admin.hotdeals.create')->withErrors($validator)->withInput();
        }
    }

    public function dealEdit($id)
    {
        $deal = Deal::findOrFail($id);
        return view('admin.hotdeals.edit', ['deal' => $deal]);
    }

    public function hotdealUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'required_description' => 'required',
            'budget' => 'required',
            'enter_number' => 'required',
            'claimed' => 'required'
        ]);

        if ($validator->passes()) {
            $deal = Deal::findOrFail($id);

            $deal->required_description = $request->required_description;
            $deal->budget = $request->budget;
            $deal->enter_number = $request->enter_number;
            $deal->claimed = $request->claimed;
            $deal->save();

            return redirect()->route('admin.hotdeals.list')->with('success', 'Hot deal updated successfully');
        } else {
            return redirect()->route('admin.hotdeals.edit', $id)->withErrors($validator)->withInput();
        }
    }

    public function dealDestroy($id)
    {
        $deal = Deal::findOrFail($id);
        $deal->delete();

        return redirect()->route('admin.hotdeals.list')->with('success', 'Hot deal deleted successfully');
    }

    public function dealShow($id)
    {
        $deal = Deal::findOrFail($id);
        return view('admin.hotdeals.show', ['deal' => $deal]);
    }
}
