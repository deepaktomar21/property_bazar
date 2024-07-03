<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\User;

class NotificationController extends Controller
{

public function index(Request $request)
    {
        $query = Notification::query();

        // Apply search filters based on request inputs
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

        // Fetch notifications with associated user data and paginate
        $notifications = $query->with('user')->paginate(10); // Adjust per page as needed

        return view('admin.notification.index', compact('notifications'));
    }
}