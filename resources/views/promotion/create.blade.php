@extends('layouts.app')

@section('titleandmetatags')
  @include('layouts.partials._metatags')
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">Добавить акцию</div>
          <div class="panel-body">

            <form action="{{ route('promotion.store') }}" id="addform" method="post" enctype="multipart/form-data">

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
                    <optgroup label="{{ $category->name }}">
                      @foreach ($category->subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
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

              <div class="form-group" id="promo-addresses">
                <label for="address">Адрес акции или компании</label>
                @if ($errors->has('address'))
                  <div class="help-block alert-danger">
                    <p>{{ $errors->first('address') }}</p>
                  </div>
                @elseif ($errors->has('lat.*'))
                  <div class="help-block alert-danger">
                    <p>{{ $errors->first('lat.*') }}</p>
                  </div>
                @endif
                <div class="input-group">
                  <input type="text" class="form-control" name="address[]" id="address" placeholder="Улица и дом">
                  <div class="input-group-btn">
                    <a href="#" id="addaddress" class="btn btn-primary">Добавить</a>
                  </div>
                </div>
                <input type="hidden" name="lat[]" id="lat" value="">
                <input type="hidden" name="lng[]" id="lng" value="">
              </div>

              <div class="map" id="map-canvas" style="width: 100%; height: 500px; margin-bottom: 30px;"></div>

              <button type="submit" id="addpromo" class="btn btn-primary">Добавить акцию</button>

            </form>

          </div>
        </div>
      </div>

    </div>
  </div>
@endsection

@section('scripts')
  <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLEMAPS_API_KEY') }}&libraries=places&callback=initMap"></script>
@endsection

<script type="text/javascript">

function initMap() {

  var mapOptions = {
    zoom: 13,
    center: {
      lat: 59.9307772,
      lng: 30.3276762
    }
  };

  var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
  var autocomplete = new google.maps.places.Autocomplete(document.getElementById('address'));
  autocomplete.setComponentRestrictions({'country': ['ru']});
  autocomplete.bindTo('bounds', map);

  var marker = new google.maps.Marker({
    map: map,
    anchorPoint: new google.maps.Point(0, -29),
  });

  autocomplete.addListener('place_changed', function () {
    var place = autocomplete.getPlace();
    if (place.geometry) {
      document.getElementById("address").value = place.formatted_address;
      map.setCenter(place.geometry.location);
      map.setZoom(15);
      marker.setIcon({
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(35, 35)
      });
      marker.setPosition(place.geometry.location);
      marker.setVisible(true);
      var lat = place.geometry.location.lat();
      var lng = place.geometry.location.lng();
      document.getElementById("lat").value = lat.toString();
      document.getElementById("lng").value = lng.toString();
    }
  });

}

function deleteAddress(elem) {
  var name = $(elem).attr("name");
  var elem = document.getElementById(name);
  elem.parentNode.removeChild(elem);
  return false;
}

</script>

@section('postJquery')
  @parent
  var address, lat, lng;

  $( '#addaddress' ).click(function(e) {
    e.preventDefault();
    address = $( "input#address" ).val();
    lat = $( "input#lat" ).val();
    lng = $( "input#lng" ).val();
    if (address && lat && lng && $('input[name*="address[]"]').length < 11) {
      $( "#promo-addresses" ).append('<p id="' + lat + lng + '"><i>' + address + '</i>&nbsp;&nbsp;<strong><a href="#" class="btn btn-danger btn-xs" name="' + lat + lng + '" onclick="return deleteAddress(this)">Удалить</a></strong><input type="hidden" name="address[]" value="' + address + '"><input type="hidden" name="lat[]" value="' + lat + '"><input type="hidden" name="lng[]" value="' + lng + '"></p>');
    }

    $( "input#address" ).val('');
    $( "input#lat" ).val('');
    $( "input#lng" ).val('');

    return true;
  });

  $( '#addpromo' ).click(function() {
    $(this).attr('disabled','disabled');
    $( '#addform' ).submit();
    return true;
  });
@endsection
