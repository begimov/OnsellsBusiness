@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Добавить акцию</div>
                <div class="panel-body">
                  <form>
                    <div class="form-group">
                      <label for="category">Категория</label>
                      <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                          Категория
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                          <li><a href="#">Отдых</a></li>
                          <li><a href="#">Спорт</a></li>
                          <li><a href="#">Покупки</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="company">Название компании</label>
                      <input type="text" class="form-control" id="company" placeholder="Суши-бар 'Суши'...">
                    </div>
                    <div class="form-group">
                      <label for="promotions">Название акции</label>
                      <input type="text" class="form-control" id="promotions" placeholder="50% скидка на меню...">
                    </div>
                    <div class="form-group">
                      <label for="promotions">Описание акции</label>
                      <textarea rows="4" cols="30" class="form-control" id="promotions" placeholder="50% скидка на все меню с 12 до 15 часов каждый будний день..."></textarea>
                    </div>
                    <div class="form-group">
                      <label for="image">Добавить фото</label>
                      <input type="file" id="image">

                    </div>
                    <div class="form-group">
                      <label for="phone">Номер телефона</label>
                      <input type="text" class="form-control" id="phone" placeholder="">
                      <p class="help-block">Телефон компании для клиентов</p>
                    </div>
                    <div class="form-group">
                      <label for="website">Адрес сайта</label>
                      <input type="text" class="form-control" id="website" placeholder="">
                      <p class="help-block">Ссылка на сайт компании, группу в соц. сети, страницу акции</p>
                    </div>
                    <div class="form-group">
                      <label for="website">Адрес компании</label>
                      <input type="text" class="form-control" id="website" placeholder="Улица, дом...">
                    </div>
                    <!-- <div class="checkbox">
                    <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div> -->
                <button type="submit" class="btn btn-primary">Добавить акцию</button>
              </form>

            </div>
            </div>
        </div>
    </div>
</div>
@endsection
