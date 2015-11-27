ログイン済み：<?php print(h($user['username'])); ?>さん<br />
<?php //print(h($user['username'])); ?>

<?php print($this->Html->link('ログアウト', '/users/logout')); ?>
<?php print($this->Html->link('フォロワー一覧', '/users/follower/'.$user['username'])); ?>
<?php print($this->Html->link('フォロー一覧', '/users/follow/'.$user['username'])); ?>

<?php print($this->Html->link('ユーザー検索', '/users/userserch/'.$user['username'])); ?>
<?php print($this->Html->link('つぶやき一覧', '/users/user/'.$user['username']));   ?>

<?php

echo $this->Html->link(
    'New todo',
    array('plugin' => 'users', 'controller' => 'mypage', 'action' =>$user['username'] )
);

?>

<div id="userStatas">
<?php print(h($user['name'])); ?>
<?php print(h($user['username'])); ?>

<div>つぶやき数</div>
<?php print(h($tweetCnt)); ?>
<div>フォロワー数</div>
<?php print(h($followerCnt)); ?>
<div>フォロー数</div>
<?php print(h($followCnt)); ?>
</div>



<?php $aaa ?>


<?php foreach($datas as $data): ?>

<?php foreach($follows as $follow): ?>


<?php $isFollow='false';         ?>

<div class='listName'><?php //print(h($follow["Follow"]["followuser"]));   ?></div>
<?php 
if(h($data["Data"]["name"])==h($follow["Follow"]["followuser"])){

$isFollow='true';

}
?>
<?php $aaa +=1; ?>
<?php //print('ユーザー'.h($data["Data"]["name"]).'コメント'.h($data["Data"]["message"]).'フォローの名前'.h($follow["Follow"]["followuser"]).'<br>'); ?>


<?php if($isFollow=='true'){ ?>

<div class='list'>
<br>
<div class='listName'><?php print(h($data["Data"]["name"]));   ?></div>
<div class='listTime'><?php print(h($data["Data"]["created"]));?></div>
<div class='listMesse'><?php print( h($data["Data"]["message"]));?></div>
<br>
</div>
<br>
<?php } ?>

<?php endforeach; ?>



<?php //print(h($data["Data"]["name"]) . ' (' . h($data["Data"]["created"]) . ')' . h($data["Data"]["message"]) ); ?>
<?php endforeach; ?>
<?php print($aaa); ?>
