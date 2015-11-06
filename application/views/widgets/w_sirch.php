<?php header('Content-type: text/html; charset=utf-8')?>
<form name="into" method="post" action="<?php foreach($sirch as $href){echo $href;}?>">
<p><b>Поиск</b>
<input type="text" name="name">
</p>
<p><input type="submit" value="Найти"></p>
</form>
