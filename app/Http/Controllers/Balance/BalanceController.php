<?php

namespace App\Http\Controllers\Balance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BalanceController extends Controller
{
    public function index()
    {
        $prepaid_id = Auth::user()->id;
        return view('balance.index', compact('prepaid_id'));
    }

    public function recieve(Request $request)
    {
        $checkHash= sha1($request->notification_type.'&'
            .$request->operation_id.'&'.$request->amount.'&643&'
            .$request->datetime.'&'.$request->sender.'&'
            .$request->codepro.'&'.env('YANDEX_MONEY_SECRET').'&'
            .$request->label);

            // TODO: Check for unaccepted и codepro

        if ($checkHash !== $request->sha1_hash) {
          Log::info('!!!CHECK ERROR');
        } else {
          // TODO: Job, qeue send notification -> email 
          Log::info('!!!CHECK SUCCESS');
        }
        return response()->json(['status' => 'OK']);
    }
}
