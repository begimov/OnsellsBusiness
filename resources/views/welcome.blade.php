<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="full">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Onsells</title>
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
</head>
<body>

  <div class="container">
    
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-6">
        <img src="{{ asset('img/welcome/logo.png') }}" alt="Onsells">
      </div>
      <div class="col-md-6 col-sm-6 col-xs-6">
        <div class="text-right"><a href="{{ url('/login') }}"><img src="{{ asset('img/welcome/signin_button.png') }}"></a></div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8 col-sm-12">
        <div class="title">
          <h1 class="text-uppercase">гиперлокационный<br><strong>сервис №1</strong></h1>
          <img src="{{ asset('img/welcome/vmark.png') }}">
          <h3 class="text-uppercase"><strong>для привлечения клиентов</strong><br>без специальных купонов, QR-кодов и смс.</h3>

        </div>
      </div>
      <div class="col-md-4 col-sm-12"></div>
    </div>

    <div class="row">
      <div class="col-md-8 col-sm-12">
        <a href="{{ url('/register') }}"><img class="add-button" src="{{ asset('img/welcome/add_button.png') }}"></a>
      </div>
      <div class="col-md-4 col-sm-12">
        <h2>Идеальный инструмент для привлечения новых клиентов</h2>
      </div>
    </div>

  </div>

</body>
</html>
