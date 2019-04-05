<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Room $room
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Room'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="room form large-9 medium-8 columns content">
    <?= $this->Form->create($room) ?>
    <fieldset>
        <legend><?= __('Add Room') ?></legend>
        <?php
            echo $this->Form->control('roomName');
            echo $this->Form->control('building');
            echo $this->Form->control('roomSize');
            echo $this->Form->control('roomType');
            echo $this->Form->control('rent');
            echo $this->Form->control('resident');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
