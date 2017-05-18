<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Promotions\Promotion;

class ModerationController extends Controller
{
    public function index()
    {
        $promotions = Promotion::where('active', 0)->simplePaginate(5);
        return view('admin.moderation', compact('promotions'));
    }

    public function approve(Promotion $promotion)
    {
        $promotion->active = 1;
        $promotion->save();
        return back();
    }
}
