<?php
    /**
     * Created by PhpStorm.
     * User: rom
     * Date: 6/19/17
     * Time: 2:53 PM
     */ ?>
<div class="row">
    <div class="large-12 columns info_content">
        <div class="row">
            <div class="large-12 columns">
                <h4> My Polls</h4>
                <table class="hover">
                    <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('Polls.finished','Completed at')?></th>
                        <th class="actions"> <?= __('Action')?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($polls as $poll): ?>
                        <tr>
                            <td><?=$poll->finished?></td>
                            <td class="actions"><?= $this->Html->link(__('View'), ['controller' => 'polls','action' => 'result', $poll->id]) ?></td>
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
                    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} polls(s) out of {{count}} total')]) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

