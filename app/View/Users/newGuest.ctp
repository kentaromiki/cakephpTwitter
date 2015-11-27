
<?php echo  $this->Html->css('style',array('inline'=>false)); ?>



<div>新規登録</div>
<br>

<div class='forms'>


<?php

if (isset($validationErrors) && is_array($validationErrors)) {
    foreach ($validationErrors as $key => $values) {
        foreach ($values as $value) {
            echo '<div class="error">'.$value.'</div>';
        }
        // echo $this->Form->error('User.'.$key);
    }
}

?>
<br>

<?php echo $this->Form->create('login');?>


名前&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->Form->text('name');?><br><br>

ユーザーネーム<?php echo $this->Form->text('username');?><br><br>

パスワード<?php echo $this->Form->password('password');?><br><br>
パスワード（確認）<?php echo $this->Form->password('password_confirm');?><br><br>

メールアドレス<?php echo $this->Form->email('mailaddress');?><br><br>


公開する<?php echo $this->Form->checkbox('public'); ?><br><br>


<?php

echo $this->Form->end("新規登録");



?>
</div>


<?php //echo $this->Session->flash();?>

<div>
    <?php //echo $message; ?>
</div>

