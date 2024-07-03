<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MyRequire;

use Illuminate\Support\Facades\Validator;


class MyRequireController extends Controller
{

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'require_description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $myrequire = MyRequire::create([
            'require_description' => $request->require_description,
        ]);

        return response()->json(['success' => 'MyRequire added successfully', 'data' => $myrequire], 201);
    }


    public function getDescription()
    {
        $myrequire = MyRequire::all();
        return response()->json($myrequire);
    }
}
