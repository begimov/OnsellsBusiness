@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Акции</div>
        <div class="panel-body">
          @if (count($promotions) > 0)
          @foreach ($promotions as $promotion)
          <div class="media">
            <div class="media-left">
              <a href="{{ route('promotion.show', $promotion->id) }}">
                <img class="media-object" src="..." alt="{{ $promotion->promotionname }}" width="100" height="100">
              </a>
            </div>
            <div class="media-body">
              <strong class="media-heading">
                <a href="{{ route('promotion.show', $promotion->id) }}">
                  {{ mb_substr($promotion->promotionname, 0, 30) }}{{ (strlen($promotion->promotionname) >= 30) ? '...' : '' }}
                </a>
                @if ($promotion->active === 0)
                <span class="label label-danger">На модерации</span>
                @else
                <span class="label label-success">Опубликовано</span>
                @endif
              </strong>
              <p>{{ mb_substr($promotion->promotiondesc, 0, 100) }}{{ (strlen($promotion->promotiondesc) >= 100) ? '...' : '' }}</p>
              <a class="btn btn-primary btn-sm" href="{{ route('promotion.show', $promotion->id) }}" role="button">Предпросмотр</a>
              <a class="btn btn-default btn-sm" href="#" role="button">Удалить</a>
            </div>
          </div>
          <hr>
          @endforeach
          @else
          <p>У Вас пока нет добавленных акций.</p>
          @endif
          <a class="btn btn-primary" href="{{ route('promotion.create')}}" role="button">Добавить акцию</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
