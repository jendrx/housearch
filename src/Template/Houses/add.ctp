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
                <?=   $this->Form->control('condition_id', ['options' => $conditions]) ?>
            </div>

        </div>

        <!--<div class="row">
            <div class="large-6 columns">
                <?=   $this->Form->control('zone_id', ['options' => $zones]) ?>
            </div>

        </div>-->

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
                <?=  $this->Form->control('lat'); ?>
            </div>

        </div>

        <div class="row">
            <div class="large-6 columns">
                <?=  $this->Form->control('lon') ?>
            </div>

        </div>

        <div class="row">
            <div class="large-6 columns">
                <?= $this->Form->control('url_ad', ['type' => 'url']) ?>
            </div>

        </div>

            <!-- echo $this->Form->control('seller_id', ['options' => $sellers]);
            echo $this->Form->control('location');
            echo $this->Form->control('location_json');-->


        <div class="row">
            <div class="large-6 columns">
                <?= $this->Form->button(__('Submit')) ?>
            </div>

        </div>

        <?= $this->Form->end() ?>
    </div>
</div>
