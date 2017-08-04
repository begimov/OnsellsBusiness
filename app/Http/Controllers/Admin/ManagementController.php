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
        $businesses = Business::all();
        $promotions = Promotion::all();
        $users = User::all();
        return view('admin.management', compact('businesses', 'promotions', 'users'));
    }
}
