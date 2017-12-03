@extends('layouts.app')

@section('titleandmetatags')
  @include('layouts.partials._metatags')
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 text-center">
      <div class="panel panel-default">
        <div class="panel-body">
          В&nbsp;случае возникновения проблем или вопросов,<br>пожалуйста, свяжитесь с&nbsp;менеджером по&nbsp;телефону <span class="glyphicon glyphicon-phone" aria-hidden="true"></span> 8&nbsp;(981)&nbsp;698-98-83 или в&nbsp;телеграм
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-7">
      <div class="panel panel-default">
        <div class="panel-heading">Акции</div>
        <div class="panel-body">
          @if (count($promotions) > 0)
          @foreach ($promotions as $promotion)
          <div class="row">
            <div class="col-md-10">
              <div class="media">
              @if (count($promotion->images) > 0)
                <div class="media-left">
                  <a href="{{ route('promotion.show', $promotion->id) }}">
                  <img class="media-object" src="{{ $promotion->smallImage->path }}" alt="{{ $promotion->promotionname }}">
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
                    <li>
                      <form class="delete" action="{{ route('promotion.destroy', $promotion->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-default btn-sm">Удалить</button>
                      </form>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <!-- STATS -->
              @if (count($viewsData) > 0)
              <div class="alert alert-info text-center" role="alert">
                <img src="{{ asset('img/home/ic_views_18px.svg') }}">
                @if($viewsData->get($promotion->id))
                {{ $viewsData->get($promotion->id) }}
                @else
                0
                @endif
              </div>
              @endif
              <!-- ENDOF STATS -->
            </div>
          </div>
          <hr>
          @endforeach
          <div>{{ $promotions->links() }}</div>
          @else
          <p>У Вас пока нет добавленных акций.</p>
          @endif
          <hr>
          @if ($promocount < config('promotions.limit'))
          <a class="btn btn-primary" href="{{ route('promotion.create')}}" role="button">Добавить акцию</a>
          @else
          <p class="bg-danger">Добавлено максимальное количество акций. Пожалуйста, удалите неактуальные, чтобы добавить новые.</p>
          @endif
        </div>
      </div>
    </div>

    <div class="col-md-5">
      <div class="panel panel-default">
        <div class="panel-heading">Последние заявки от клиентов</div>
        <div class="panel-body">
          <applications-panel
              applications="{{ json_encode($applications) }}"
              balance="{{ $balance }}"
              appbaseprice="{{ config('promotions.app_base_price') }}"
              balanceroute="{{ route('payments.index') }}"
              checkoutroute=" {{ route('checkout') }} "></applications-panel>
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
