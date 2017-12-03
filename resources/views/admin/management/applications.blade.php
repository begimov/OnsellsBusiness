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
          <li role="presentation"><a href="{{ route('management.index') }}">Бизнесы</a></li>
          <li role="presentation" class="active"><a href="#">Заявки</a></li>
        </ul>
        <div class="panel panel-default">
          <div class="panel-body">
            <table class="table table-hover table-condensed">
              <thead>
                <tr>
                  <th>Имя</th>
                  <th>Email</th>
                  <th>Телефон</th>
                  <th>Ссылка на акцию</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($applications as $application)
                  <tr>
                    <td>{{ $application->user->name }}</td>
                    <td><a href="mailto:{{ $application->user->email }}">{{ $application->user->email }}</a></td>
                    <td>{{ $application->user->phone }}</td>
                    @if($application->promotion['id'])
                      <td><a href="{{ route('promotion.show', $application->promotion['id']) }}" target="_blank">Открыть</a></td>
                    @endif
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="panel-footer">{{ $applications->links() }}</div>
        </div>
      </div>
    </div>

  </div>
@endsection
