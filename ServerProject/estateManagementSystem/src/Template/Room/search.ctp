<?php echo $this->Html->css('room'); ?>
<h2>不動産検索システム</h2>

<h3>絞り込み</h3>

<?=$this->Form->create('Room', ['url'=>['action'=>'result'], 'type'=>'post'])?>
<?=$this->Form->control('maxRent', ['label'=>'賃料の上限（万円）', 'type'=>'text'])?>
<?=$this->Form->control('minRent', ['label'=>'賃料の下限（万円）', 'type'=>'text'])?>
<p>部屋の大きさ<p>
<?=$this->Form->control('maxSize', ['label'=>'上限（㎡）', 'type'=>'text'])?>
<?=$this->Form->control('minSize', ['label'=>'下限（㎡）', 'type'=>'text'])?>
<p>ルームタイプ<p>
<?=$this->Form->control('roomType', ['type'=>'select', 'options'=>$roomTypeArray, 'multiple'=>'checkbox'])?>
<p>最寄り駅<p>
<?=$this->Form->control('station', ['type'=>'select', 'options'=>$stationArray, 'multiple'=>'checkbox'])?>
<p>並び替え<p>
<?=$this->Form->control('sortType', ['label'=>'並び替えの種類', 'type'=>'select', 'options'=>$sortType])?>
<?=$this->Form->control('sortOrder', ['label'=>'順序','type'=>'select', 'options'=>['昇順', '降順']])?>
<?=$this->Form->submit('探す')?>
<?=$this->Form->end()?>