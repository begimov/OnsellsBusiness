<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User as Business;
use App\Models\Promotions\User;
use App\Models\Promotions\Promotion;

class ManagementController extends Controller
{
    private $nextSortPromotionsOrder;
    private $nextSortDateOrder;

    public function index(Request $request)
    {
        $stats = $this->getStats();

        $businesses = Business::with(['promotions']);
        $businesses = $this->sortIndexData($request, $businesses)->paginate(50);

        $this->setOrders($request);

        return view('admin.management.index', [
            'stats' => $stats,
            'businesses' => $businesses,
            'nextSortPromotionsOrder' => $this->nextSortPromotionsOrder,
            'sortPromotionsOrder' => $request->sortPromotionsOrder,
            'nextSortDateOrder' => $this->nextSortDateOrder,
            'sortDateOrder' => $request->sortDateOrder
        ]);
    }

    public function getStats()
    {
        $businessesCount = count(Business::all());
        $promotionsCount = count(Promotion::all());
        $usersCount = count(User::all());
        
        return compact('businessesCount', 'promotionsCount', 'usersCount');
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

    private function setOrders(Request $request)
    {
        $this->nextSortPromotionsOrder = ($request->sortPromotionsOrder === 'desc') ? 'asc' : 'desc';
        $this->nextSortDateOrder = ($request->sortDateOrder === 'oldest') ? 'latest' : 'oldest';
    }
}
