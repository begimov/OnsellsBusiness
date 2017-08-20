@extends('layouts.app')

@section('titleandmetatags')
  @include('layouts.partials._metatags')
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif
      <div class="panel panel-default">
        <div class="panel-heading">Редактирование акции</div>
        <div class="panel-body">

          <form action="{{ route('promotion.update', $promotion) }}" id="addform" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="form-group">
              <label for="category">Категория</label>
              @if ($errors->has('category'))
              <div class="help-block alert-danger">
                <p>{{ $errors->first('category') }}</p>
              </div>
              @endif
              <select name="category" id="category" class="form-control">
                @foreach ($categories as $category)
                <optgroup label="{{ $category->name }}">
                  @foreach ($category->subcategories as $subcategory)
                  <option value="{{ $subcategory->id }}" {{ $subcategory->id == $promotion->category->id ? 'selected="selected"' : '' }}>{{ $subcategory->name }}</option>
                  @endforeach
                </optgroup>
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
              <input type="text" class="form-control" name="company" id="company" value="{{ $promotion->company }}">
            </div>

            <div class="form-group">
              <label for="promotionname">Название акции</label>
              @if ($errors->has('promotionname'))
              <div class="help-block alert-danger">
                <p>{{ $errors->first('promotionname') }}</p>
              </div>
              @endif
              <input type="text" class="form-control" name="promotionname" id="promotionname" value="{{ $promotion->promotionname }}">
            </div>

            <div class="form-group">
              <label for="promotiondesc">Описание акции</label>
              @if ($errors->has('promotiondesc'))
              <div class="help-block alert-danger">
                <p>{{ $errors->first('promotiondesc') }}</p>
              </div>
              @endif
              <pre>
                <textarea rows="4" cols="30" class="form-control" name="promotiondesc" id="promotiondesc">{{ $promotion->promotiondesc }}</textarea>
              </pre>
            </div>

            <div class="form-group">
              <label for="image">Изображение для акции</label>
              <div><img src="{{ $promotion->mediumImgPath() }}"></div>
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
              <input type="text" class="form-control" name="phone" id="phone" placeholder="" value="{{ $promotion->phone }}">
              <p class="help-block">Телефон компании для клиентов</p>
            </div>

            <div class="form-group">
              <label for="website">Адрес сайта</label>
              @if ($errors->has('website'))
              <div class="help-block alert-danger">
                <p>{{ $errors->first('website') }}</p>
              </div>
              @endif
              <input type="text" class="form-control" name="website" id="website" placeholder="" value="{{ $promotion->website }}">
              <p class="help-block">Ссылка на сайт компании, группу в соц. сети, страницу акции</p>
            </div>

            <button type="submit" id="addpromo" class="btn btn-primary">Сохранить акцию</button>

          </form>

        </div>
      </div>
    </div>

  </div>
</div>
@endsection

@section('postJquery')
    @parent
    $('#addpromo').click(function() {
        $(this).attr('disabled','disabled');
        $('#addform').submit();
        return true;
    });
@endsection
