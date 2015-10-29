<?php defined('SYSPATH') or die('No direct script access.');

class Model_Menu extends Model{
    public function all_menu()
    {
        return array(
            'На главную' => 'http://kohana/index',
            'Каталок' => 'http://kohana/catalog',
            'Лучшие товары' => '#',
        );
    }
}
