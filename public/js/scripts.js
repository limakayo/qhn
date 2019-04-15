var map;
function initMap() {
  var myLatlng = new google.maps.LatLng(-25.4396376,-49.2424188);
	var mapOptions = {
	  zoom: 18,
	  center: myLatlng,
	  scrollwheel: false
	}
	var map = new google.maps.Map(document.getElementById("map"), mapOptions);

	var marker = new google.maps.Marker({
	    position: myLatlng,
	    title: "Hello World!"
	});

	// To add the marker to the map, call setMap();
	marker.setMap(map);

	google.maps.event.addDomListener(window, "resize", function() {
	 var center = map.getCenter();
	 google.maps.event.trigger(map, "resize");
	 map.setCenter(center); 
	});
}

$(function() {
	$('.telefone').mask('(00) 0000-00009');
	$('.telefone').blur(function(event) {
	   if($(this).val().length == 15){ // Celular com 9 dígitos + 2 dígitos DDD e 4 da máscara
	      $('.telefone').mask('(00) 00000-0009');
	   } else {
	      $('.telefone').mask('(00) 0000-00009');
	   }
	});

	$('#sendButton').on('click', function() {
			$(this).button('loading');
	});

	var foto = $('#foto');
	foto.zoom();

	var imagem = $('#imagem');
	var zoomImg;

	setTimeout(function() {
		zoomImg = $('.zoomImg');
	}, 1);

	$('.thumb-photo').click(function(e) {
		e.preventDefault();
		var thumb = $(this).find('img');
		if (zoomImg !== undefined) {
			zoomImg.attr('src', thumb.prop('src'));
			imagem.attr('src', thumb.prop('src'));
		}

		/*imagem.attr('src', img.prop('src'));
		zoomImg.attr('src', img.prop('src'));*/
	});

	var path = window.location.pathname;
	console.log(path);
	if (path.indexOf('nhs') >= 0) {
		$('#titulo-nhs').removeClass('grayscale').addClass('ativo');
	} else if (path.indexOf('sms') >= 0) {
		$('#titulo-sms').removeClass('grayscale').addClass('ativo');
	} else if (path.indexOf('schneider') >= 0) {
		$('#titulo-schneider').removeClass('grayscale').addClass('ativo');
	} else if (path.indexOf('apc') >= 0) {
		$('#titulo-apc').removeClass('grayscale').addClass('ativo');
	}

	$('.marca-nobreaks').hover(function() {
		var h2 = $(this).find('h2');
		if (h2.hasClass('grayscale')) {
			h2.removeClass('grayscale');
		}
	}, function() {
		var h2 = $(this).find('h2');
		if (!h2.hasClass('ativo')) {
			h2.addClass('grayscale');
		}
	});
});
