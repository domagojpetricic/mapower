<template>
    <div class="row">
        <div class="col-md-8">

                <div id="map" class="map">
                </div>

            </div>
            <div class="col-md-3">
            <div 
                class="form-check"
                v-for="operator in operators"
                :key="operator.id"
                >
                <label class="form-check-label">
                <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="operator.active"
                    @change="operatorChanged(operator.id, operator.active)"
                    />
                        {{ operator.name }}
                    
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
                operators: []
            }
        },
        mounted() {
            this.initMap();
            this.initOperators();
            axios.get('api/vuereports').then(response => this.operators = response.data);

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
            initOperators() {
                this.operators.forEach((operator) => {
                    const markerReports = operator.reports.filter(report => report.type === 'marker');
                    markerReports.forEach((report) => {
                        report.leafletObject = L.marker(report.coords).bindPopup(report.name);
                    });
                });
            },
            operatorChanged(operatorId, active) {
                const operator = this.operators.find(operator => operator.id === operatorId);
                operator.reports.forEach((report) => {
                    if (active) {
                        report.leafletObject.addTo(this.map);
                    } else {
                        report.leafletObject.removeFrom(this.map);
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
