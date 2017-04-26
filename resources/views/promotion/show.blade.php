@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Временный шаблон предпросмотра, будет совпадать с тем, что увидит пользователь<br>{{ $promotion->promotionname }}</div>
        <div class="panel-body">
          <p><img class="media-object" src="..." alt="{{ $promotion->promotionname }}" width="100" height="100"></p>
          <p>{{ $promotion->promotiondesc }}</p>
          <p>{{ $promotion->company }}</p>
          <p>Телефон: {{ $promotion->phone }}</p>
          @isset($promotion->website)
            <p>Сайт: {{ $promotion->website }}</p>
          @endisset
          <p>Адрес: {{ $promotion->address }}</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
