<?php

namespace App\Http\Controllers\Balance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Balance\Balance;

class BalanceController extends Controller
{
    public function index()
    {
        $prepaid_id = Auth::user()->id;
        $balance = Auth::user()->balance;
        if ($balance) {
            $amount = $balance->amount;
        } else {
            $amount = 0;
        }
        return view('balance.index', compact('prepaid_id', 'amount'));
    }

    public function receive(Request $request)
    {
      Log::info('!!!!!!!!'.implode(' / ', $request->all()));
      Log::info('!!!!!!!!'.$request->notification_type);
      Log::info('!!!!!!!!'.$request->operation_id);
      Log::info('!!!!!!!!'.$request->amount);
      Log::info('!!!!!!!!'.$request->label);
      Log::info('!!!!!!!!'.$request->unaccepted);


        $checkHash= sha1($request->notification_type.'&'
            .$request->operation_id.'&'.$request->amount.'&643&'
            .$request->datetime.'&'.$request->sender.'&'
            .$request->codepro.'&'.env('YANDEX_MONEY_SECRET').'&'
            .$request->label);

Log::info('$checkHash'.$checkHash);
Log::info('$request->sha1_hash'.$request->sha1_hash);
            // TODO: Check for unaccepted и codepro

        if ($checkHash == $request->sha1_hash && $request->unaccepted == "false") {
            // TODO: Job, qeue send notification -> email
            Log::info('!!!CHECK SUCCESS');
            $balance = Balance::where('user_id', $request->label)->first();
            if (!$balance) {
                $balance = new Balance;
                $balance->user_id = $request->label;
                $balance->save();
            }
            $balance->amount += $request->amount;
            $balance->save();
            return response()->json(['status' => 'OK']);

        } else {
          Log::info('!!!CHECK ERROR');
        }
    }
}
