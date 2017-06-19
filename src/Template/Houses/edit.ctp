<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $house->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $house->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Houses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Energy Certifications'), ['controller' => 'EnergyCertifications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Energy Certification'), ['controller' => 'EnergyCertifications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Conservations'), ['controller' => 'Conservations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Conservation'), ['controller' => 'Conservations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Garages'), ['controller' => 'Garages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Garage'), ['controller' => 'Garages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Outbuildings'), ['controller' => 'Outbuildings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Outbuilding'), ['controller' => 'Outbuildings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Zones'), ['controller' => 'Zones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Zone'), ['controller' => 'Zones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sellers'), ['controller' => 'Sellers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Seller'), ['controller' => 'Sellers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Conditions'), ['controller' => 'Conditions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Condition'), ['controller' => 'Conditions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List House Types'), ['controller' => 'HouseTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New House Type'), ['controller' => 'HouseTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="houses form large-9 medium-8 columns content">
    <?= $this->Form->create($house) ?>
    <fieldset>
        <legend><?= __('Edit House') ?></legend>
        <?php
            echo $this->Form->control('price');
            echo $this->Form->control('area');
            echo $this->Form->control('construction_year');
            echo $this->Form->control('url_ad');
            echo $this->Form->control('location');
            echo $this->Form->control('energy_certification_year');
            echo $this->Form->control('outbuilding_area');
            echo $this->Form->control('energy_certification_id', ['options' => $energyCertifications, 'empty' => true]);
            echo $this->Form->control('conservation_id', ['options' => $conservations, 'empty' => true]);
            echo $this->Form->control('garage_id', ['options' => $garages, 'empty' => true]);
            echo $this->Form->control('outbuilding_id', ['options' => $outbuildings, 'empty' => true]);
            echo $this->Form->control('zone_id', ['options' => $zones, 'empty' => true]);
            echo $this->Form->control('seller_id', ['options' => $sellers]);
            echo $this->Form->control('condition_id', ['options' => $conditions, 'empty' => true]);
            echo $this->Form->control('house_type_id', ['options' => $houseTypes, 'empty' => true]);
            echo $this->Form->control('rooms');
            echo $this->Form->control('lat');
            echo $this->Form->control('lon');
            echo $this->Form->control('location_json');
            echo $this->Form->control('path_pic');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
