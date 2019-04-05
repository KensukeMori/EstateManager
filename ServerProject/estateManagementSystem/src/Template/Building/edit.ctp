<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Building $building
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $building->buildingId],
                ['confirm' => __('Are you sure you want to delete # {0}?', $building->buildingId)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Building'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="building form large-9 medium-8 columns content">
    <?= $this->Form->create($building) ?>
    <fieldset>
        <legend><?= __('Edit Building') ?></legend>
        <?php
            echo $this->Form->control('buildingName');
            echo $this->Form->control('nearbyStation');
            echo $this->Form->control('distance');
            echo $this->Form->control('builtDay');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
