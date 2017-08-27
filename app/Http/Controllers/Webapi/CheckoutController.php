<?php

namespace App\Http\Controllers\Webapi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        // validation of appplications array

        $user = $request->user();

        // check if all recieved app ids belongs to $user's owned promotions

        // check if balance amount is enough to pay

        // touch all recieved apps with paid = 1

        // response with status => 'OK'
    }
}
