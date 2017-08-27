<?php

namespace App\Http\Controllers\Webapi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Promotions\Application;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        //TODO: validation of appplications array

        $user = $request->user();
        $applicationIds = $request->all()['applications'];

        $applications = Application::with(['user'])
            ->whereIn('id', $applicationIds);

        //TODO: check if all recieved app ids belongs to $user's owned promotions
        // POLICY???

        // check if balance amount is enough to pay
        if (!$this->isBalanceSufficient($applications->count(), $user->balance->amount)) {
          // response with status => 'Insufficient balance'
            return response()->json([
                    'status' => 'Insufficient balance error'
                ]);
        }

        // touch all recieved apps with paid = 1
        // response with status => 'OK'
        $applications->update(['paid' => 1]);
        return response()->json([
                'status' => 'OK'
            ]);
    }

    public function isBalanceSufficient($appsCount, $balanceAmount)
    {
        return $appsCount * config('promotions.app_base_price') <= $balanceAmount;
    }
}
