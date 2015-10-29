<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index extends Controller_Base{
    public function before(){
        parent::before();
        //виджеты
        $menu = Request::factory('widgets/menu')->execute();
        $topproducts = Request::factory('widgets/topproducts')->execute();
        
        //вывод в шаблон
        $this->template->block_left = array($menu);
        $this->template->block_right = array($topproducts);
    }
    public function action_index()
    {  
        $block_center = View::factory('v_index');
        //вывод шаблона
        $this->template->page_title = 'Главная';
        $this->template->block_center = array($block_center);
    }
}