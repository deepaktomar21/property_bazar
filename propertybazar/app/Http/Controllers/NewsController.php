<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Validator;


class NewsController extends Controller
{
    public function newsIndex(Request $request)
    {
        $search = $request->input('search');

        $query = News::query();
        if ($search) {
            $query->where('id', $search)
                  ->orWhere('date', 'LIKE', "%{$search}%")
                  ->orWhere('news_description', 'LIKE', "%{$search}%");
        }

        $news = $query->paginate(10);

        return view('admin.news.list', [
            'news' => $news,
            'search' => $search,
        ]);
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;

        if (!empty($ids)) {
            News::whereIn('id', $ids)->delete();
            return response()->json(["success" => "News have been deleted"]);
        } else {
            return response()->json(["error" => "No valid IDs provided for deletion"]);
        }
    }

    public function newsAdd()
    {
        return view('admin.news.create');
    }

    public function newsStore(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'image' => 'required', // updated validation for image
            'news_description' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

         // Upload images
         if ($request->hasFile('images')) {
            $file = $request->file('images');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/';
            $file->move($path, $filename);
        } else {
            $filename = null; // or handle the case where no image is provided
        }

        News::create([
        'date' => $request->date,
        'image' => $imageName,
        'news_description' => $request->news_description,

    ]);

        return redirect()->route('admin.news.list')->with('success', 'News added successfully');
    }

     public function newsShow($id)
        {
            $news = News::findOrFail($id);
    
            return view('admin.news.show', [
                'news' => $news,
            ]);
     }    

}
