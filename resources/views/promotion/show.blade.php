@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Временный шаблон предпросмотра, будет совпадать с тем, что увидит пользователь<br>{{ $promotion->promotionname }}<br>{{ $promotion->category->name }}</div>
        <div class="panel-body">
          @if (count($promotion->images) > 0)
          <p><img class="media-object img-responsive img-rounded" src="{{ $promotion->mediumImgPath() }}" alt="{{ $promotion->promotionname }}"></p>
          @endif
          <p>{!! nl2br(e($promotion->promotiondesc)) !!}</p>
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
