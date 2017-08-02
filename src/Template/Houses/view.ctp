<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="row">

    <div class="large-6 columns ">
        <!--<h3><?= h($house->id) ?></h3>-->

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
        <div id="hmap" style="height:50vh;">

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

    $(document).ready(function()
    {

        var houseData = <?php echo $house; ?>;
        var zone = houseData.zone;
        var centroid = turf.centroid(zone.geom_json).geometry.coordinates;

        console.log(houseData);

        var container_id = 'hmap';
        var style = 'mapbox://styles/mapbox/streets-v8';
        var center = [centroid[0], centroid[1]];
        var zoom = 14;

        var token = 'pk.eyJ1Ijoicm9tZW5kb25jYSIsImEiOiJjaXpxd2FwOTIwMDE4MzJzNzJwZjdja3Z0In0.Kk5Lftir9LipsVFcU4wvwg';

        mapboxgl.accessToken = token;

        var hmap = new mapboxgl.Map({
            container: container_id,
            style: style,
            zoom: zoom,
            center: center,
            renderWorldCopies: false
        });




        hmap.on('load',function()
        {
            hmap.addSource('zones', {
                'type': 'geojson',
                'data': {
                    "type": "FeatureCollection",
                    "features": [zone.geom_json]
                }
            });



            hmap.addLayer({
                'id': 'zone-fills',
                'type': 'fill',
                'source': 'zones',
                'layout': { 'visibility' : 'visible' },
                'paint': {
                    "fill-color": "#627BC1",
                    "fill-opacity" : 0.7
                }
            });

            hmap.addLayer({
                'id': 'zone-borders',
                'type': 'line',
                'source': 'zones',
                'layout': {'visibility' : 'visible'},
                'paint': {
                    'line-color': '#000',
                    'line-width': 1
                }
            });


            /*hmap.addLayer({
                'id': 'zone-borders',
                'type': 'symbol',
                'source': 'zones',
                'layout': {'visibility' : 'visible',
                    'icon-image': 'marker-15'},
                'paint': {
                    'line-color': '#000',
                    'line-width': 1
                }
            });*/
        });
    });

</script>