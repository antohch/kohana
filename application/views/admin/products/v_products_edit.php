<?php //var_dump($product);?>
<form action="/admin/editTovar/edit/<?=$product->id;?>" method="post" enctype="multipart/form-data">
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
    <br>
    <?=Form::label('image','Загрузить изображения')?>:<br/><br/>
    <?=Form::file('image[]',array('id' => 'multi'))?>
    <br>
    <br> 
    <br>
    <br> 
    <input type='submit' value='Изменить'>
</form>

   
            <?=Form::label('images', 'Изображения')?>: <br/><br/>
            <?if (!empty($data['images'])):?>

            <table width="100%" cellspacing="20">
                <tr>
                <?foreach($data['images'] as $i =>  $image):?>
                    <td align="center"><?=html::anchor('media/uploads/'. $image->name, html::image('media/uploads/small_' . $image->name), array('target' => '_blank'))?>
                        <br><?=html::anchor('admin/edittovar/delimg/' . $image->id, 'Удалить')?>
                    </td>
                    <?if ($i % 2):?>
                        </tr><tr>
                    <?endif?>
                <?endforeach?>
                </tr>
            </table>

            <?else:?>
            <div class="empty">Нет изображений</div>
            <?endif?>

<?=Form::close()?>
