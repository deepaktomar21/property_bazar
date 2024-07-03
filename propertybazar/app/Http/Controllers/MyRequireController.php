<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyRequire;
use Illuminate\Support\Facades\Validator;



class MyRequireController extends Controller
{
    public function myrequireIndex(Request $request)
    {
        $search = $request->input('search');

        $query = MyRequire::query();
        if ($search) {
            $query->where('id', $search)
                  ->orWhere('date', 'LIKE', "%{$search}%")
                  ->orWhere('require_description', 'LIKE', "%{$search}%");  // Corrected field name
        }

        $myrequire = $query->paginate(5);

        return view('admin.myrequire.list', [
            'myrequire' => $myrequire,
            'search' => $search,
        ]);
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;

        if (!empty($ids)) {
            MyRequire::whereIn('id', $ids)->delete();
            return response()->json(["success" => "Items have been deleted"]);  // Corrected success message
        } else {
            return response()->json(["error" => "No valid IDs provided for deletion"]);
        }
    }

    public function myrequireAdd()
    {
        return view('admin.myrequire.create');
    }

    public function myrequireStore(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'require_description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        MyRequire::create([
            'require_description' => $request->require_description,
        ]);

        return redirect()->route('admin.myrequire.list')->with('success', 'MyRequire added successfully');  // Corrected route name
    }


    public function myrequireDestroy($id)
    {
        $myrequire = MyRequire::findOrFail($id);
        $myrequire->delete();

        return back();
    }

    public function myrequireShow($id)
    {
        $myrequire = MyRequire::findOrFail($id);

        return view('admin.myrequire.show', ['myrequire' => $myrequire]);
    }
}
