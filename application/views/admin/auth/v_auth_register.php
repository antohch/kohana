<p>Форма регистрации админа</p>
<?php 
I18n::lang('ru');
if($errors){
    foreach($errors as $k => $ms){
        if (is_array($ms)){
            foreach($ms as $km => $text){
                echo __($text).'<br>';
            }
       }else{
            echo __($ms).'<br>';
        }
    }

        
    }
    ?>
<form action="/admin/auth/reg/" method="post">
    <p><input name='username'>Логин</p>
    <p><input name='first_name'>Имя</p>
    <p><input name='email'>Почта</p>
    <p><input name='password'>Пароль</p>
    <p><input name='password_confirm'>Повторите пароль</p>
    <input type='submit' value='Зарегистрироваться'>
</form>