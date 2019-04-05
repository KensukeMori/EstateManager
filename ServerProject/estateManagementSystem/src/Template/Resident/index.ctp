<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Resident[]|\Cake\Collection\CollectionInterface $resident
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Resident'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="resident index large-9 medium-8 columns content">
    <h3><?= __('Resident') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('residentId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('residentName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('birthday') ?></th>
                <th scope="col"><?= $this->Paginator->sort('movedDay') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resident as $resident): ?>
            <tr>
                <td><?= $this->Number->format($resident->residentId) ?></td>
                <td><?= h($resident->residentName) ?></td>
                <td><?= h($resident->birthday) ?></td>
                <td><?= h($resident->movedDay) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $resident->residentId]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $resident->residentId]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $resident->residentId], ['confirm' => __('Are you sure you want to delete # {0}?', $resident->residentId)]) ?>
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
