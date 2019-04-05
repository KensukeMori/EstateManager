<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Room $room
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Room'), ['action' => 'edit', $room->roomId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Room'), ['action' => 'delete', $room->roomId], ['confirm' => __('Are you sure you want to delete # {0}?', $room->roomId)]) ?> </li>
        <li><?= $this->Html->link(__('List Room'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Room'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="room view large-9 medium-8 columns content">
    <h3><?= h($room->roomId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('RoomType') ?></th>
            <td><?= h($room->roomType) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('RoomId') ?></th>
            <td><?= $this->Number->format($room->roomId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('RoomName') ?></th>
            <td><?= $this->Number->format($room->roomName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Building') ?></th>
            <td><?= $this->Number->format($room->building) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('RoomSize') ?></th>
            <td><?= $this->Number->format($room->roomSize) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rent') ?></th>
            <td><?= $this->Number->format($room->rent) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Resident') ?></th>
            <td><?= $this->Number->format($room->resident) ?></td>
        </tr>
    </table>
</div>
