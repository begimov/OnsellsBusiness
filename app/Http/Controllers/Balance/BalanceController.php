<?php

namespace App\Http\Controllers\Balance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Balance\Balance;
use App\Repositories\Contracts\BalanceRepository;

class BalanceController extends Controller
{
    protected $balanceRepository;

    public function __construct(BalanceRepository $balanceRepository)
    {
        $this->balanceRepository = $balanceRepository;
    }

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
        // TODO: Check for unaccepted и codepro

        if ($this->generateHash($request) == $request->sha1_hash
            && $request->unaccepted == "false") {

            // TODO: Job, qeue send notification -> email
            $balance = $this->balanceRepository->findByUserId($request->label);

            if (!$balance) {
                $balance = $this->balanceRepository->store($request->label);
            }

            $balance->amount += $request->amount;
            $balance->save();

            return response()->json(['status' => 'OK']);

        } else {
          Log::info('!!!CHECK ERROR');
        }
    }

    protected function generateHash($request)
    {
        return sha1($request->notification_type.'&'
            .$request->operation_id.'&'.$request->amount.'&643&'
            .$request->datetime.'&'.$request->sender.'&'
            .$request->codepro.'&'.env('YANDEX_MONEY_SECRET').'&'
            .$request->label);
    }
}
