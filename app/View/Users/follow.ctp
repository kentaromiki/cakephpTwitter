フォロワー一覧
<br>
<?php print(h($followCnt));?>人のフォローしています


<?php foreach($follows as $follow): ?>


<br>
<div class="followUser">
<div><?php //print(h($follow["Follow"]["followuser"]));   ?></div>
<div><?php print($this->Html->link(h($follow["Follow"]["followuser"]), '/users/user/'.h($follow["Follow"]["followuser"])));   ?>
</div>
</div>
<br>


<?php endforeach; ?>
