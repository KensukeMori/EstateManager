<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Roomtype $roomtype
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Roomtype'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="roomtype form large-9 medium-8 columns content">
    <?= $this->Form->create($roomtype) ?>
    <fieldset>
        <legend><?= __('Add Roomtype') ?></legend>
        <?php
            echo $this->Form->control('roomType');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
