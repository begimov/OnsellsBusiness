@extends('welcome.layouts.layout')

@section('styles')
  <link href="{{ asset('css/welcome/control.css') }}" rel="stylesheet">
@endsection

@section('content')

  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <div class="title text-center">
          <h3 class="text-uppercase"><strong>ЦЕНТР УПРАВЛЕНИЯ СТРАНИЦЕЙ КОМПАНИИ</strong></h3>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-10 col-md-offset-1">

        <div class="row why-point-row">
          <div class="col-md-1 col-sm-3 text-center bullet-star">
            <img src="{{ asset('img/welcome/control/bullet_star.png') }}">
          </div>
          <div class="col-md-11 col-sm-9">
            <p>Вы сами размещаете акции и редактируете их через личный кабинет. Любое количество акций, в любое время, когда удобно и когда это необходимо. Просто. Моментально.</p>
          </div>
        </div>

        <div class="row why-point-row">
          <div class="col-md-1 col-sm-3 text-center bullet-star">
            <img src="{{ asset('img/welcome/control/bullet_star.png') }}">
          </div>
          <div class="col-md-11 col-sm-9">
            <p>Все оплаты пользователь совершает непосредственно вам уже на месте, согласно условиям размещенной вами акции.</p>
          </div>
        </div>

        <div class="row why-point-row">
          <div class="col-md-1 col-sm-3 text-center bullet-star">
            <img src="{{ asset('img/welcome/control/bullet_star.png') }}">
          </div>
          <div class="col-md-11 col-sm-9">
            <p>Пользователи сайта видят акцию согласно своего местоположения, таким образом вы привлекаете в первую очередь людей, которые находятся рядом и ищут услуги вашей компании.</p>
          </div>
        </div>

        <div class="row why-point-row">
          <div class="col-md-1 col-sm-3 text-center bullet-star">
            <img src="{{ asset('img/welcome/control/bullet_star.png') }}">
          </div>
          <div class="col-md-11 col-sm-9">
            <p>Бесплатное размещение.</p>
          </div>
        </div>

      </div>
    </div>

  </div>

@endsection
