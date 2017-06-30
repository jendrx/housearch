<?php
    /**
     * @var \App\View\AppView $this
     */
?>


<div class="row info_content">
    <?= $this->Form->create($house) ?>
    <h4><?= __('Add House') ?></h4>
    <div class="large-12 columns">


        <div class="row">
            <div class="large-6 columns">
                            <?= $this->Form->control('price',['min' => '0']) ?>
            </div>
        </div>

        <div class="row">
            <div class="large-6 columns">
                            <?= $this->Form->control('area',['min' => '0']) ?>

                        </div>

        </div>

        <div class="row">
            <div class="large-6 columns">
                            <?= $this->Form->control('construction_year',['min' => '0']) ?>
                        </div>

        </div>

        <div class="row">
            <div class="large-6 columns">
                            <?=$this->Form->control('condition_id', ['options' => $conditions]) ?>
                        </div>

        </div>

        <div class="row">
            <div class="large-6 columns">
                <?= $this->Form->control('zone_id', ['id' => 'input_zone_id', 'type' => 'text']) ?>
            </div>

        </div>

        <div class="row">
            <div class="large-6 columns">
                <?= $this->Form->control('rooms',['min' => '0']); ?>
            </div>
        </div>

        <div class="row">
            <div class="large-6 columns">
                <?=  $this->Form->control('garage_id', ['options' => $garages]) ?>
            </div>
        </div>

        <div class="row">
            <div class="large-6 columns">
                <div class="row">
                    <div class="large-6 columns">
                        <?= $this->Form->control('outbuilding_id', ['options' => $outbuildings]) ?>
                    </div>
                    <div class="large-6 columns">
                        <?= $this->Form->control('outbuilding_area',['min' => '0']) ?>

                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="large-6 columns">
                <div class="row">
                    <div class="large-6 columns">
                                    <?= $this->Form->control('energy_certification_id', ['options' => $energyCertifications]) ?>
                                </div>
                    <div class="large-6 columns">
                                    <?= $this->Form->control('energy_certification_year',['min' => '0']) ?>
                                </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="large-6 columns">
                            <?=  $this->Form->control('house_type_id', ['options' => $houseTypes]) ?>
                        </div>

        </div>

        <div class="row">
            <div class="large-6 columns">
                            <?= $this->Form->control('url_ad', ['type' => 'url']) ?>
                        </div>

        </div>


        <div class="row">
            <div class="large-6 columns">
                <?=  $this->Form->control('lat', ['id' => 'lat_id']); ?>
            </div>

        </div>

        <div class="row">
            <div class="large-6 columns">
                <?=  $this->Form->control('lon', ['id' => 'lon_id']) ?>
            </div>

        </div>

        <div class="row">
            <div class="large-6 columns">
                <fieldset id ="location_fieldset" class="fieldset">
                    <legend> Location input</legend>
                    <?= $this->Form->radio('location', [['value' => 0, "text" => 'Absolute','id' => '0'],['value' => 1, "text" => 'Zonal']]) ?>
                </fieldset>
            </div>
        </div>


        <div class="row">
            <div class="large-9 columns">
                <div id="map" style="height:400px; width:100%"></div>
            </div>
            <div class="large-3 columns">
                <div id="regions_container" style="max-height: 400px; max-width:300px;overflow-y: scroll">
                    <div id="regions_panel">
                        <?= $this->Form->radio('parishes',$parishes)?>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="large-6 columns">
                <?= $this->Form->button(__('Submit'),['class' => 'button']) ?>
            </div>

        </div>
        <?= $this->Form->end() ?>


    </div>
</div>

