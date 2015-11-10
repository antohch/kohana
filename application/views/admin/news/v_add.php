<?php if($error):?>
<?php foreach($error as $e){echo $e;}?>
<?php endif;?>
<form action="/admin/editNews/add" method="post">
    <p><input name='title'>Заголовок</p>
    <p><textarea cols='40' rows='4' name='intro'></textarea>Краткое описание</p>
    <p><textarea cols='40' rows='10' name='content'></textarea>Текст новости</p>
    <p><input name='d'>День <input name='m'>Месяц <input name='y'>Года Дата создания</p>
    <input type='submit' text='добавить'>
</form>
