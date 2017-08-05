@extends('layouts.app')

@section('content')
  <div class="container">

    <div class="row text-center">
      <div class="col-md-4 col-sm-4">
        <h2><small>Бизнесов: </small>{{ $businessesCount }}</h2>
      </div>
      <div class="col-md-4 col-sm-4">
        <h2><small>Акций: </small>{{ $promotionsCount }}</h2>
      </div>
      <div class="col-md-4 col-sm-4">
        <h2><small>Пользователей: </small>{{ $usersCount }}</h2>
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
                  <th>Имя</th>
                  <th>Email</th>
                  <th>Дата</th>
                  <th>Акций</th>
                  <th>Заявок</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($businesses as $business)
                  <tr>
                    <td>{{ $business->name }}</td>
                    <td><a href="mailto:{{ $business->email }}">{{ $business->email }}</a></td>
                    <td>{{ $business->created_at->format('d/m/y') }}</td>
                    <td>{{ count($business->promotions) }}</td>
                    <td>-</td>
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
