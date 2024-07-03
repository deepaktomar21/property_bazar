<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Validator;


class BookmarkController extends Controller
{
    public function bookmarkIndex(Request $request)
    {
        $search = $request->input('search');

        $query = Bookmark::query();
        if ($search) {
            $query->where('id', $search)
                  ->orWhere('location', 'LIKE', "%{$search}%")
                  ->orWhere('area', 'LIKE', "%{$search}%");
        }

        $bookmarks = $query->paginate(5);

        return view('admin.bookmark.list', [
            'bookmarks' => $bookmarks,
            'search' => $search,
        ]);
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;

        if (empty($ids) || !is_array($ids)) {
            return response()->json(["error" => "Invalid input."], 400);
        }

        Bookmark::whereIn('id', $ids)->delete();

        return response()->json(["success" => "Bookmarks have been deleted"]);
    }

    public function bookmarkStore(Request $request)
    {
        $validator = Validator::make($request->all(), $this->validationRules());

        if ($validator->passes()) {
            $bookmark = new Bookmark();
            $this->saveBookmark($bookmark, $request);

            session()->flash('success', 'Bookmark added successfully');

            return redirect()->route('admin.bookmark.list');
        } else {
            return redirect()->route('admin.bookmark.create')->withErrors($validator)->withInput();
        }
    }

    public function bookmarkDestroy($id)
    {
        $bookmark = Bookmark::findOrFail($id);
        $bookmark->delete();
        return back();
    }

    public function bookmarkShow($id)
    {
        $bookmark = Bookmark::findOrFail($id);
        return view('admin.bookmark.show', ['bookmark' => $bookmark]);
    }

}
