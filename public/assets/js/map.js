var geocoder = new google.maps.Geocoder();

function geocodePosition(pos) {
  geocoder.geocode({
    latLng: pos
  }, function(responses) {
    if (responses && responses.length > 0) {
      updateMarkerAddress(responses[0].formatted_address);
    } else {
      // updateMarkerAddress('Cannot determine address at this location.');
    }
  });
}

function updateMarkerStatus(str) {
  document.getElementById('markerStatus').innerHTML = str;
}

function updateMarkerPosition(latLng) {
  $('#latitute').val(latLng.lat())
  $('#longtitude').val(latLng.lng())
  
}

function updateMarkerAddress(str) {
  document.getElementById('address').innerHTML = str;
}

function initialize() {
  var latLng = new google.maps.LatLng(18.281774,99.494149);
  var map = new google.maps.Map(document.getElementById('mapCanvas'), {
    zoom: 5,
    center: latLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  var marker = new google.maps.Marker({
    position: latLng,
    title: 'Point A',
    map: map,
    draggable: true
  });
  
  // Update current position info.
  updateMarkerPosition(latLng);
  // geocodePosition(latLng);
  
  // Add dragging event listeners.
  // google.maps.event.addListener(marker, 'dragstart', function() {
  //   updateMarkerAddress('Dragging...');
  // });
  
  google.maps.event.addListener(marker, 'drag', function() {
    // updateMarkerStatus('Dragging...');
    updateMarkerPosition(marker.getPosition());
  });
  
  google.maps.event.addListener(marker, 'dragend', function() {
    // updateMarkerStatus('Drag ended');
    // geocodePosition(marker.getPosition());
  });
}

// Onload handler to fire off the app.
google.maps.event.addDomListener(window, 'load', initialize);
<div class="form-group">
  <label class="col-md-2 control-label" for="textinput">แผนที่</label>  
   <div class="col-md-5">
 <div style="width:400px;height:300px;"id="mapCanvas"></div>

  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">ค่า Latitute </label>  
   <div class="col-md-4">
   {{ Form::text('latitute',Input::old('latitute',$user['latitute']),array('id'=>'latitute','class'=>'form-control')) }}
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">ค่า Longtitude </label>  
   <div class="col-md-4">
    {{ Form::text('longtitude',Input::old('longtitude',$user['longtitude']),array('id'=>'longtitude','class'=>'form-control')) }}
  </div>
</div>