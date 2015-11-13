<?php //var_dump($product);?>
<form action="/admin/editTovar/edit/<?=$product->id;?>" method="post">
    <p><input name='cat_id' value="<?php
        $cat = $product->categori->find_all();
        if (is_object($cat)){
            $catStr = null;
            foreach($cat as $id){
                $catStr .= $id->id.', ';    
            }
            echo substr($catStr, 0, -2);
        }
    ?>">Категория</p>
    <p><textarea cols='40' rows='4' name='title'><?=$product->title;?></textarea>Заголовок товара</p>
    <p><textarea cols='40' rows='10' name='description'><?=$product->description?></textarea>Описание товара</p>
    <p><input name='cost' value="<?=$product->cost?>">Цена</p>
    <p><input name='status' value="<?=$product->status?>">Статус</p>
    <input type='submit' value='Изменить'>
</form>
