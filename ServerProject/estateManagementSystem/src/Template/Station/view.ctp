<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Station $station
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Station'), ['action' => 'edit', $station->stationId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Station'), ['action' => 'delete', $station->stationId], ['confirm' => __('Are you sure you want to delete # {0}?', $station->stationId)]) ?> </li>
        <li><?= $this->Html->link(__('List Station'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Station'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="station view large-9 medium-8 columns content">
    <h3><?= h($station->stationId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('StationName') ?></th>
            <td><?= h($station->stationName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StationId') ?></th>
            <td><?= $this->Number->format($station->stationId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TimeDistance') ?></th>
            <td><?= $this->Number->format($station->timeDistance) ?></td>
        </tr>
    </table>
</div>
