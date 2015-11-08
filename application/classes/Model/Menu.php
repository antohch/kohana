<?php defined('SYSPATH') or die('No direct script access.');

class Model_Menu extends Model{
    public function all_menu()
    {
        return array(
            'На главную' => '/index',
            'Каталок' => '/catalog',
            'Лучшие товары' => '/top',
            'Корзина' => '/bay',
            'Новости' => '/news',
        );
    }
}
