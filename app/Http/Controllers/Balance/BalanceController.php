<?php

namespace App\Http\Controllers\Balance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Balance\Balance;
use App\Repositories\Contracts\BalanceRepository;
use App\Repositories\Contracts\TransactionRepository;

class BalanceController extends Controller
{
    protected $balanceRepository;
    protected $transactionRepository;

    public function __construct(BalanceRepository $balanceRepository,
        TransactionRepository $transactionRepository)
    {
        $this->balanceRepository = $balanceRepository;
        $this->transactionRepository = $transactionRepository;
    }

    public function index()
    {
        $user = Auth::user();

        $prepaid_id = $user->id;
        $amount = $user->balance->amount;

        return view('balance.index', compact('prepaid_id', 'amount'));
    }

    public function receive(Request $request)
    {
        if ($this->generateHash($request) == $request->sha1_hash
            && $request->unaccepted == "false"
            && $request->codepro != "true") {

            // TODO: Job, qeue send notification -> email
            $balance = $this->balanceRepository->findByUserId($request->label);

            $this->transactionRepository->store($balance, $request->amount);

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
