

<div id="map" style="margin-top:0px">

</div>
<script>
  var map;
  function gerarMarcadores(mapa, rota, tipo) {
    console.log(mapa);
    $.ajax({ url: 'http://localhost:8000/' + rota, method: 'GET', dataType: 'json',
        error: function (xhr, status, error) {
            console.error("Erro ao obter lista de servidores");
        }
    }).then(function (data) {
      //console.log(data.ctos)
      data.data.forEach(element => {
        //console.log(element)
        var latLng = new google.maps.LatLng(element.lat,element.lng);
        var contentString = '<div id="content">'+
                          '<div id="siteNotice">'+
                          '</div>'+
                          '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
                          '<div id="bodyContent">'+
                          '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
                          'sandstone rock formation in the southern part of the '+
                          'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
                          'south west of the nearest large town, Alice Springs; 450&#160;km '+
                          '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major '+
                          'features of the Uluru - Kata Tjuta National Park. Uluru is '+
                          'sacred to the Pitjantjatjara and Yankunytjatjara, the '+
                          'Aboriginal people of the area. It has many springs, waterholes, '+
                          'rock caves and ancient paintings. Uluru is listed as a World '+
                          'Heritage Site.</p>'+
                          '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
                          'https://en.wikipedia.org/w/index.php?title=Uluru</a> '+
                          '(last visited June 22, 2009).</p>'+
                          '</div>'+
                          '</div>';
        var infowindow = new google.maps.InfoWindow({ content: contentString });
        var marker = new google.maps.Marker({
            position: latLng,
            map: mapa,
            icon: tipo
        });
        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });

      });
    })
  }
  function initMap() {
    // Configuracoes
    var customStyled = [
      {
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#242f3e"
          }
        ]
      },
      {
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#746855"
          }
        ]
      },
      {
        "elementType": "labels.text.stroke",
        "stylers": [
          {
            "color": "#242f3e"
          }
        ]
      },
      {
        "featureType": "administrative",
        "elementType": "geometry",
        "stylers": [
          {
            "visibility": "off"
          }
        ]
      },
      {
        "featureType": "administrative.locality",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#d59563"
          }
        ]
      },
      {
        "featureType": "poi",
        "stylers": [
          {
            "visibility": "off"
          }
        ]
      },
      {
        "featureType": "poi",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#d59563"
          }
        ]
      },
      {
        "featureType": "poi.park",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#263c3f"
          }
        ]
      },
      {
        "featureType": "poi.park",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#6b9a76"
          }
        ]
      },
      {
        "featureType": "road",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#38414e"
          }
        ]
      },
      {
        "featureType": "road",
        "elementType": "geometry.stroke",
        "stylers": [
          {
            "color": "#212a37"
          }
        ]
      },
      {
        "featureType": "road",
        "elementType": "labels.icon",
        "stylers": [
          {
            "visibility": "off"
          }
        ]
      },
      {
        "featureType": "road",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#9ca5b3"
          }
        ]
      },
      {
        "featureType": "road.highway",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#746855"
          }
        ]
      },
      {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
          {
            "color": "#1f2835"
          }
        ]
      },
      {
        "featureType": "road.highway",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#f3d19c"
          }
        ]
      },
      {
        "featureType": "transit",
        "stylers": [
          {
            "visibility": "off"
          }
        ]
      },
      {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#2f3948"
          }
        ]
      },
      {
        "featureType": "transit.station",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#d59563"
          }
        ]
      },
      {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#17263c"
          }
        ]
      },
      {
        "featureType": "water",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#515c6d"
          }
        ]
      },
      {
        "featureType": "water",
        "elementType": "labels.text.stroke",
        "stylers": [
          {
            "color": "#17263c"
          }
        ]
      }
    ];
    
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: new google.maps.LatLng(2.8,-60.7)
    });
    map.set('styles', customStyled);

    var cto = {
        url: '{{asset("img/icons/base-de-dados2.svg")}}', // url
        scaledSize: new google.maps.Size(20, 20), // scaled size
        origin: new google.maps.Point(0,0), // origin
        anchor: new google.maps.Point(0, 0) // anchor
    };
    var server = {
        url: '{{asset("img/icons/servidor.svg")}}', // url
        scaledSize: new google.maps.Size(20, 20), // scaled size
        origin: new google.maps.Point(0,0), // origin
        anchor: new google.maps.Point(0, 0) // anchor
    };
    gerarMarcadores(map, 'tenant/ctoslocalizacao', cto);
    gerarMarcadores(map, 'f/maps/servers', server);
    
	}
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbu1X_x1tXwgBaUmzJI9Qr55RyEkOPUaQ&callback=initMap">
</script>