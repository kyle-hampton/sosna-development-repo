      </div>
    </div>

    <!-- mapbox functionility -->
    <script>
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
          'id': 'Hair-and-Nails',
          'type': 'symbol',
          'source': 'Hair-and-Nails',
          'layout': {
          'visibility': 'visible'
        },
          'source-layer': 'Hair-and-Nails'
      });
      map.addLayer({
          'id': 'Other-Businesses',
          'type': 'symbol',
          'source': 'Hair-and-Nail',
          'layout': {
          'visibility': 'visible'
        },
          'source-layer': 'Hair-and-Nail'
      });

    var toggleableLayerIds = [ 'Food-and-drinks', 'Stores-and-shopping', 'Entertainment', 'Contractors-and-construction', 'Health-wellness-and-fitness', 'Hair-and-Nails', 'Others-Businesses' ];



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

    </script>

     <!-- hide button functionaliity -->
    <script>
        function sidebarButton(){

          var sidebar = document.getElementById('sidebar-wrapper');
          if (sidebar.style.display === "none") {
              sidebar.style.display = "block";
            } else {
              sidebar.style.display = "none";
            }

        }
    </script>

    <!-- hide map menu button functionaliity -->
   <script>
         function hideFunction(){
           var hide = document.getElementById('menu');
           if (hide.style.display === "none") {
               hide.style.display = "block";
             } else {
               hide.style.display = "none";
             }
          }
   </script>

   <script type="text/javascript">

   function myFunction(x) {
        var sidebar = document.getElementById('sidebar-wrapper');

        if (x.matches && sidebar.style.display === "block") { // If media query matches
            sidebar.style.display = "none";
        } else {
            sidebar.style.display = "block";
          }
        }

        var x = window.matchMedia("(max-width: 425px)")
        myFunction(x) // Call listener function at run time
        x.addListener(myFunction) // Attach listener function on state changes

   </script>



  </body>
</html>
