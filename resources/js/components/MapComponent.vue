<template>
    <div class="row">
        <div class="col-md-8">

                <div id="map" class="map">
                </div>

            </div>
            <div class="col-md-3">
            <div 
                class="form-check"
                v-for="layer in layers"
                :key="layer.id"
                >
                <label class="form-check-label">
                <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="layer.active"
                    @change="layerChanged(layer.id, layer.active)"
                    />
                        {{ layer.name }}
                    
                </label>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                map: null,
                tileLayer: null,
                layers: [
                {
                    id: 0,
                    name: 'layer1',
                    active: 0,
                    features: [
                        {
                            id: 0,
                            name: 'Vrata',
                            type: 'marker',
                            coords: ["45.312580", "14.724152"],
                        },
                        {
                            id: 1,
                            name: 'Beloselo',
                            type: 'marker',
                            coords: [45.318730, 14.733049],
                        },
                        {
                            id: 2,
                            name: 'Fuzine',
                            type: 'marker',
                            coords: [45.308684, 14.716407],
                        },
                        {
                            id: 3,
                            name: 'Vrelo',
                            type: 'marker',
                            coords: [45.316259, 14.712803],
                        },
                        {
                            id: 4,
                            name: 'Benkovac',
                            type: 'marker',
                            coords: [45.307059, 14.701024],
                        },
                        {
                            id: 5,
                            name: 'Lic',
                            type: 'marker',
                            coords: [45.293080, 14.722613],
                        },
                    ],
                },
                {
                    id: 1,
                    name: 'layer2',
                    active: 0,
                    features: [
                        {
                            id: 0,
                            name: 'Vrata1',
                            type: 'marker',
                            coords: [45.302580, 14.721152],
                        },
                        {
                            id: 1,
                            name: 'Beloselo1',
                            type: 'marker',
                            coords: [45.418730, 14.703049],
                        },
                        {
                            id: 2,
                            name: 'Fuzine1',
                            type: 'marker',
                            coords: [45.318684, 14.816407],
                        },
                        {
                            id: 3,
                            name: 'Vrelo1',
                            type: 'marker',
                            coords: [45.316559, 14.712903],
                        },
                        {
                            id: 4,
                            name: 'Benkovac1',
                            type: 'marker',
                            coords: [45.317059, 14.701094],
                        },
                        {
                            id: 5,
                            name: 'Lic1',
                            type: 'marker',
                            coords: [45.293181, 14.732613],
                        },
                    ],
                },
            ],
        }
        },
        mounted() {
            this.initMap();
            this.initLayers();

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
            initLayers() {
                this.layers.forEach((layer) => {
                    console.log(layer);
                    const markerFeatures = layer.features.filter(feature => feature.type === 'marker');
                    markerFeatures.forEach((feature) => {
                        console.log(feature);
                        feature.leafletObject = L.marker(feature.coords).bindPopup(feature.name);
                    });

                    const polygonFeatures = layer.features.filter(feature => feature.type === 'polygon');
                    polygonFeatures.forEach((feature) => {
                        feature.leafletObject = L.polygon(feature.coords).bindPopup(feature.name);
                    });
                });
            },
            layerChanged(layerId, active) {
                const layer = this.layers.find(layer => layer.id === layerId);
                layer.features.forEach((feature) => {
                    if (active) {
                        feature.leafletObject.addTo(this.map);
                    } else {
                        feature.leafletObject.removeFrom(this.map);
                    }
                });

            },
        }
    }
</script>

<style>
    .map {
        height: 600px;
    }
    </style>
