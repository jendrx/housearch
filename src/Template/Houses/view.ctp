<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit House'), ['action' => 'edit', $house->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete House'), ['action' => 'delete', $house->id], ['confirm' => __('Are you sure you want to delete # {0}?', $house->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Houses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New House'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Energy Certifications'), ['controller' => 'EnergyCertifications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Energy Certification'), ['controller' => 'EnergyCertifications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Conservations'), ['controller' => 'Conservations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Conservation'), ['controller' => 'Conservations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Garages'), ['controller' => 'Garages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Garage'), ['controller' => 'Garages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Outbuildings'), ['controller' => 'Outbuildings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Outbuilding'), ['controller' => 'Outbuildings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Zones'), ['controller' => 'Zones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Zone'), ['controller' => 'Zones', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sellers'), ['controller' => 'Sellers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Seller'), ['controller' => 'Sellers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Conditions'), ['controller' => 'Conditions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Condition'), ['controller' => 'Conditions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List House Types'), ['controller' => 'HouseTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New House Type'), ['controller' => 'HouseTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="houses view large-9 medium-8 columns content">
    <h3><?= h($house->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= h($house->location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Energy Certification') ?></th>
            <td><?= $house->has('energy_certification') ? $this->Html->link($house->energy_certification->id, ['controller' => 'EnergyCertifications', 'action' => 'view', $house->energy_certification->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Conservation') ?></th>
            <td><?= $house->has('conservation') ? $this->Html->link($house->conservation->id, ['controller' => 'Conservations', 'action' => 'view', $house->conservation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Garage') ?></th>
            <td><?= $house->has('garage') ? $this->Html->link($house->garage->id, ['controller' => 'Garages', 'action' => 'view', $house->garage->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Outbuilding') ?></th>
            <td><?= $house->has('outbuilding') ? $this->Html->link($house->outbuilding->id, ['controller' => 'Outbuildings', 'action' => 'view', $house->outbuilding->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Zone') ?></th>
            <td><?= $house->has('zone') ? $this->Html->link($house->zone->id, ['controller' => 'Zones', 'action' => 'view', $house->zone->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Seller') ?></th>
            <td><?= $house->has('seller') ? $this->Html->link($house->seller->id, ['controller' => 'Sellers', 'action' => 'view', $house->seller->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Condition') ?></th>
            <td><?= $house->has('condition') ? $this->Html->link($house->condition->id, ['controller' => 'Conditions', 'action' => 'view', $house->condition->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('House Type') ?></th>
            <td><?= $house->has('house_type') ? $this->Html->link($house->house_type->id, ['controller' => 'HouseTypes', 'action' => 'view', $house->house_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location Json') ?></th>
            <td><?= h($house->location_json) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($house->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($house->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Area') ?></th>
            <td><?= $this->Number->format($house->area) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Construction Year') ?></th>
            <td><?= $this->Number->format($house->construction_year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Energy Certification Year') ?></th>
            <td><?= $this->Number->format($house->energy_certification_year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Outbuilding Area') ?></th>
            <td><?= $this->Number->format($house->outbuilding_area) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rooms') ?></th>
            <td><?= $this->Number->format($house->rooms) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lat') ?></th>
            <td><?= $this->Number->format($house->lat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lon') ?></th>
            <td><?= $this->Number->format($house->lon) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($house->created) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Url Ad') ?></h4>
        <?= $this->Text->autoParagraph(h($house->url_ad)); ?>
    </div>
    <div class="row">
        <h4><?= __('Path Pic') ?></h4>
        <?= $this->Text->autoParagraph(h($house->path_pic)); ?>
    </div>
</div>
