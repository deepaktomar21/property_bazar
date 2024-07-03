<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function regIndex(Request $request)
    {
    $search = $request->input('search');

    $query = User::query();

    if ($search) {
        $query->where('name', 'LIKE', "%{$search}%")
              ->orWhere('mobile', 'LIKE', "%{$search}%")
              ->orWhere('email', 'LIKE', "%{$search}%");
    }

    $users = $query->orderBy('created_at', 'desc')->paginate(10);

    return view('admin.userregister.list', compact('users', 'search'));
}

    public function deleteAll(Request $request)
    {
        // Extract the IDs from the request
        $ids = $request->ids;

        // Check if there are any IDs to delete
        if (!empty($ids)) {
            // Use the correct model name and lowercase "select" to match the model name convention
            User::whereIn('id', $ids)->delete();

            return response()->json(["success" => "Users have been deleted"]);
        } else {
            return response()->json(["error" => "No users selected for deletion"]);
        }
    }

    public function regDestroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back();
    }

    public function regShow($id, Request $request)
    {
        $user = User::findOrFail($id);

        return view('admin.userregister.show', ['user' => $user]);
    }
    
    
    
    
    
    
    // Buyer
    
    public function buyerIndex(Request $request)
{
    $search = $request->input('search');

    $query = User::query()->where('user_type', 'buyer'); // add this line

    if ($search) {
        $query->where('name', 'LIKE', "%{$search}%")
              ->orWhere('mobile', 'LIKE', "%{$search}%")
              ->orWhere('email', 'LIKE', "%{$search}%");
    }

    $users = $query->orderBy('created_at', 'desc')->paginate(10);

    return view('admin.userregister.buyerlist', compact('users', 'search'));
}

    // public function deleteAll(Request $request)
    // {
    //     // Extract the IDs from the request
    //     $ids = $request->ids;

    //     // Check if there are any IDs to delete
    //     if (!empty($ids)) {
    //         // Use the correct model name and lowercase "select" to match the model name convention
    //         User::whereIn('id', $ids)->delete();

    //         return response()->json(["success" => "Users have been deleted"]);
    //     } else {
    //         return response()->json(["error" => "No users selected for deletion"]);
    //     }
    // }

    public function buyerDestroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back();
    }

    public function buyerShow($id, Request $request)
    {
        $user = User::findOrFail($id);

        return view('admin.userregister.show', ['user' => $user]);
    }
    
    
    
    
    
    
    
       // Seller
    
    public function sellerIndex(Request $request)
    {
    $search = $request->input('search');

        $query = User::query()->where('user_type', 'seller'); // add this line


    if ($search) {
        $query->where('name', 'LIKE', "%{$search}%")
              ->orWhere('mobile', 'LIKE', "%{$search}%")
              ->orWhere('email', 'LIKE', "%{$search}%");
    }

    $users = $query->orderBy('created_at', 'desc')->paginate(10);

    return view('admin.userregister.list', compact('users', 'search'));
}

    // public function deleteAll(Request $request)
    // {
    //     // Extract the IDs from the request
    //     $ids = $request->ids;

    //     // Check if there are any IDs to delete
    //     if (!empty($ids)) {
    //         // Use the correct model name and lowercase "select" to match the model name convention
    //         User::whereIn('id', $ids)->delete();

    //         return response()->json(["success" => "Users have been deleted"]);
    //     } else {
    //         return response()->json(["error" => "No users selected for deletion"]);
    //     }
    // }

    public function sellerDestroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back();
    }

    public function sellerShow($id, Request $request)
    {
        $user = User::findOrFail($id);

        return view('admin.userregister.show', ['user' => $user]);
    }
    
        
       // Owner
    
    public function ownerIndex(Request $request)
    {
    $search = $request->input('search');

        $query = User::query()->where('user_type', 'owner'); // add this line


    if ($search) {
        $query->where('name', 'LIKE', "%{$search}%")
              ->orWhere('mobile', 'LIKE', "%{$search}%")
              ->orWhere('email', 'LIKE', "%{$search}%");
    }

    $users = $query->orderBy('created_at', 'desc')->paginate(10);

    return view('admin.userregister.list', compact('users', 'search'));
}

    // public function deleteAll(Request $request)
    // {
    //     // Extract the IDs from the request
    //     $ids = $request->ids;

    //     // Check if there are any IDs to delete
    //     if (!empty($ids)) {
    //         // Use the correct model name and lowercase "select" to match the model name convention
    //         User::whereIn('id', $ids)->delete();

    //         return response()->json(["success" => "Users have been deleted"]);
    //     } else {
    //         return response()->json(["error" => "No users selected for deletion"]);
    //     }
    // }

    public function ownerDestroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back();
    }

    public function ownerShow($id, Request $request)
    {
        $user = User::findOrFail($id);

        return view('admin.userregister.show', ['user' => $user]);
    }
    
         
       // Agent
    
    public function agentIndex(Request $request)
    {
    $search = $request->input('search');

    $query = User::query()->where('user_type', 'agent'); // add this line

    if ($search) {
        $query->where('name', 'LIKE', "%{$search}%")
              ->orWhere('mobile', 'LIKE', "%{$search}%")
              ->orWhere('email', 'LIKE', "%{$search}%");
    }

    $users = $query->orderBy('created_at', 'desc')->paginate(10);

    return view('admin.userregister.list', compact('users', 'search'));
}

    // public function deleteAll(Request $request)
    // {
    //     // Extract the IDs from the request
    //     $ids = $request->ids;

    //     // Check if there are any IDs to delete
    //     if (!empty($ids)) {
    //         // Use the correct model name and lowercase "select" to match the model name convention
    //         User::whereIn('id', $ids)->delete();

    //         return response()->json(["success" => "Users have been deleted"]);
    //     } else {
    //         return response()->json(["error" => "No users selected for deletion"]);
    //     }
    // }

    public function agentDestroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back();
    }

    public function agentShow($id, Request $request)
    {
        $user = User::findOrFail($id);

        return view('admin.userregister.show', ['user' => $user]);
    }
    
    
    
         
       // Builder
    
    public function builderIndex(Request $request)
    {
    $search = $request->input('search');

    $query = User::query()->where('user_type', 'builder'); // add this line

    if ($search) {
        $query->where('name', 'LIKE', "%{$search}%")
              ->orWhere('mobile', 'LIKE', "%{$search}%")
              ->orWhere('email', 'LIKE', "%{$search}%");
    }

    $users = $query->orderBy('created_at', 'desc')->paginate(10);

    return view('admin.userregister.list', compact('users', 'search'));
}

    // public function deleteAll(Request $request)
    // {
    //     // Extract the IDs from the request
    //     $ids = $request->ids;

    //     // Check if there are any IDs to delete
    //     if (!empty($ids)) {
    //         // Use the correct model name and lowercase "select" to match the model name convention
    //         User::whereIn('id', $ids)->delete();

    //         return response()->json(["success" => "Users have been deleted"]);
    //     } else {
    //         return response()->json(["error" => "No users selected for deletion"]);
    //     }
    // }

    public function builderDestroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back();
    }

    public function builderShow($id, Request $request)
    {
        $user = User::findOrFail($id);

        return view('admin.userregister.show', ['user' => $user]);
    }
}