<script>

    function getSubSectionsGeoJson(id, callback) {
        $.ajax(
            {
                type: 'get',
                url: '/Maps/getParishesZonesGeoJSON',
                dataType: 'json',
                data: {
                    'id': id
                },
                success: function (data) {
                    callback(data);

                }
            }
        );
    }

    /* variable that points function
     that repsonsible to grab lat and lon and put this values at latitude and longitude inputs */
    var _setMarker = function(e){

        map.getSource('marker').setData({
            'type': 'Point',
            'coordinates': [e.lngLat.lng, e.lngLat.lat]
        });

        $('#lat_id').val(e.lngLat.lat);
        $('#lon_id').val(e.lngLat.lng);
    }


    var _setHover = function (e) {
        map.setFilter('zone-fills-hover', ['all',["==", "id", e.features[0].properties.id],["!=", "lug_code",'999999']]);

        if(e.features[0].properties.lug_code !== '999999')
        {
            $("#input_zone_id").val(e.features[0].properties.id)
        }
    }


    /********************************** Add basic map style *****************************/
    var container_id = 'map';
    var style = 'mapbox://styles/mapbox/streets-v9';
    var center = [-8.65, 40.6333333];
    var zoom = 6;
    var token = 'pk.eyJ1Ijoicm9tZW5kb25jYSIsImEiOiJjaXpxd2FwOTIwMDE4MzJzNzJwZjdja3Z0In0.Kk5Lftir9LipsVFcU4wvwg';

    mapboxgl.accessToken = token;


    var map = new mapboxgl.Map({
        container: container_id,
        style: style,
        zoom: zoom,
        center: center,
        renderWorldCopies: false
    });

    map.on('load', function () {


        map.addSource('zones', {
            'type': 'geojson',
            'data': {
                "type": "FeatureCollection",
                "features": []
            }
        });



        map.addLayer({
            'id': 'zone-fills',
            'type': 'fill',
            'source': 'zones',
            'layout': { 'visibility' : 'visible' },
            'paint': {
                "fill-color": "#deb36c",
                "fill-opacity": 0.5
            }
        });

        map.addLayer({
            'id': 'zone-borders',
            'type': 'line',
            'source': 'zones',
            'layout': {'visibility' : 'visible' },
            'paint': {
                'line-color': '#aaa',
                'line-width': 1,

            }
        });

        map.addLayer({
            "id": "zone-fills-hover",
            "type": "fill",
            "source": "zones",
            "layout": { 'visibility' : 'none' },
            "paint": {
                "fill-color": "#627BC1",
                "fill-opacity": 1
            },
            "filter": ['==', 'id', '']
        });

        /// layer that contain point
        map.addLayer({
            "id": "marker",
            "type": "circle",
            "layout": {
                'visibility' : 'none'

            },
            "source": {
                'type': 'geojson',
                'data': {
                    "type": "Point",
                    "coordinates": [-9.50, 40]
                }
            },
            'paint': {
                // make circles larger as the user zooms from z12 to z22
                'circle-radius': {
                    'base': 2.75,
                    'stops': [[12, 5]]
                },
                'circle-color': '#627BC1',
                'circle-opacity' : 0.5
            }
        });




    });

    $("#location_fieldset input[type=radio]").change(function() {

        var value = $(this).val();
        console.log($(this).val());

        if (value == 0)
        {

            if(map.getLayoutProperty('zone-fills-hover','visibility') == 'visible')
            {
                map.setLayoutProperty('zone-fills-hover', 'visibility','none');
                map.off('click', _setHover);
            }


            if(map.getLayoutProperty('marker', 'visibility') == 'none')
            {
                map.setLayoutProperty('marker', 'visibility','visible');
            }
            map.on('click', _setMarker);
        }
        else
        {
            $('#lat_id').val(null);
            $('#lon_id').val(null);

            if(map.getLayoutProperty ('marker', 'visibility') == 'visible')
            {
                map.setLayoutProperty('marker', 'visibility', 'none');
                map.off('click', _setMarker);
            }

            if(map.getLayoutProperty('zone-fills-hover','visibility') == 'none')
            {
                map.setLayoutProperty('zone-fills-hover', 'visibility', 'visible');
            }

            map.on('click', "zone-fills", _setHover);
        }

        });

    $('#regions_panel input[type=radio]').change(function () {
        getSubSectionsGeoJson($(this).val(), function (data) {
            var coordinates = data.camera;
            var geoJSON = data.geoJSON;

            map.flyTo({
                center: [coordinates.lon, coordinates.lat]
            });


            map.getSource('zones').setData(geoJSON);

        });
    });


</script>
