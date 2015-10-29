<?php defined('SYSPATH') or die('No direct script access.');
//Каталог

class Controller_Catalog extends Controller_Base{
    public function before(){
        parent::before();
        //виджеты
        $menu = Request::factory('widgets/menu')->execute();
        
        //вывод в шаблон
        $this->template->block_left = array($menu);
    }
    public function action_index(){
        //получить список продуктов
        $products = Model::factory('catalog')->all_products();
        $content = View::factory('v_catalog', array('products' => $products));
        
        //вывод шаблона
        $this->template->page_title = 'Каталог';
        $this->template->block_center = array($content);
    }
}
