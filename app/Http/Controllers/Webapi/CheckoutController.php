<?php

namespace App\Http\Controllers\Webapi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Promotions\Application;
use App\Repositories\Contracts\TransactionRepository;

class CheckoutController extends Controller
{
    protected $transactionRepository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function checkout(Request $request)
    {
        //TODO: validation of appplications array using FormRequest

        $user = $request->user();
        $applicationIds = $request->all()['applications'];

        $applications = Application::with(['user'])
            ->whereIn('id', $applicationIds);

        //TODO: check if all recieved app ids belongs to $user's owned promotions
        // POLICY???

        // filter out paid apps

        if (!$this->isBalanceSufficient($applications->count(), $user->balance->amount)) {
            return response()->json([
                    'status' => 'Insufficient balance error'
                ]);
        }

        $this->updateAppsAndBalance($user, $applications);

        $applications = $user->applications()
            ->with(['user' => function($query)
                { $query->select('id','name','email'); }, 'promotion'])
            ->take(10)
            ->get();

        $balance = $user->balance;

        return response()->json([
                'status' => 'OK',
                'data' => [
                  'applications' => $applications,
                  'balance' => $balance,
                ],
            ]);
    }

    protected function isBalanceSufficient($appsCount, $balanceAmount)
    {
        return $appsCount * config('promotions.app_base_price') <= $balanceAmount;
    }

    protected function updateAppsAndBalance($user, $applications)
    {
        $balance = $user->balance;

        $applications->update(['paid' => 1]);

        $totalCost = $applications->count() * config('promotions.app_base_price');

        $this->transactionRepository->store($balance, -$totalCost);

        $balance->amount -= $totalCost;
        $balance->save();
    }
}
