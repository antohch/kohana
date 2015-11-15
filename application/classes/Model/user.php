<?php defined('SYSPATH') or die('No direct script access.');

class Model_User extends Model_Auth_User{
    public function labels(){
        return array(
            'password' => 'Пароль',
            'username' => 'Логин',
            'email' => 'E-mail',
            'password_confirm' => 'Повторите пароль',
            'first_name' => 'ФИО',
            '_external' => array('password' => 'пароль'),

 
        );
    }
}
