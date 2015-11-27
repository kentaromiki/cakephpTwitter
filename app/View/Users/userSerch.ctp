ユーザー検索

<?php echo $this->Form->create('serchUser');?>

<?php
echo $this->Form->input('username');

echo $this->Form->end("ユーザー検索");


?>
<?php echo $this->Form->create('hoge');?>

<?php echo $this->Form->submit('saa', array('name' =>'sam'));?>
<?php echo $this->Form->end(); ?>


<?php foreach($findUser as $users): ?>

<div class="serchUser">

<?php $username=h($users["User"]["username"]); ?>


<?php print($this->Html->link($username, '/users/user/'.$username));   ?>

<?php $isUser=false; ?>

<?php foreach($userdata as $userss): ?>

<?php $username2=h($userss["Follow"]["followuser"]); ?>

<?php  
if($username2==$username){ 
$isUser=true;

}
?>
<?php //print($username2); ?>
<?php //break 0; ?>


<?php endforeach; ?>






<?php
if($isUser==false){

//}else{  ?>
<?php echo $this->Form->create('hoge');?>
<?php echo $this->Form->submit($username, array('name' => 'but'));?>
<?php echo $this->Form->end(); ?>
<?php //break; ?>

<?php } ?>

<?php if($isUser==true){

echo 'フォローしてるよ<br>';
?>
<br>

<?php
} ?>

</div>
<br>

<?php endforeach; ?>
<?php echo $this->Session->flash();?>

<?php //print($buttonname); ?>

<div>
    <?php //echo $message; ?>
</div>