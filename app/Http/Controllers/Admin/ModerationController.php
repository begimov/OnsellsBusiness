<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Promotions\Promotion;
use App\Classes\Crossposting\Vk;
use Illuminate\Support\Facades\App;

class ModerationController extends Controller
{
    public function index()
    {
        $promotions = Promotion::where('active', 0)
          ->with('images')
          ->with('smallImage')
          ->with('category')
          ->simplePaginate(5);
        return view('admin.moderation', compact('promotions'));
    }

    public function approve(Promotion $promotion, Vk $vk)
    {
        if (App::environment('production')) {
            $vk->publish($promotion->promotiondesc, $promotion->mediumImgPath(), $promotion->id);
        }
        $promotion->active = 1;
        $promotion->save();
        return back();
    }
}
