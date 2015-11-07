<?php header('Content-type: text/html; charset=utf-8')?>
<form name="into" method="post" action="<?php foreach($into as $href){echo $href;}?>">
<h2>Вход</h2>
<p><b>Ваше имя:</b>
<input type="text" name="name">
</p>
<p><b>Пароль:</b>
<input type="password" name="password">
</p>
<p><input type="submit" value="Войти"></p>
<a href="/reg">Регистрация</a>
</form>
