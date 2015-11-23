<p>
    <a href="/admin/editTovar/add">Добавить</a>
<table border="1">
    <tr>
        <td>Категория</td>
        <td>Комментарии</td>
        <td>Название</td>
        <td>Цена</td>
        <td>Статус</td>
    </tr>
<?php foreach($product as $str):?>
    <tr>
        <td><?php 
        $catstr = null; 
        $cat = $str->categori->find_all(); 
        foreach($cat as $v){
            $catstr .= $v->title.', ';
            
        }
        if ($catstr){
            $tochko = '.';
        }
        else{
            $tochko = '';
        }
        echo substr($catstr, 0, -2).$tochko;
        ?></td>
        <td><?php $commet = array_reverse($str->comments->find_all()->as_array()); foreach($commet as $com){echo $com->text.", ";}?></td>
        <td><?=$str->title?></td>
        <td><?=$str->cost?></td>
        <td><?=$str->status;?></td>
        <td><a href="/admin/edittovar/edit/<?=$str->id?>">Изменить</a></td>
        <td><a href="/admin/edittovar/delete/<?=$str->id?>">Удалить</a></td>
    </tr>
<?php endforeach;?>
</table>
</ul>
<br>
<?php
    
    foreach($catToPro as $catStr){
        $strProToCat = null;
        echo $catStr->title.': ';
        $proToCat = $catStr->product->find_all();
        foreach($proToCat as $pro){
            $strProToCat .= ' '.$pro->title.', ';
        }
        echo substr($strProToCat, 0, -2);
        echo '<br>';
    }
    
?>
<?=$pagination?>