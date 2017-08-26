@extends('layouts.app')

@section('titleandmetatags')
  @include('layouts.partials._metatags')
@endsection

@section('content')
  <div class="container">

    <div class="row text-center">
      <div class="col-md-3 col-sm-3">
        <h2><small>Бизнесов: </small>{{ $stats['businessesCount'] }}</h2>
      </div>
      <div class="col-md-3 col-sm-3">
        <h2><small>Акций: </small>{{ $stats['promotionsCount'] }}</h2>
      </div>
      <div class="col-md-3 col-sm-3">
        <h2><small>Пользователей: </small>{{ $stats['usersCount'] }}</h2>
      </div>
      <div class="col-md-3 col-sm-3">
        <h2><small>На балансах: </small>{{ $stats['balancesTotal'] }}</h2>
      </div>
    </div>

    <hr>

    <div class="row">
      <div class="col-md-12">
        <ul class="nav nav-tabs">
          <li role="presentation" class="active"><a href="#">Бизнесы</a></li>
        </ul>
        <div class="panel panel-default">
          <div class="panel-body">
            <table class="table table-hover table-condensed">
              <thead>
                <tr>
                  <th>Название</th>
                  <th>Email</th>
                  <th>Телефон</th>
                  <th>Категория</th>
                  <th>
                    <a href="{{ route('management.index', ['sortDateOrder' => $nextSortDateOrder]) }}">
                      Дата
                    </a>
                  </th>
                  <th>
                    <a href="{{ route('management.index', ['sortPromotionsOrder' => $nextSortPromotionsOrder]) }}">
                      Акций
                    </a>
                  </th>
                  <th>Заявок</th>
                  <th>Баланс</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($businesses as $business)
                  <tr>
                    <td>{{ $business->name }}</td>
                    <td><a href="mailto:{{ $business->email }}">{{ $business->email }}</a></td>
                    <td>{{ count($business->promotions) > 0 ? $business->promotions[0]->phone : '-' }}</td>
                    <td>{{ count($business->promotions) > 0 ? $business->promotions[0]->category->name : '-' }}</td>
                    <td>{{ $business->created_at->format('d/m/y') }}</td>
                    <td>{{ count($business->promotions) }}</td>
                    <td>-</td>
                    <td>{{ $business->balance->amount }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="panel-footer">{{ $businesses->links() }}</div>
        </div>
      </div>
    </div>

  </div>
@endsection
