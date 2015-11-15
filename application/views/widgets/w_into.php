<?php header('Content-type: text/html; charset=utf-8')?>
<form name="into" method="post" action="auto/login" style="display: <?php echo $display['display_in'];?>; ">
<h2>Вход</h2>
<p><b>Ваше имя:</b>
<input type="text" name="username">
</p>
<p><b>Пароль:</b>
<input type="password" name="password">
</p>
<input type="checkbox" name="remeber" value="1">Запомнить</p>
<p><input type="submit" value="Войти"></p>
<a href="/reg">Регистрация</a>
</form>

<form name="into" method="post" action="auto/exit" style="display: <?php echo $display['display_out'];?>; ">
<p><input type="submit" value="Выйти"></p>
<p><a href="/auto/update">Изменить учетку</a></p>
</form>

