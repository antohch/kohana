<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index extends Controller_Template{
    public $template = 'v_base';
    private $nameHeader = 'Интернет магазин';
    public function repidFunction(){
        $menu = Model::factory('Menu')->all_menu();
        $this->template->menu = $menu;
        $this->template->title = $this->nameHeader;
        $best = Model::factory('Catalog')->bestProduct();
        $this->template->best = $best;
        $this->template->footer = '&copy; Все права защищены';
    }
    public function action_index()
    {
        $this->repidFunction();
        $products = 'Добро пожаловать';
        $this->template->content = $products;
        
    }
    public function action_catalog()
    {
        $this->repidFunction();
        $products = Model::factory('Catalog')->all_products();
        $this->template->content = $products;
    }
}