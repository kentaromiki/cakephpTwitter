
<?php echo  $this->Html->css('style',array('inline'=>false)); ?>



<div>新規登録</div>
<br>

<?php echo $this->Form->create('login');?>

<?php
echo $this->Form->input('userName');

echo $this->Form->input('password');

echo $this->Form->end("新規登録");



?>

