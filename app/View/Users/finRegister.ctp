<?php print(h($user['username'])); ?>さんユーザー登録が完了しました。
<?php //print($this->Html->link('ログイン', '/users/index')); ?>
<?php

echo $this->Html->link(
    'ログイン',
    array('plugin' => 'users', 'controller' => 'user', 'action' =>$user['username'] )
);

?>