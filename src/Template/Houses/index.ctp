<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="row">
    <div class="large-12 columns info_content">
        <h4><?= __('Houses') ?></h4>
        <table>
            <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('area') ?></th>
                <th scope="col"><?= $this->Paginator->sort('construction_year') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($houses as $house): ?>
                <tr>
                    <td><?= $this->Number->format($house->price) ?></td>
                    <td><?= $this->Number->format($house->area) ?></td>
                    <td><?= $this->Number->format($house->construction_year) ?></td>
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