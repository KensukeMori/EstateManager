<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Station $station
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $station->stationId],
                ['confirm' => __('Are you sure you want to delete # {0}?', $station->stationId)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Station'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="station form large-9 medium-8 columns content">
    <?= $this->Form->create($station) ?>
    <fieldset>
        <legend><?= __('Edit Station') ?></legend>
        <?php
            echo $this->Form->control('stationName');
            echo $this->Form->control('timeDistance');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
