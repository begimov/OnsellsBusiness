@extends('welcome.layouts.layout')

@section('styles')
  <link href="{{ asset('css/welcome/why.css') }}" rel="stylesheet">
@endsection

@section('content')

  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <div class="title text-center">
          <h2 class="text-uppercase"><strong>ПОЧЕМУ ONSELLS</strong></h2>
          <h4>Onsells - крупнейший сайт акций и скидок. Каждый день мы помогаем тысячам людей найти информацию о лучших акциях и воспользоваться скидками поблизости.</h3>
        </div>
      </div>
    </div>

    <div class="row text-center">
      <div class="col-md-4 col-sm-4 why-point-row">
        <img src="{{ asset('img/welcome/why/why_01.png') }}">
        <p class="why-point-desc">УНИКАЛЬНЫХ<br>ПОСЕТИТЕЛЕЙ</p>
      </div>
      <div class="col-md-4 col-sm-4 why-point-row">
        <img src="{{ asset('img/welcome/why/why_02.png') }}">
        <p class="why-point-desc">ПРОСМОТРЕННЫХ<br>СТРАНИЦ</p>
      </div>
      <div class="col-md-4 col-sm-4 why-point-row">
        <img src="{{ asset('img/welcome/why/why_03.png') }}">
        <p class="why-point-desc">ПОЛЬЗУЮТСЯ<br>АКЦИЯМИ И СКИДКАМИ</p>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-md-4 col-sm-4 why-point-row">
        <img src="{{ asset('img/welcome/why/why_04.png') }}">
        <p class="why-point-desc">НОВЫХ<br>КОМПАНИЙ НА САЙТЕ</p>
      </div>
      <div class="col-md-4 col-sm-4 why-point-row">
        <img src="{{ asset('img/welcome/why/why_05.png') }}">
        <p class="why-point-desc">ПЕРЕХОДОВ НА<br>САЙТЫ КОМПАНИЙ</p>
      </div>
      <div class="col-md-4 col-sm-4 why-point-row">
        <img src="{{ asset('img/welcome/why/why_06.png') }}">
        <p class="why-point-desc">ЗВОНКОВ<br>КОМПАНИЯМ</p>
      </div>
    </div>

  </div>

@endsection
