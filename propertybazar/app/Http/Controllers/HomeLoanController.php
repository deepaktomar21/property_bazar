<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeLoan;
use Illuminate\Support\Facades\Validator;



class HomeLoanController extends Controller
{
    public function homeIndex(Request $request)
    {
        // Get the search query
        $search = $request->input('search');

        // Query home loans with search functionality
        $query = HomeLoan::query();
        if ($search) {
            $query->where('id', $search)
                  ->orWhere('user_name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%");
        }

        // Paginate results
        $homeloans = $query->paginate(10); // Adjust the number as needed

        // Pass the home loans and the search term to the view
        return view('admin.home_loan.list', [
            'homeloans' => $homeloans,
            'search' => $search,
        ]);
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        // Perform validation if $ids contain valid IDs before deletion
        if (!empty($ids)) {
            HomeLoan::whereIn('id', $ids)->delete();
            return response()->json(["success" => "Home loans have been deleted"]);
        } else {
            return response()->json(["error" => "No valid IDs provided for deletion"]);
        }
    }

    public function apply()
    {
        return view('admin.home_loan.create');
    }

    public function homeStore(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [

            'loan_description' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'amount' => 'required',
            'term' => 'required',
        ]);

        if ($validator->passes()) {
            $homeloan = new HomeLoan();
            $homeloan->loan_description	 = $request->loan_description;
            $homeloan->email = $request->email;
            $homeloan->amount = $request->amount;
            $homeloan->term = $request->term;
            $homeloan->save();

            return redirect()->route('admin.home_loan.list')->with('success', 'Home loan created successfully');
        } else {
            return redirect()->route('admin.home_loan.create')->withErrors($validator)->withInput();
        }
    }

    public function homeEdit($id)
    {
        $homeloan = HomeLoan::findOrFail($id);
        return view('admin.home_loan.edit', ['homeloan' => $homeloan]);
    }

    public function homeUpdate(Request $request, $id)
    {
       // dd($request->all());
        $validator = Validator::make($request->all(), [
            'loan_description' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'amount' => 'required',
            'term' => 'required',
        ]);

        if ($validator->passes()) {

            $homeloan = HomeLoan::findOrFail($id);
            $homeloan->loan_description	 = $request->loan_description;
            $homeloan->email = $request->email;
            $homeloan->amount = $request->amount;
            $homeloan->term = $request->term;
            $homeloan->save();

            return redirect()->route('admin.home_loan.list')->with('success', 'Home loan updated successfully');
        } else {
            return redirect()->route('admin.home_loan.edit', $id)->withErrors($validator)->withInput();
        }
    }

    public function homeDestroy($id)
    {
        $homeloan = HomeLoan::findOrFail($id);
        $homeloan->delete();

        return redirect()->route('admin.home_loan.list')->with('success', 'Home loan deleted successfully');
    }

    public function homeShow($id)
    {
        $homeloan = HomeLoan::findOrFail($id);
        return view('admin.home_loan.show', ['homeloan' => $homeloan]);
    }
}
