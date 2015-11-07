<?php defined('SYSPATH') or die('No direct script access.');
//виджет меню сайта
class Controller_Widgets_Menu extends Controller_Widgets{
    public $template = 'widgets/w_menu'; //шаблон виджета
    public function action_index(){
        //получить список категорий 
        $categories = Model::factory('menu')->all_menu();
        $this->template->categories = $categories;
    }
}
