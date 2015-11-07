<?php defined('SYSPATH') or die('No direct script access.');
//виджет меню сайта лучшие товары
class Controller_Widgets_Topproducts extends Controller_Widgets{
    public $template = 'widgets/w_topproducts';
    
    public function action_index(){
        //получаем список категорий
        $products = Model::factory('catalog')->bestProduct();
        $this->template->products = $products;
    }
}

