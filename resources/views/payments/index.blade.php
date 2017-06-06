@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Оплата</div>
        <div class="panel-body text-center">
          <p><iframe frameborder="0" src="https://money.yandex.ru/quickpay/shop-widget?account=410012113167499&quickpay=shop&payment-type-choice=on&writer=seller&targets=%D0%9E%D0%BF%D0%BB%D0%B0%D1%82%D0%B0+%D1%80%D0%B0%D0%B7%D0%BC%D0%B5%D1%89%D0%B5%D0%BD%D0%B8%D1%8F+%D0%BD%D0%B0+Onsells.ru&targets-hint=&default-sum=2500&button-text=01&successURL=https%3A%2F%2Fadmin.onsells.ru%2Fhome" width="450" height="198"></iframe></p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
