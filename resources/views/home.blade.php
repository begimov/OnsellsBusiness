@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Акции</div>
                <div class="panel-body">
                  <p>У Вас пока нет добавленных акций.</p>
                  <div>
                      <a class="btn btn-primary" href="{{ route('promotion.create')}}" role="button">Добавить акцию</a>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
