<style>
  /* MENU */
  .top-menu {
    padding: 20px 20px 0 30px;
  }

  .welcome-menu-text {
    font-size: 10px;
    line-height: 1.2;
    padding-top: 12px;
  }

  .menu-vline {
    border-left: 3px solid #fff;
  }
</style>

<div class="container-fluid">

  <div class="row">

    <div class="col-md-3 col-sm-12 col-xs-12 top-menu">
      <p class="text-center">
        <a href="{{ route('welcome.index') }}">
          <img src="{{ asset('img/welcome/logo.png') }}" alt="Onsells">
        </a>
      </p>
    </div>

    <div class="col-md-6 col-sm-12 col-xs-12 top-menu">
      <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-4 menu-vline">
          <a href="{{ route('welcome.why') }}">
            <p class="welcome-menu-text">ПОЧЕМУ<br>ONSELLS</p>
          </a>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4 menu-vline">
          <a href="{{ route('welcome.features') }}">
            <p class="welcome-menu-text">РЕКЛАМНЫЕ<br>ВОЗМОЖНОСТИ</p>
          </a>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4 menu-vline">
          <a href="{{ route('welcome.control') }}">
            <p class="welcome-menu-text">ЦЕНТР УПРАВЛЕНИЯ<br>СТРАНИЦЕЙ КОМПАНИИ</p>
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-3 col-sm-12 col-xs-12 top-menu">
      <div class="text-center">
        <a href="{{ route('welcome.consult') }}">
          <img src="{{ asset('img/navigation/btn_get_consult.png') }}">
        </a>
        <a href="{{ url('/login') }}">
          <img src="{{ asset('img/welcome/signin_button.png') }}">
        </a>
        </ul>
      </div>
    </div>

  </div>

</div>
