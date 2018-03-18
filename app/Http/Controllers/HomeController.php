<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Classes\Analytics\GoogleAnalytics;
use App\Repositories\Contracts\ApplicationRepository;

class HomeController extends Controller
{
    protected $applicationRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ApplicationRepository $applicationRepository)
    {
        $this->applicationRepository = $applicationRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, GoogleAnalytics $googleanalytics)
    {
        $user = $request->user();

        $allPromotions = $user->promotions()->get();
        $promocount = $allPromotions->count();

        $balance = $user->balance;

        $promotions = $user->promotions()
            ->with('images')
            ->with('smallImage')
            ->with('category')
            ->paginate(5);

        $applications = $this->applicationRepository->getApplicationsHideUnpaid($user, 10);

        $viewsData = $googleanalytics->getPromotionsViewsReport($allPromotions);

        return view('home', compact('promotions', 'promocount', 'viewsData', 'applications', 'balance'));
    }

    /**
     * Show applications related help page.
     *
     * @return \Illuminate\Http\Response
     */
    public function appshelp(Request $request)
    {
        return view('home.appshelp');
    }
}
