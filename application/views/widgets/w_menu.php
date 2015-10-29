<h2>Каталог</h2>
<ul>
<?php foreach($categories as $name => $href): ?>
    <li><a href="<?=$href?>" class="menu_link"><?=$name?></a></li>
<?php endforeach; ?>
</ul>
