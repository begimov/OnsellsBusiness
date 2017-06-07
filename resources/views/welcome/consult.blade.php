@extends('welcome.layouts.layout')

@section('styles')
  <link href="{{ asset('css/welcome/consult.css') }}" rel="stylesheet">
@endsection

@section('content')

  <div class="container">

    <div class="row title">
      <div class="col-md-6 col-sm-12">
        <h1 class="text-uppercase"><strong>запросить</strong><br>консультацию</h1>
        <img src="{{ asset('img/welcome/vmark.png') }}" width="0">
        <h4>
          Заказать рекламу на Onsells очень просто. Отправьте заявку, и с вами свяжется персональный менеджер.
        </h4>
      </div>
      <div class="col-md-6 col-sm-12">
        <form action="#" method="post">
          <div class="form-group">
            <input type="text" name="name" value="" class="form-control input-box" placeholder="ВАШЕ ИМЯ">
          </div>
          <div class="form-group">
            <input type="text" name="name" value="" class="form-control input-box" placeholder="ВАШ ТЕЛЕФОН">
          </div>
          <div class="form-group">
            <input type="text" name="name" value="" class="form-control input-box" placeholder="НАЗВАНИЕ КОМПАНИИ">
          </div>
          <button type="submit" class="btn-get-consult"></button>
        </form>
      </div>
    </div>

  </div>

@endsection
