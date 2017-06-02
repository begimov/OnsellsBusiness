<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Classes\Analytics\GoogleAnalytics;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, GoogleAnalytics $googleanalytics)
    {
        $allPromotions = $request->user()->promotions()->get();
        $promocount = $allPromotions->count();

        $promotions = $request->user()->promotions()
            ->with('images')
            ->with('smallImage')
            ->with('category')
            ->paginate(5);

        $viewsData = $googleanalytics->getPromotionsViewsReport($allPromotions);

        return view('home', compact('promotions', 'promocount', 'viewsData'));
    }
}
