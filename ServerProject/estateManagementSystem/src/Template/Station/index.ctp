<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Station[]|\Cake\Collection\CollectionInterface $station
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Station'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="station index large-9 medium-8 columns content">
    <h3><?= __('Station') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('stationId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stationName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('timeDistance') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($station as $station): ?>
            <tr>
                <td><?= $this->Number->format($station->stationId) ?></td>
                <td><?= h($station->stationName) ?></td>
                <td><?= $this->Number->format($station->timeDistance) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $station->stationId]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $station->stationId]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $station->stationId], ['confirm' => __('Are you sure you want to delete # {0}?', $station->stationId)]) ?>
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
