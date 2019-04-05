<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Resident $resident
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $resident->residentId],
                ['confirm' => __('Are you sure you want to delete # {0}?', $resident->residentId)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Resident'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="resident form large-9 medium-8 columns content">
    <?= $this->Form->create($resident) ?>
    <fieldset>
        <legend><?= __('Edit Resident') ?></legend>
        <?php
            echo $this->Form->control('residentName');
            echo $this->Form->control('birthday');
            echo $this->Form->control('movedDay');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
