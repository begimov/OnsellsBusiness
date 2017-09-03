<?php

namespace App\Http\Controllers\Webapi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\TransactionRepository;
use App\Repositories\Contracts\ApplicationRepository;
use App\Http\Requests\Webapi\CheckoutRequest;

class CheckoutController extends Controller
{
    protected $transactionRepository;
    protected $applicationRepository;

    public function __construct(TransactionRepository $transactionRepository,
        ApplicationRepository $applicationRepository)
    {
        $this->transactionRepository = $transactionRepository;
        $this->applicationRepository = $applicationRepository;
    }

    public function checkout(CheckoutRequest $request)
    {
        $user = $request->user();

        $applicationIds = $request->all()['applications'];

        $applications = $this->applicationRepository
            ->getUnpaidApplicationsById($applicationIds);

        $appsCount = $applications->count();

        //TODO: check if all recieved app ids belongs to $user's owned promotions
        // POLICY???

        if (!$this->isBalanceSufficient($appsCount, $user->balance->amount)) {
            return response()->json([
                    'status' => 'Insufficient balance error'
                ]);
        }

        $this->updateApplications($applications);

        $balance = $this->updateBalance($user, $appsCount);

        $applications = $this->applicationRepository->getApplicationsHideUnpaid($user, 10);

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

    protected function updateApplications($applications)
    {
        $applications->update(['paid' => 1]);
        return true;
    }

    protected function updateBalance($user, $appsCount)
    {
        $balance = $user->balance;
        $totalCost = $appsCount * config('promotions.app_base_price');

        $this->transactionRepository->store($balance, -$totalCost);

        $balance->amount -= $totalCost;
        $balance->save();

        return $balance;
    }
}
