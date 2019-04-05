<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Building $building
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Building'), ['action' => 'edit', $building->buildingId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Building'), ['action' => 'delete', $building->buildingId], ['confirm' => __('Are you sure you want to delete # {0}?', $building->buildingId)]) ?> </li>
        <li><?= $this->Html->link(__('List Building'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Building'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="building view large-9 medium-8 columns content">
    <h3><?= h($building->buildingId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('BuildingName') ?></th>
            <td><?= h($building->buildingName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('BuildingId') ?></th>
            <td><?= $this->Number->format($building->buildingId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NearbyStation') ?></th>
            <td><?= $this->Number->format($building->nearbyStation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Distance') ?></th>
            <td><?= $this->Number->format($building->distance) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('BuiltDay') ?></th>
            <td><?= h($building->builtDay) ?></td>
        </tr>
    </table>
</div>
