<a href="/admin/editNews/add"><p>Добавить новость</p><a/>

<ul>
<?php foreach($news as $str):?>
    <li>
        <?php echo $str['title'].' -> '."<a href='/admin/editNews/Edit/{$str['id']}'>Изменить</a>".' | '."<a href='/admin/editNews/delete/{$str['id']}'>Удалить</a>";?>
    </li>
    
<?php endforeach; ?>
</ul>


