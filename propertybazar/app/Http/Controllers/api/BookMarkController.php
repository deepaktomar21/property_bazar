<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Bookmark;

class BookMarkController extends Controller
{
    /**
     * Add a bookmark for a user.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $user_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function addToBookmark(Request $request, $user_id)
    {
        // Validate the request data
        $request->validate([
            'location' => 'required',
            'property_type' => 'required',
            'price' => 'required',
            'area' => 'required',
            'description' => 'nullable',
            'image' => 'nullable',
        ]);

        // Handle the file upload if an image is provided
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads'), $filename);
        } else {
            $filename = null; // Handle the case where no image is provided
        }

        // Prepare the data for insertion
        $data = $request->only(['location', 'property_type', 'price', 'area', 'description']);
        $data['user_id'] = $user_id;
        $data['image'] = $filename;

        // Create the bookmark record
        $bookmark = Bookmark::create($data);

        // Return a success response
        return response()->json(['bookmark' => $bookmark], 201);
    }

    /**
     * Remove a bookmark for the authenticated user.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeFromBookmark($id)
    {
        // Find the bookmark by user_id and id
        $bookmark = Bookmark::where('user_id', Auth::id())->where('id', $id)->first();

        // Return a 404 response if the bookmark does not exist
        if (!$bookmark) {
            return response()->json(['message' => 'Bookmark not found'], 404);
        }

        // Delete the bookmark
        $bookmark->delete();

        // Return a success response
        return response()->json(['message' => 'Bookmark deleted successfully']);
    }
    
    public function getBookmark()
    {
        $bookmark = Bookmark::all();
        return response()->json($bookmark);
    }
}
