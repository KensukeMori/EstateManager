<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Roomtype $roomtype
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Roomtype'), ['action' => 'edit', $roomtype->roomTypeId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Roomtype'), ['action' => 'delete', $roomtype->roomTypeId], ['confirm' => __('Are you sure you want to delete # {0}?', $roomtype->roomTypeId)]) ?> </li>
        <li><?= $this->Html->link(__('List Roomtype'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Roomtype'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="roomtype view large-9 medium-8 columns content">
    <h3><?= h($roomtype->roomTypeId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('RoomType') ?></th>
            <td><?= h($roomtype->roomType) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('RoomTypeId') ?></th>
            <td><?= $this->Number->format($roomtype->roomTypeId) ?></td>
        </tr>
    </table>
</div>
