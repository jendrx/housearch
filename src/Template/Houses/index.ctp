<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="row">
    <div class="large-9 medium-8 columns info_content">
        <h3><?= __('Houses') ?></h3>
        <table cellpadding="0" cellspacing="0">
            <thead>
            <tr>
                <!--<th scope="col"><?= $this->Paginator->sort('id') ?></th>-->
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('area') ?></th>
                <th scope="col"><?= $this->Paginator->sort('construction_year') ?></th>
                <!--<th scope="col"><?= $this->Paginator->sort('location') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('energy_certification_year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('outbuilding_area') ?></th>
                <th scope="col"><?= $this->Paginator->sort('energy_certification_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('conservation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('garage_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('outbuilding_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zone_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('seller_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('condition_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('house_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rooms') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lat') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lon') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location_json') ?></th>-->
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($houses as $house): ?>
                <tr>
                    <!--<td><?= $this->Number->format($house->id) ?></td>-->
                    <td><?= $this->Number->format($house->price) ?></td>
                    <td><?= $this->Number->format($house->area) ?></td>
                    <td><?= $this->Number->format($house->construction_year) ?></td>
                    <!--<td><?= h($house->location) ?></td>
                    <td><?= h($house->created) ?></td>
                    <td><?= $this->Number->format($house->energy_certification_year) ?></td>
                    <td><?= $this->Number->format($house->outbuilding_area) ?></td>
                    <td><?= $house->has('energy_certification') ? $this->Html->link($house->energy_certification->id, ['controller' => 'EnergyCertifications', 'action' => 'view', $house->energy_certification->id]) : '' ?></td>
                    <td><?= $house->has('conservation') ? $this->Html->link($house->conservation->id, ['controller' => 'Conservations', 'action' => 'view', $house->conservation->id]) : '' ?></td>
                    <td><?= $house->has('garage') ? $this->Html->link($house->garage->id, ['controller' => 'Garages', 'action' => 'view', $house->garage->id]) : '' ?></td>
                    <td><?= $house->has('outbuilding') ? $this->Html->link($house->outbuilding->id, ['controller' => 'Outbuildings', 'action' => 'view', $house->outbuilding->id]) : '' ?></td>
                    <td><?= $house->has('zone') ? $this->Html->link($house->zone->id, ['controller' => 'Zones', 'action' => 'view', $house->zone->id]) : '' ?></td>
                    <td><?= $house->has('seller') ? $this->Html->link($house->seller->id, ['controller' => 'Sellers', 'action' => 'view', $house->seller->id]) : '' ?></td>
                    <td><?= $house->has('condition') ? $this->Html->link($house->condition->id, ['controller' => 'Conditions', 'action' => 'view', $house->condition->id]) : '' ?></td>
                    <td><?= $house->has('house_type') ? $this->Html->link($house->house_type->id, ['controller' => 'HouseTypes', 'action' => 'view', $house->house_type->id]) : '' ?></td>
                    <td><?= $this->Number->format($house->rooms) ?></td>
                    <td><?= $this->Number->format($house->lat) ?></td>
                    <td><?= $this->Number->format($house->lon) ?></td>
                    <td><?= h($house->location_json) ?></td>-->
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $house->id]) ?>
                        <!--<?= $this->Html->link(__('Edit'), ['action' => 'edit', $house->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $house->id], ['confirm' => __('Are you sure you want to delete # {0}?', $house->id)]) ?>-->
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
        </div>
    </div>
</div>