<form action="/admin/editNews/edit/<?=$id?>" method="post">
    <p><input name='title' value='<?=$title?>'>Заголовок</p>
    <p><textarea cols='40' rows='4' name='intro' ><?=$intro?></textarea>Краткое описание</p>
    <p><textarea cols='40' rows='10' name='content' ><?=$content?></textarea>Текст новости</p>
    <p><input name='date' value="<?=$date?>">Дата создания</p>
    <input type='submit' value='Изменить'>
</form>
