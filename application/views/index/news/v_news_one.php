<?php foreach($news as $k => $v):?>
<hr>
<h3><?=$v['title']?></h3>
<p><?=$v['content']?></p>
<p><?=$v['date']?></p>
<?php endforeach; ?>
<?php if($idNext !== NULL):?>
<a href="/news/content/<?php echo $idNext; ?>">Вперед</a>
<?php endif;?>
<?php if($idBack !== NULL and $idNext !== NULL) echo ' | ';?>
<?php if($idBack !== NULL):?>
<a href="/news/content/<?php echo $idBack; ?>">Назад</a>
<?php endif;?>