<p>Форма входа</p>
<?php if($error){
    foreach($error as $k => $ms){
        if (is_array($ms)){
            foreach($ms as $km => $text){
                echo $k.' => '.$km.' => '.$text.'<br>';
            }
        }else{
            echo $ms.'<br>';
        }
    }
      //  foreach($ms as $text){
          //  echo $text.'<br>';};}
    }?>
<form action="/auto/login/" method="post">
    <p><input name='username'>Логин</p>
    <p><input name='password'>Пароль</p>
    <input type="checkbox" name="remeber" value="1">Запомнить</p>
    <input type='submit' value='Войти'>
</form>