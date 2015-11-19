<?php if($errors){foreach($errors as $ms){echo $ms;};}?>
<form action="/admin/editTovar/add" method="post" enctype="multipart/form-data">
    <p><input name='cat_id'>Категория</p>
    <p><textarea cols='40' rows='4' name='title'></textarea>Заголовок товара</p>
    <p><textarea cols='40' rows='10' name='description'></textarea>Описание товара</p>
    <p><input name='cost'>Цена</p>
    <p><input name='status'>Статус</p>
    <br>
    <?=Form::label('image','Загрузить изображения')?>:<br/><br/>
    <?=Form::file('image[]',array('id' => 'multi'))?>
    <br>
    <br> 
    <br>
    <br> 
    <input type='submit' value='добавить'>
</form>

