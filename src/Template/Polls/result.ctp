<?php
/**
 * Created by PhpStorm.
 * User: rom
 * Date: 7/25/17
 * Time: 10:00 AM
 */?>

<div class = "row">
    <div class="large-12 columns info_content">
        <div id="resMap" style="height:600px; width:100%;">

        </div>
    </div>
</div>


<script>

    var geoJSON = <?php echo json_encode($zones) ?>;
    var container_id = 'resMap';
    var style = 'mapbox://styles/mapbox/streets-v9';
    var center = [-8.65, 40.6333333];
    var zoom = 6;
    var token = 'pk.eyJ1Ijoicm9tZW5kb25jYSIsImEiOiJjaXpxd2FwOTIwMDE4MzJzNzJwZjdja3Z0In0.Kk5Lftir9LipsVFcU4wvwg';

    mapboxgl.accessToken = token;


    console.log(geoJSON);
    var rMap = new mapboxgl.Map({
        container: container_id,
        style: style,
        zoom: zoom,
        center: center,
        renderWorldCopies: false
    });

    rMap.on('load', function()
    {
        rMap.addSource('zones', {
            'type': 'geojson',
            'data': {
                "type": "FeatureCollection",
                "features": geoJSON.features
            }
        });

        rMap.addLayer({
            'id': 'zone-fills',
            'type': 'fill',
            'source': 'zones',
            'layout': { 'visibility' : 'visible' },
            'paint': {
                'fill-color': {
                    property: 'rank',
                    stops: [
                        [1, '#00ff40'],
                        [2, '#ffff00'],
                        [3, '#ffbf00'],
                        [4, '#ff0000'],
                        [17,'#000000']
                    ]
                },
                "fill-opacity": 0.7
            }
        });

    });

    rMap.getSource('zones').setData(geoJSON);



</script>
