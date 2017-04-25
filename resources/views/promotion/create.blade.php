@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Добавить акцию</div>
                <div class="panel-body">
                  <form action="{{ route('promotion.store') }}" method="post">

                    {{ csrf_field() }}

                    <!-- <div class="form-group">
                      <label for="category">Категория</label>
                      <select name="category" class="form-control">
                        <option value="cafe">Кафе, рестораны, бары</option>
                        <option value="sport">Спорт</option>
                        <option value="shopping">Покупки</option>
                        <option value="entertainment">Развлечения</option>
                      </select>
                    </div> -->

                    <div class="form-group">
                      <label for="company">Название компании</label>
                      @if ($errors->has('company'))
                          <div class="help-block alert-danger">
                              <p>{{ $errors->first('company') }}</p>
                          </div>
                      @endif
                      <input type="text" class="form-control" name="company" id="company" placeholder="Суши-бар 'Суши'..." value="{{ old('company') }}">
                    </div>

                    <div class="form-group">
                      <label for="promotion-name">Название акции</label>
                      @if ($errors->has('promotion-name'))
                          <div class="help-block alert-danger">
                              <p>{{ $errors->first('promotion-name') }}</p>
                          </div>
                      @endif
                      <input type="text" class="form-control" name="promotion-name" id="promotion-name" placeholder="50% скидка на меню..." value="{{ old('promotion-name') }}">
                    </div>

                    <div class="form-group">
                      <label for="promotion-desc">Описание акции</label>
                      @if ($errors->has('promotion-desc'))
                          <div class="help-block alert-danger">
                              <p>{{ $errors->first('promotion-desc') }}</p>
                          </div>
                      @endif
                      <textarea rows="4" cols="30" class="form-control" name="promotion-desc" id="promotion-desc" placeholder="50% скидка на все меню с 12 до 15 часов каждый будний день...">{{ old('promotion-desc') }}</textarea>
                    </div>

                    <!-- <div class="form-group">
                      <label for="image">Добавить фото</label>
                      <input type="file" id="image">
                    </div> -->

                    <div class="form-group">
                      <label for="phone">Номер телефона</label>
                      @if ($errors->has('phone'))
                          <div class="help-block alert-danger">
                              <p>{{ $errors->first('phone') }}</p>
                          </div>
                      @endif
                      <input type="text" class="form-control" name="phone" id="phone" placeholder="" value="{{ old('phone') }}">
                      <p class="help-block">Телефон компании для клиентов</p>
                    </div>

                    <div class="form-group">
                      <label for="website">Адрес сайта</label>
                      @if ($errors->has('website'))
                          <div class="help-block alert-danger">
                              <p>{{ $errors->first('website') }}</p>
                          </div>
                      @endif
                      <input type="text" class="form-control" name="website" id="website" placeholder="" value="{{ old('website') }}">
                      <p class="help-block">Ссылка на сайт компании, группу в соц. сети, страницу акции</p>
                    </div>

                    <div class="form-group">
                      <label for="address">Адрес компании</label>
                      @if ($errors->has('address'))
                          <div class="help-block alert-danger">
                              <p>{{ $errors->first('address') }}</p>
                          </div>
                      @endif
                      <input type="text" class="form-control" name="address" id="address" placeholder="Улица, дом..." value="{{ old('address') }}">
                    </div>

                <button type="submit" class="btn btn-primary">Добавить акцию</button>

              </form>

            </div>
            </div>
        </div>
    </div>
</div>
@endsection
