<template>
    <div class="row">
        <div class="col-md-8">

                <div id="map" class="map">
                </div>

            </div>
            <div class="col-md-3">

        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                map: null,
                tileLayer: null,
                geojson: null            
            }
        },
        mounted() {
            axios.get('api/geojson1').then(response => this.geojson = response.data);
            console.log(geojson);
            this.initMap();
            this.initMarkers();

        },
        methods: {
            initMap() {
                this.map = L.map('map').setView([45.335031, 14.708266], 12);
                this.tileLayer = L.tileLayer('https://cartodb-basemaps-{s}.global.ssl.fastly.net/rastertiles/voyager/{z}/{x}/{y}.png',
                  {
                    maxZoom: 18,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, &copy; <a href="https://carto.com/attribution">CARTO</a>',
                  }
                );
                this.tileLayer.addTo(this.map);
            },

            initMarkers(){

                
                L.geoJSON(this.geojson).addTo(this.map);
               // this.operator1.forEach((marker) => {
                 //   console.log(marker);
                   //         L.geoJSON(marker).addTo(this.map);
                           // var latlng = L.latLng({ lat: marker.latitude, lng: marker.longitude });

                            //L.marker( latlng ).addTo(this.map);

                        //marker.leafletObject = L.marker(marker.coords).bindPopup(marker.name).addTo(this.map);
                    //});
            }
            
        }
    }
</script>

<style>
    .map {
        height: 600px;
    }
    </style>
