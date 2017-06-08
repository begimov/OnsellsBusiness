<?php

namespace App\Http\Controllers\Welcome;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Welcome\RequestConsultRequest;
use App\Mail\Welcome\ConsultationRequested;
use Illuminate\Support\Facades\Mail;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome.index');
    }

    public function why()
    {
        return view('welcome.why');
    }

    public function features()
    {
        return view('welcome.features');
    }

    public function control()
    {
        return view('welcome.control');
    }

    public function consult()
    {
        return view('welcome.consult');
    }

    public function requestConsult(RequestConsultRequest $request)
    {
        if (!$request->url) {
          Mail::to(config('mail.consultations'))->send(new ConsultationRequested($request));
        }
        return back()->with('status', 'Спасибо, ваше запрос отправлен. Мы скоро с вами свяжемся.');
    }
}
