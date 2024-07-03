<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class NewsController extends Controller
{
    public function newsIndex()
    {
        return response()->json(News::all(), 200);
    }

    public function newsStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date_format:d/m/Y', // Ensure the date is in the correct format
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'news_description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Convert date to MySQL format
        try {
            $newsDate = Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid date format'], 422);
        }

        // Handle the image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = public_path('uploads');
            $file->move($path, $filename);
        } else {
            $filename = null; // Handle the case where no image is provided
        }

        $news = News::create([
            'date' => $newsDate,
            'image' => $filename,
            'news_description' => $request->news_description,
        ]);

        return response()->json(['success' => 'News added successfully', 'news' => $news], 201);
    }
    
    public function news()
    {
        $news = News::all();
        return response()->json($news);
    }
}
