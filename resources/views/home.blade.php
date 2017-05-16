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
            @if (count($promotion->images) > 0)
            <div class="media-left">
              <a href="{{ route('promotion.show', $promotion->id) }}">
                <img class="media-object" src="{{ $promotion->smallImgPath() }}" alt="{{ $promotion->promotionname }}">
              </a>
            </div>
            @endif
            <div class="media-body">
              <strong class="media-heading">
                <a href="{{ route('promotion.show', $promotion->id) }}">
                  {{ mb_substr($promotion->promotionname, 0, 30) }}{{ (strlen($promotion->promotionname) >= 30) ? '...' : '' }}
                </a>
                @if ($promotion->active == 0)
                <span class="label label-danger">На модерации</span>
                @else
                <span class="label label-success">Опубликовано</span>
                @endif
                {{ $promotion->category->name }}
              </strong>
              <p>{{ mb_substr($promotion->promotiondesc, 0, 100) }}{{ (strlen($promotion->promotiondesc) >= 100) ? '...' : '' }}</p>
              <ul class="list-inline">
                <li><a class="btn btn-primary btn-sm" href="{{ route('promotion.show', $promotion->id) }}" role="button">Предпросмотр</a></li>
                <li><form class="delete" action="{{ route('promotion.destroy', $promotion->id) }}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button type="submit" class="btn btn-default btn-sm">Удалить</button>
                </form></li>
              </ul>
            </div>
          </div>
          @endforeach
          <div>{{ $promotions->links() }}</div>
          @else
          <p>У Вас пока нет добавленных акций.</p>
          @endif
          <hr>
          <a class="btn btn-primary" href="{{ route('promotion.create')}}" role="button">Добавить акцию</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('postJquery')
    @parent
    $(".delete").on("submit", function(){
        return confirm("Акция будет удалена, вы уверены, что хотите продолжить?");
    });
@endsection
