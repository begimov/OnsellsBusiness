@extends('welcome.layouts.layout')

@section('styles')
  <link href="{{ asset('css/welcome/welcome.css') }}" rel="stylesheet">
@endsection

@section('content')

  <div class="container">

    <div class="row">
      <div class="col-md-8 col-sm-12">
        <div class="title">
          <h1 class="text-uppercase">гиперлокационный<br><strong>сервис №1</strong></h1>
          <img src="{{ asset('img/welcome/vmark.png') }}">
          <h3 class="text-uppercase"><strong>для привлечения клиентов</strong><br>без специальных купонов, QR-кодов и смс.</h3>
        </div>
      </div>
      <div class="col-md-4 col-sm-12"></div>
    </div>

    <div class="row">
      <div class="col-md-8 col-sm-12">
        <a href="{{ url('/register') }}"><img class="add-button" src="{{ asset('img/welcome/add_button.png') }}"></a>
      </div>
      <div class="col-md-4 col-sm-12">
        <h2>Идеальный инструмент для привлечения новых клиентов</h2>
      </div>
    </div>

  </div>

@endsection
