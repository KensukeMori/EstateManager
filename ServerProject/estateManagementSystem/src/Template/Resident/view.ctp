<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Resident $resident
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Resident'), ['action' => 'edit', $resident->residentId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Resident'), ['action' => 'delete', $resident->residentId], ['confirm' => __('Are you sure you want to delete # {0}?', $resident->residentId)]) ?> </li>
        <li><?= $this->Html->link(__('List Resident'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Resident'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="resident view large-9 medium-8 columns content">
    <h3><?= h($resident->residentId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('ResidentName') ?></th>
            <td><?= h($resident->residentName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ResidentId') ?></th>
            <td><?= $this->Number->format($resident->residentId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Birthday') ?></th>
            <td><?= h($resident->birthday) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MovedDay') ?></th>
            <td><?= h($resident->movedDay) ?></td>
        </tr>
    </table>
</div>
