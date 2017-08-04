@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row text-center">
    <div class="col-md-4">
      <h2><small>Бизнесов: </small>{{ count($businesses) }}</h2>
    </div>
    <div class="col-md-4">
      <h2><small>Акций: </small>{{ count($promotions) }}</h2>
    </div>
    <div class="col-md-4">
      <h2><small>Пользователей: </small>{{ count($users) }}</h2>
    </div>
  </div>
</div>
<hr>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Бизнесы</div>
        <div class="panel-body">
          @foreach($businesses as $business)
            {{ $business->name }}
            {{ $business->email }}
            {{ $business->created_at }}
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
