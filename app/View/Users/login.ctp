
<?php echo  $this->Html->css('style',array('inline'=>false)); ?>



<div>ログインしてください</div>
<br>

<div class='forms'>
<br>

<div class='error'><?php echo $this->Session->flash();?></div><br>


<?php echo $this->Form->create('User');?>

<?php ?>
ユーザーネーム<?php echo $this->Form->text('username');?>

<br><br>

パスワード&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;　<?php echo $this->Form->password('password'); ?>

<?php
echo $this->Form->end("ログイン");



?>
</div>

