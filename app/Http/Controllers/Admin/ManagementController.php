<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User as Business;
use App\Models\Promotions\User;
use App\Models\Promotions\Promotion;

class ManagementController extends Controller
{
    public function index()
    {
        $businessesCount = Business::all()->count();
        $promotionsCount = Promotion::all()->count();
        $usersCount = User::all()->count();

        $businesses = Business::latest()->with(['promotions'])->paginate(50);

        return view('admin.management', compact(
            'businessesCount', 'promotionsCount', 'usersCount',
            'businesses'
        ));
    }
}
