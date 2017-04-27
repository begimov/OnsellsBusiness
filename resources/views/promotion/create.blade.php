@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Добавить акцию</div>
        <div class="panel-body">
          <form action="{{ route('promotion.store') }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="form-group">
              <label for="category">Категория</label>
              @if ($errors->has('category'))
              <div class="help-block alert-danger">
                <p>{{ $errors->first('category') }}</p>
              </div>
              @endif
              <select name="category" id="category" class="form-control">
                @foreach ($categories as $category)
                  @unless (isset($category->parent_id))
                  <optgroup label="{{ $category->name }}">
                    @foreach ($category->subcategories as $subcategory)
                      <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                    @endforeach
                  </optgroup>
                  @endunless
                @endforeach
              </select>
            </div>

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
              <pre>
                <textarea rows="4" cols="30" class="form-control" name="promotiondesc" id="promotiondesc" placeholder="50% скидка на все меню с 12 до 15 часов каждый будний день...">{{ old('promotiondesc') }}</textarea>
              </pre>
            </div>

            <div class="form-group">
            <label for="image">Изображение для акции</label>
            @if ($errors->has('image'))
            <div class="help-block alert-danger">
              <p>{{ $errors->first('image') }}</p>
            </div>
            @endif
            <input type="file" name="image" id="image">
          </div>

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
