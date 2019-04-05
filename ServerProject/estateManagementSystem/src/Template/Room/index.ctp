<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Room[]|\Cake\Collection\CollectionInterface $room
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Room'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="room index large-9 medium-8 columns content">
    <h3><?= __('Room') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('roomId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('roomName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('building') ?></th>
                <th scope="col"><?= $this->Paginator->sort('roomSize') ?></th>
                <th scope="col"><?= $this->Paginator->sort('roomType') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rent') ?></th>
                <th scope="col"><?= $this->Paginator->sort('resident') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($room as $room): ?>
            <tr>
                <td><?= $this->Number->format($room->roomId) ?></td>
                <td><?= $this->Number->format($room->roomName) ?></td>
                <td><?= $this->Number->format($room->building) ?></td>
                <td><?= $this->Number->format($room->roomSize) ?></td>
                <td><?= h($room->roomType) ?></td>
                <td><?= $this->Number->format($room->rent) ?></td>
                <td><?= $this->Number->format($room->resident) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $room->roomId]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $room->roomId]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $room->roomId], ['confirm' => __('Are you sure you want to delete # {0}?', $room->roomId)]) ?>
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
