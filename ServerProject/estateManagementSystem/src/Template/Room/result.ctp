<?php echo $this->Html->css('room'); ?>

<h3>検索結果</h3>
<p><?=$sortType?>について<?=$sortOrder?>で表示しています</p>

<?=$this->Form->create('Room', ['url'=>['action'=>'search'], 'type'=>'post'])?>
<?=$this->Form->submit('戻る')?>
<?=$this->Form->end()?>

<?php if($buildingArray != null):?>
<?php foreach($buildingArray as $building):?>
    <h4>物件名：<?=$building['building']['buildingName']?></h4>
    <p>JR<?=$building['building']['nearbyStation']?>駅まで<?=$building['building']['distance']?>ｍ</p>
    <?php foreach($building['rooms'] as $room):?>
        <h5>部屋:<?=$room['roomName']?></h5>
        <p>賃料:<?=$room['rent']?>万円</p>
        <p><?=$room['roomType']?> / <?=$room['roomSize']?>㎡</p>
    <?php endforeach?>
<?php endforeach ?>
<?php else:?>
<h4>当てはまる物件はありません</h4>
<?php endif?>

<?=$this->Form->create('Room', ['url'=>['action'=>'search'], 'type'=>'post'])?>
<?=$this->Form->submit('戻る')?>
<?=$this->Form->end()?>

