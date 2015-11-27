<!DOCTYPE html>
<html>
  <head>
    <?php echo $this->Html->charset(); ?>
    <title><?php echo $title_for_layout; ?> / ログインするだけのサイト</title>
    <?php echo $this->Html->css('style'); ?>
  </head>
  <body>
  <div id="container">
    <div id="header">
	<div id="header_logo">
	    <?php echo $this->Html->link('tubutter', '/users/index/'.$user['username']); ?>

        <!-- <h1>Tubutter</h1> -->
		
      </div>
      <div id="header_menu">
        <?php
          if(isset($user)):
            echo $this->Html->link('ホーム', '/users/index/'.$user['username']);
            echo $this->Html->link('友達を検索', '/users/userserch/'.$user['username']);
            echo $this->Html->link('ログアウト', '/users/logout');
          else:
            echo $this->Html->link('ホーム', '/users/index');
            echo $this->Html->link('ログイン', '/users/login');
            echo $this->Html->link('ユーザー登録', '/users/newguest');
          endif;
        ?>
      </div>
      <br>
      <div id="content">
        <?php echo $this->fetch('content'); ?>
      </div>
    </div>
  </body>
</html>