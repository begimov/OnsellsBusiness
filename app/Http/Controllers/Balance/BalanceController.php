<?php

namespace App\Http\Controllers\Balance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class BalanceController extends Controller
{
    public function index()
    {
        return view('balance.index');
    }

    public function recieve(Request $request)
    {
        $checkHash= sha1($request->notification_type.'&'
            .$request->operation_id.'&'.$request->amount.'&643&'
            .$request->datetime.'&'.$request->sender.'&'
            .$request->codepro.'&'.env('YANDEX_MONEY_SECRET').'&'
            .$request->label);

        if ($checkHash !== $request->sha1_hash) {
          Log::info('!!!CHECK ERROR');
        } else {
          Log::info('!!!CHECK SUCCESS');
        }
        return response()->json(['status' => 'OK']);
    }
}
