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

            <div class="form-group">
              <label for="category">Категория</label>
              <select name="category" class="form-control">
                <option selected="selected">Выберите категорию акции</option>
                <optgroup label="">
                  <option value=""></option>
                </optgroup>
              </select>
            </div>
            <!-- Авто (АЗС, автосервисы, салоны, мойки, страхование авто)
            Всё для дома (Мебель, техника, шторы)
            Дети (Частные сады, студии, детские центры)
            Еда (Кафе, бары, пабы, рестораны, доставка)
            Зоо (Ветеринарные клиники, зоомагазины, зоосалоны, услуги для животных)
            Красота и здоровье (Салоны, клиники, стоматологии, фитнес)
            Магазины (Универсамы, супермаркеты, обувные магазины, магазины с одеждой)
            Обучение (Иностранные языки, танцы, спорт)
            Развлечения (Кинотеатры, мероприятия, квесты, боулинг и бильярд, аквапарки)
            Услуги (Ремонт, страхование, юридическая помощь, туризм) -->
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
              <label for="promotionname">Название акции</label>
              @if ($errors->has('promotionname'))
              <div class="help-block alert-danger">
                <p>{{ $errors->first('promotionname') }}</p>
              </div>
              @endif
              <input type="text" class="form-control" name="promotionname" id="promotionname" placeholder="50% скидка на меню..." value="{{ old('promotionname') }}">
            </div>

            <div class="form-group">
              <label for="promotiondesc">Описание акции</label>
              @if ($errors->has('promotiondesc'))
              <div class="help-block alert-danger">
                <p>{{ $errors->first('promotiondesc') }}</p>
              </div>
              @endif
              <textarea rows="4" cols="30" class="form-control" name="promotiondesc" id="promotiondesc" placeholder="50% скидка на все меню с 12 до 15 часов каждый будний день...">{{ old('promotiondesc') }}</textarea>
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
<script>
$(document).ready(function(){
    $("#category").on("change",function(){
        var selectedVal=$( "#category option:selected" ).val();
        $("#subcategory > optgroup").attr("disabled","disabled");
        //$("#subcategory > optgroup").hide(); // you can also hide option insted make them just disabled
        $('#subcategory > optgroup[label="'+selectedVal+'"]').removeAttr("disabled");
       // $('#subcategory > optgroup[label="'+selectedVal+'"]').show()
    });
});
</script>
@endsection
