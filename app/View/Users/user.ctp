<?php echo  $this->Html->css('style',array('inline'=>false)); ?>



<div></div>
<br>



<?php echo $this->Form->create('Datas');?>

<div><?php print(h($name)); ?>さん</div>



<div>コメント</div>
<?php
echo $this->Form->textarea('message',array("cols"=>40, "rows"=>5, "placeholder"=>"今、何してる"));
//echo $this->Form->submit('送信',array('onclick'=>'windows.open()'));

echo $this->Form->end("送信");
?>


<div id="userStatas">
<div>つぶやき数</div>
<?php print(h($tweetCnt)); ?>
<div>フォロワー数</div>
<?php print(h($followerCnt)); ?>
<div>フォロー数</div>
<?php print(h($followCnt)); ?>
</div>
<br>
<div><?php print(h($name)); ?>さんの投稿一覧</div>

<?php foreach($datas as $data): ?>

<div class='list'>
<br>
<div class='listName'><?php print(h($data["Data"]["name"]));   ?></div>
<div class='listTime'><?php print(h($data["Data"]["created"]));?></div>
<div class='listMesse'><?php print( h($data["Data"]["message"]));?></div>
<br>
</div>
<br>

<?php //print(h($data["Data"]["name"]) . ' (' . h($data["Data"]["created"]) . ')' . h($data["Data"]["message"]) ); ?>
<?php endforeach; ?>

<?php 

echo $this->Paginator->prev('< 前へ', array(), null, array('class' => 'prev disabled'));
echo $this->Paginator->numbers(array('separator' => ''));
echo $this->Paginator->next('次へ >', array(), null, array('class' => 'next disabled'));
 


?>
<?php
 echo $this->Paginator->counter(array('format' => '全%count%件' ));
 echo $this->Paginator->counter(array('format' => '{:page}/{:pages}ページを表示'));
?>