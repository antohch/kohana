<?php defined('SYSPATH') or die('No direct script access.');

class Model_Menu extends Model{
    public function all_menu()
    {
        return array(
            'На главную' => 'http://kohana/',
            'Каталок' => 'http://kohana/index/catalog',
            'Лучшие товары' => '#',
        );
    }
}
