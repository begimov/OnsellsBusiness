@extends('layouts.app')

@section('titleandmetatags')
  @include('layouts.partials._metatags')
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">Баланс</div>
        <div class="panel-body">
          <h1>{{ $amount }} <small>рублей</small></h1>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">Пополнение баланса</div>
        <div class="panel-body">
          <form method="POST" action="https://money.yandex.ru/quickpay/confirm.xml">

            <input type="hidden" name="receiver" value="41001225924654">
            <input type="hidden" name="quickpay-form" value="shop">
            <input type="hidden" name="targets" value="транзакция {{$prepaid_id}}">
            <div class="form-group">
              <label for="sum">Сумма пополнения, руб.</label>
              <input type="text" class="form-control" name="sum" value="500" data-type="number">
            </div>

            <input type="hidden" name="formcomment" value="Onsells: пополнение баланса">
            <input type="hidden" name="short-dest" value="Onsells: пополнение баланса">
            <input type="hidden" name="label" value="{{$prepaid_id}}">
            <input type="hidden" name="need-fio" value="false">
            <input type="hidden" name="need-email" value="false">
            <input type="hidden" name="need-phone" value="false">
            <input type="hidden" name="need-address" value="false">

            <div class="radio">
              <label><input type="radio" name="paymentType" value="AC" checked>Банковской картой</label>
            </div>
            <div class="radio">
              <label><input type="radio" name="paymentType" value="PC">Яндекс.Деньгами</label>
            </div>
            <input type="submit" class="btn btn-primary" value="Перевести">

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('postJquery')
    @parent
      $('#iframe-yandex').attr('src', $('#iframe-yandex').attr('src'));
@endsection
