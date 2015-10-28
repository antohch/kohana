<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index extends Controller_Template{
    public $template = 'v_base';
    public function before(){
        parent::before();
        $menu = Model::factory('Menu')->all_menu();
        $this->template->menu = $menu;
        $this->template->title = 'Интернет магазин';
        $best = Model::factory('Catalog')->bestProduct();
        $this->template->best = View::factory('v_best', array('best' => $best));
        $this->template->footer = '&copy; Все права защищены';
    }
    public function action_index()
    {
        $products = 'Добро пожаловать';
        $this->template->content = $products;
        
    }
    public function action_catalog()
    {
        $products = Model::factory('Catalog')->all_products();
        //$this->template->content = $products;
        $this->template->content = View::factory('v_catalog', array('products' => $products,));
    }
}