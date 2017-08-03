<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="row">

    <div class="large-6 columns ">

        <h4> General Information</h4>
        <div class="row">
            <div class="large-12 columns">
                <?= $this->Form->control('Price',['value' => $house->price, 'disabled' => true])?>
            </div>
        </div>

        <div class="row">
            <div class="large-12 columns">
                <?= $this->Form->control('Type',['value' => $house->house_type->description,'disabled' => true])?>
            </div>
        </div>

        <div class="row">
            <div class="large-12 columns">
                <?= $this->Form->control('Year',['value' => $house->construction_year,'disabled' => true])?>
            </div>
        </div>


        <div class="row">
            <div class="large-12 columns">
                <?= $this->Form->control('Area',['value' => $house->area,'disabled' => true])?>
            </div>
        </div>

        <div class="row">
            <div class="large-12 columns">
                <?= $this->Form->control('Url',['value' => $house->url_ad, 'disabled' => true])?>
            </div>
        </div>
    </div>
    <div class="large-6 columns">
        <div id="map" style="height:50vh;">

        </div>
    </div>
</div>

<div class="row">
    <div class="large-12 columns">

        <div class="row">
            <div class="large-12 columns">
                <?= $this->Form->control('Condition',['value' => $house->condition->description, 'disabled' => true])?>
            </div>
        </div>

        <div class="row">
            <div class="large-12 columns">
                <?= $house->has('conservation') ? $this->Form->control('Conservation',['value' => $house->conservation->description, 'disabled' => true]): $this->Form->control('Conservation',['value' => 'None', 'disabled' => true])?>
            </div>
        </div>

        <div class="row">
            <div class="large-12 columns">
                <?= $this->Form->control('Energy Certification',['value' => $house->energy_certification->description,'type' => 'text', 'disabled' => true])?>
            </div>
        </div>

        <div class="row">
            <div class="large-12 columns">
                <?= $house->has('energy_certification_year') ? $this->Form->control('Energy Certification Year',['value' => $house->energy_certification_year]) : __('Energy Certification Year is not defined') ?>
            </div>
        </div>


        <div class="row">
            <div class="large-12 columns">
                <?= $this->Form->control('Rooms',['value' => $house->rooms, 'disabled' => true])?>
            </div>
        </div>

        <div class="row">
            <div class="large-12 columns">
                <?= $this->Form->control('Garage',['value' => $house->garage->description, 'disabled' => true])?>
            </div>
        </div>

        <div class="row">
            <div class="large-12 columns">
                <?= $this->Form->control('Outbuilding',['value' => $house->outbuilding->description, 'disabled' => true])?>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                <?= $house->has('outbuilding_area') ? $this->Form->control('Outbuilding Area',['value' => $house->outbuilding_area]) : __('Outbuilding area is not defined') ?>
            </div>
        </div>
    </div>

</div>

<script>


    function territoryCentroid(geometry)
    {
        return turf.centroid(geometry).geometry.coordinates;
    }

    function initMap(container_id,style,zoom,center)
    {
        mapboxgl.accessToken = 'pk.eyJ1Ijoicm9tZW5kb25jYSIsImEiOiJjaXpxd2FwOTIwMDE4MzJzNzJwZjdja3Z0In0.Kk5Lftir9LipsVFcU4wvwg';

        var map = new mapboxgl.Map(
            {

                container: container_id,
                style: style,
                zoom: zoom,
                center: center,
                renderWorldCopies: false
            }
        );
        return map;
    }

    $(document).ready(function()
    {
        var houseData = <?php echo $house; ?>;
        var zone = houseData.zone;
        var centroid = territoryCentroid(zone.geom_json);

        var hmap = initMap('map','mapbox://styles/mapbox/streets-v8',14,[centroid[0], centroid[1]]);

        console.log(houseData);


        hmap.on('load',function()
        {
            hmap.addSource('geometry', {
                'type': 'geojson',
                'data': {
                    "type": "FeatureCollection",
                    "features": []
                }
            });

            if(houseData.location === 'z')
            {


                hmap.addLayer({
                    'id': 'zone-fills',
                    'type': 'fill',
                    'source': 'geometry',
                    'layout': { 'visibility' : 'visible' },
                    'paint': {
                        "fill-color": "#627BC1",
                        "fill-opacity" : 0.7
                    }
                });

                hmap.addLayer({
                    'id': 'boundaries',
                    'type': 'line',
                    'source': 'geometry',
                    'layout': {'visibility' : 'visible'},
                    'paint': {
                        'line-color': '#000',
                        'line-width': 1
                    }
                });

                hmap.getSource('geometry').setData(zone.geom_json);
            }
            else
            {
                hmap.addLayer({
                    'id': 'pointInterest',
                    'type': 'symbol',
                    'source': 'geometry',
                    'layout': {
                        'visibility' : 'visible',
                        'icon-image' : 'marker-15'

                    },
                    'paint' : {
                        'icon-color' : '#d00'
                    }

                });
                hmap.getSource('geometry').setData(houseData.geom_json);
            }

        });
    });

</script>