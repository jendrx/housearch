<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Region'), ['action' => 'edit', $region->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Region'), ['action' => 'delete', $region->id], ['confirm' => __('Are you sure you want to delete # {0}?', $region->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Regions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Region'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Regions'), ['controller' => 'Regions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Region'), ['controller' => 'Regions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Zones'), ['controller' => 'Zones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Zone'), ['controller' => 'Zones', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="regions view large-9 medium-8 columns content">
    <h3><?= h($region->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Geom') ?></th>
            <td><?= h($region->geom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Geom Json') ?></th>
            <td><?= h($region->geom_json) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parent Region') ?></th>
            <td><?= $region->has('parent_region') ? $this->Html->link($region->parent_region->name, ['controller' => 'Regions', 'action' => 'view', $region->parent_region->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($region->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Admin Level') ?></th>
            <td><?= $this->Number->format($region->admin_level) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lft') ?></th>
            <td><?= $this->Number->format($region->lft) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rght') ?></th>
            <td><?= $this->Number->format($region->rght) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Name') ?></h4>
        <?= $this->Text->autoParagraph(h($region->name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Parent Dicofre') ?></h4>
        <?= $this->Text->autoParagraph(h($region->parent_dicofre)); ?>
    </div>
    <div class="row">
        <h4><?= __('Dicofre') ?></h4>
        <?= $this->Text->autoParagraph(h($region->dicofre)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Regions') ?></h4>
        <?php if (!empty($region->child_regions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Geom') ?></th>
                <th scope="col"><?= __('Geom Json') ?></th>
                <th scope="col"><?= __('Admin Level') ?></th>
                <th scope="col"><?= __('Parent Id') ?></th>
                <th scope="col"><?= __('Parent Dicofre') ?></th>
                <th scope="col"><?= __('Lft') ?></th>
                <th scope="col"><?= __('Rght') ?></th>
                <th scope="col"><?= __('Dicofre') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($region->child_regions as $childRegions): ?>
            <tr>
                <td><?= h($childRegions->id) ?></td>
                <td><?= h($childRegions->name) ?></td>
                <td><?= h($childRegions->geom) ?></td>
                <td><?= h($childRegions->geom_json) ?></td>
                <td><?= h($childRegions->admin_level) ?></td>
                <td><?= h($childRegions->parent_id) ?></td>
                <td><?= h($childRegions->parent_dicofre) ?></td>
                <td><?= h($childRegions->lft) ?></td>
                <td><?= h($childRegions->rght) ?></td>
                <td><?= h($childRegions->dicofre) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Regions', 'action' => 'view', $childRegions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Regions', 'action' => 'edit', $childRegions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Regions', 'action' => 'delete', $childRegions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childRegions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Zones') ?></h4>
        <?php if (!empty($region->zones)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Geom') ?></th>
                <th scope="col"><?= __('Geom Json') ?></th>
                <th scope="col"><?= __('Region Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($region->zones as $zones): ?>
            <tr>
                <td><?= h($zones->id) ?></td>
                <td><?= h($zones->name) ?></td>
                <td><?= h($zones->geom) ?></td>
                <td><?= h($zones->geom_json) ?></td>
                <td><?= h($zones->region_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Zones', 'action' => 'view', $zones->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Zones', 'action' => 'edit', $zones->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Zones', 'action' => 'delete', $zones->id], ['confirm' => __('Are you sure you want to delete # {0}?', $zones->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
