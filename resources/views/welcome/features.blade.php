@extends('welcome.layouts.layout')

@section('styles')
  <link href="{{ asset('css/welcome/features.css') }}" rel="stylesheet">
@endsection

@section('content')

  <div class="container">

    <div class="row title">
      <div class="col-md-6 col-sm-12">
        <h1 class="text-uppercase"><strong>рекламные</strong><br>возможности</h1>
        <img src="{{ asset('img/welcome/vmark.png') }}" width="0">
        <h4>
          Размещение на Onsells - это работа на продвижение новых услуг, репутации вашей компании, а также на привлечение новых клиентов.
        </h4>
        <a href="{{ url('/register') }}"><img class="add-button" src="{{ asset('img/welcome/add_button.png') }}"></a>
      </div>
      <div class="col-md-6 col-sm-12">
        <div class="row features">
          <div class="col-md-3 col-sm-12 text-center">
            <img src="{{ asset('img/welcome/features/adv_01.png') }}">
          </div>
          <div class="col-md-9 col-sm-12">
            <h4><strong>СТРАНИЦА АКЦИИ</strong></h4>
            <p>
              Размещенная акция на Onsells позволяет увеличить поток новых клиентов на ваши акции и скидки, звонки и переходы на ваш сайт в несколько раз.
            </p>
          </div>
        </div>
        <div class="row features">
          <div class="col-md-3 col-sm-12 text-center">
            <img src="{{ asset('img/welcome/features/adv_02.png') }}">
          </div>
          <div class="col-md-9 col-sm-12">
            <h4><strong>ONSELLS РЕКЛАМА</strong></h4>
            <p>
              Реклама с гарантированным объемом позволяет привлечь дополнительных клиентов тогда, когда это нужнее всего. 100% целевая аудитория "теплых" клиентов.
            </p>
          </div>
        </div>
        <div class="row features">
          <div class="col-md-3 col-sm-12 text-center">
            <img src="{{ asset('img/welcome/features/adv_03.png') }}">
          </div>
          <div class="col-md-9 col-sm-12">
            <h4><strong>ЦЕНТР УПРАВЛЕНИЯ СТРАНИЦЕЙ КОМПАНИИ</strong></h4>
            <p>
              Вы получаете доступ в личный кабинет компании - центр управления вашей компании Onsells.
            </p>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection
