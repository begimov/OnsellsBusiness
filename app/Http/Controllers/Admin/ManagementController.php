<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User as Business;
use App\Models\Promotions\User;
use App\Models\Promotions\Promotion;
use App\Models\Balance\Balance;

class ManagementController extends Controller
{
    public function index(Request $request)
    {
        $stats = $this->getStats();

        $businesses = $this->sortIndexData($request, Business::with(['promotions', 'balance', 'promotions.category']))->paginate(50)
            ->appends([
                'sortPromotionsOrder' => $request->sortPromotionsOrder,
                'sortDateOrder' => $request->sortDateOrder
            ]);

        return view('admin.management.index', [
            'stats' => $stats,
            'businesses' => $businesses,
            'nextSortPromotionsOrder' => ($request->sortPromotionsOrder === 'desc') ? 'asc' : 'desc',
            'nextSortDateOrder' => ($request->sortDateOrder === 'oldest') ? 'latest' : 'oldest',
        ]);
    }

    public function getStats()
    {
        $businessesCount = count(Business::all());
        $promotionsCount = count(Promotion::all());
        $usersCount = count(User::all());
        $balancesTotal = Balance::sum('amount');

        return compact('businessesCount', 'promotionsCount', 'usersCount', 'balancesTotal');
    }

    private function sortIndexData(Request $request, $data)
    {
        $sortPromotionsOrder = $request->sortPromotionsOrder;
        if ($sortPromotionsOrder === 'desc' || $sortPromotionsOrder === 'asc') {
            return $data->promotionsCount()->orderBy('count', $sortPromotionsOrder);
        }

        $sortDateOrder = $request->sortDateOrder;
        if ($sortDateOrder === 'oldest') {
            return $data->oldest();
        }

        return $data->latest();
    }
}
