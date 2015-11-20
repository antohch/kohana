<?php defined('SYSPATH') or die('No direct script access.');
//Каталог

class Controller_Index_Catalog extends Controller_Index{
    public function before(){
        parent::before();
        //виджеты
        $menu = Request::factory('widgets/menu')->execute();
        $mybay = Request::factory('widgets/mybay')->execute();
        
        //вывод в шаблон
        $this->template->block_headerRight = array($mybay);
        $this->template->block_left = array($menu);
    }
    public function action_index(){
        //получить список продуктов
        $products = ORM::factory('product')->find_all()->as_array();
        $content = View::factory('v_catalog', array(
                'products' => $products,
                ));
        
        //вывод шаблона
        $this->template->page_title = 'Каталог';
        $this->template->block_center = array($content);
    }
    public function action_index2(){
        
    }
}
