@extends('layouts.app')

@section('titleandmetatags')
  @include('layouts.partials._metatags')
@endsection

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading"><h4>{{ $promotion->promotionname }}</h4></div>
        <div class="panel-body">
          @if (count($promotion->images) > 0)
            <p>
              <img class="media-object img-responsive" src="{{ $promotion->mediumImgPath() }}" alt="{{ $promotion->promotionname }}">
            </p>
          @endif
            <p>{!! nl2br(e($promotion->promotiondesc)) !!}</p>
        </div>
        </div>
    </div>

    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading"><h4>{{ $promotion->company }}</h4></div>
        <div class="panel-body">
          <p>
            <strong>Адрес:</strong><br>
            {{ $promotion->address }}
          </p>
          @isset($promotion->website)
            <p>
              <strong>Сайт:</strong><br>
              <a href="{{ route('redirect.external', $promotion->id) }}">{{ $promotion->website }}</a>
            </p>
          @endisset
          <p>
            <strong>Телефон:</strong><br>
            {{ $promotion->phone }}
          </p>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection
