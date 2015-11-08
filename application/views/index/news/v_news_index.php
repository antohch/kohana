<?php foreach($news as $k => $v):?>
<hr>
<h3><a href="/news/content/<?=$v['id']?>"><?=$v['title']?></a></h3>
<p><?=$v['intro']?></p>
<p><?=$v['date']?></p>
<?php endforeach; ?>