<?php echo  $this->Html->css('style',array('inline'=>false)); ?>

<h1>tubutter</h1>

<div>なんでも話せる気軽な掲示板です</div>
<br>








<?php echo $this->Form->create('Datas');?>

<div><?php print(h($name)); ?>さん</div>



<div>コメント</div>
<?php
echo $this->Form->textarea('message');
//echo $this->Form->submit('送信',array('onclick'=>'windows.open()'));

echo $this->Form->end("送信");
?>


<div><?php print(h($name)); ?>さんの投稿一覧</div>



<?php foreach($datas as $data): ?>

<div class='listName'><?php print(h($data["Data"]["name"]));   ?></div>
<div class='listTime'><?php print(h($data["Data"]["created"]));?></div>
<div class='listMesse'><?php print( h($data["Data"]["message"]));?></div>
<br>

  <?php //print(h($data["Data"]["name"]) . ' (' . h($data["Data"]["created"]) . ')' . h($data["Data"]["message"]) ); ?>
<?php endforeach; ?>
