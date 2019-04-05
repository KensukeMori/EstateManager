<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Building[]|\Cake\Collection\CollectionInterface $building
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Building'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="building index large-9 medium-8 columns content">
    <h3><?= __('Building') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('buildingId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('buildingName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nearbyStation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('distance') ?></th>
                <th scope="col"><?= $this->Paginator->sort('builtDay') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($building as $building): ?>
            <tr>
                <td><?= $this->Number->format($building->buildingId) ?></td>
                <td><?= h($building->buildingName) ?></td>
                <td><?= $this->Number->format($building->nearbyStation) ?></td>
                <td><?= $this->Number->format($building->distance) ?></td>
                <td><?= h($building->builtDay) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $building->buildingId]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $building->buildingId]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $building->buildingId], ['confirm' => __('Are you sure you want to delete # {0}?', $building->buildingId)]) ?>
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
