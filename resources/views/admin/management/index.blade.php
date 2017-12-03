@extends('layouts.app')

@section('titleandmetatags')
  @include('layouts.partials._metatags')
@endsection

@section('content')
  <div class="container">

    <div class="row text-center">
      <div class="col-md-2 col-sm-6 col-xs-6">
        <div class="panel panel-default">
          <div class="panel-body bg-primary">
            <span class="lead">Бизнесов:<br><strong>{{ $stats['businessesCount'] }}</strong></span>
          </div>
        </div>
      </div>
      <div class="col-md-2 col-sm-6 col-xs-6">
        <div class="panel panel-default">
          <div class="panel-body bg-primary">
            <span class="lead">Акций:<br><strong>{{ $stats['promotionsCount'] }}</strong></span>
          </div>
        </div>
      </div>
      <div class="col-md-2 col-sm-6 col-xs-6">
        <div class="panel panel-default">
          <div class="panel-body bg-primary">
            <span class="lead">Польз.:<br><strong>{{ $stats['usersCount'] }}</strong></span>
          </div>
        </div>
      </div>
      <div class="col-md-2 col-sm-6 col-xs-6">
        <div class="panel panel-default">
          <div class="panel-body bg-primary">
            <span class="lead">Балансы:<br><strong>{{ $stats['balancesTotal'] }}</strong></span>
          </div>
        </div>
      </div>
      <div class="col-md-2 col-sm-6 col-xs-6">
        <div class="panel panel-default">
          <div class="panel-body bg-primary">
            <span class="lead">Заявок:<br><strong>{{ $stats['applicationsCount'] }}</strong></span>
          </div>
        </div>
      </div>
    </div>

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
