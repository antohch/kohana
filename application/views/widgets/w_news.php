<a href="/news"><h2>Новости</h2></a>
<ul>
<?php foreach($news as $k => $v): ?>

 
            <h3><?=$v['title'];?></h3>
            <li><?php echo $v['intro'].'<br>'.$v['date'];?></li>
            

<?php endforeach; ?>
</ul>
