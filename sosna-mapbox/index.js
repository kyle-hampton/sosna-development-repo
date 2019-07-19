mapboxgl.accessToken = 'pk.eyJ1Ijoia3lsZW1heTE4MjIiLCJhIjoiY2pyam94b2Z2MDUyZzQzbnJwODN3cGoxZyJ9.6wvVT49pzIX8TCOiCPsCYg';
const map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/kylemay1822/cjseu2yo1116r1gqz9q9jjow0',
    center: [-75.171563, 39.940902],
    zoom: 16.4
});

map.on('load', function () {

  map.addLayer({
      'id': 'Food and drinks',
      'type': 'symbol',
      'source': 'Food-and-drinks',
      'layout': {
      'visibility': 'visible'
    },
      'source-layer': 'Food-and-drinks'
  });
  map.addLayer({
      'id': 'Stores and shopping',
      'type': 'symbol',
      'source': 'Stores-and-shopping',
      'layout': {
      'visibility': 'visible'
    },
      'source-layer': 'Stores-and-shopping'
  });
  map.addLayer({
      'id': 'Entertainment',
      'type': 'symbol',
      'source': 'Entertainment',
      'layout': {
      'visibility': 'visible'
    },
      'source-layer': 'Entertainment'
  });
  map.addLayer({
      'id': 'Contractors-and-construction',
      'type': 'symbol',
      'source': 'Contractors-and-construction',
      'layout': {
      'visibility': 'visible'
    },
      'source-layer': 'Contractors-and-construction'
  });
  map.addLayer({
      'id': 'Health-wellness-and-fitness',
      'type': 'symbol',
      'source': 'Health-wellness-and-fitness',
      'layout': {
      'visibility': 'visible'
    },
      'source-layer': 'Health-wellness-and-fitness'
  });
  map.addLayer({
      'id': 'sosna-medical',
      'type': 'symbol',
      'source': 'sosna-medical',
      'layout': {
      'visibility': 'visible'
    },
      'source-layer': 'sosna-medical'
  });

var toggleableLayerIds = [ 'Food-and-drinks', 'Stores-and-shopping', 'Entertainment', 'Contractors-and-construction', 'Health-wellness-and-fitness', 'New-to-town-and-Others' ];

for (var i = 0; i < toggleableLayerIds.length; i++) {
  var id = toggleableLayerIds[i];

  var link = document.createElement('a');
  link.href = '#';
  link.className = 'active';
  link.textContent = id;

  link.onclick = function (e) {
  var clickedLayer = this.textContent;
  e.preventDefault();
  e.stopPropagation();

  var visibility = map.getLayoutProperty(clickedLayer, 'visibility');

  if (visibility === 'visible') {
  map.setLayoutProperty(clickedLayer, 'visibility', 'none');
  this.className = '';
  } else {
  this.className = 'active';
  map.setLayoutProperty(clickedLayer, 'visibility', 'visible');
  }
  };

var layers = document.getElementById('menu');
layers.appendChild(link);
 }
});
