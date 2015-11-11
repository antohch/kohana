<p>
    <a href="/admin/editTovar/add">Добавить</a>
<table border="1">
    <tr>
        <td>Категория</td>
        <td>Название</td>
        <td>Цена</td>
        <td>Статус</td>
    </tr>
<?php foreach($product as $str):?>
    <tr>
        <td><?=$str->cat_id?></td>
        <td><?=$str->title?></td>
        <td><?=$str->cost?></td>
        <td><?=$str->status;?></td>
        <td><a href="/admin/edittovar/edit/<?=$str->id?>">Изменить</a></td>
        <td><a href="/admin/edittovar/del/<?=$str->id?>">Удалить</a></td>
    </tr>
<?php endforeach;?>
</table>
</ul>