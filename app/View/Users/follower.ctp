フォロワー一覧
<br>
<?php print(h($followCnt));?>人のフォロワーがいます


<?php foreach($follows as $follow): ?>

<br>
<div class="followerUser">
<div><?php //print(h($follow["Follow"]["username"]));   ?></div>
<div><?php print($this->Html->link(h($follow["Follow"]["username"]), '/users/user/'.h($follow["Follow"]["username"])));   ?></div>
</div>
<br>


<?php endforeach; ?>
