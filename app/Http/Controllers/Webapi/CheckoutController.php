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
            ->whereIn('id', $applicationIds)
            ->get();

        //TODO: check if all recieved app ids belongs to $user's owned promotions
        // POLICY???

        // check if balance amount is enough to pay
        if (isBalanceSufficient($applications->count(), $user->balance->amount)) {

        }

        // touch all recieved apps with paid = 1

        // response with status => 'OK'
    }

    public function isBalanceSufficient($appsCount, $balanceAmount)
    {
        return $appsCount * config('promotions.app_base_price') <= $balanceAmount;
    }
}
