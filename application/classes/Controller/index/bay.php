<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index_Bay extends Controller_Index{
    public function before(){
        parent::before();
        //получить виджет
        $menu = Request::factory('widgets/menu')->execute();
        $top = Request::factory('widgets/topproducts')->execute();
        

        //вывести в шаблон
        $this->template->block_left = array($menu);
        $this->template->block_right = array($top);
        
    }
    public function action_index(){
        //получить данные из модуля и обработать
        $bay = Model::factory('bay')->showBay();
        $content = View::factory('index/v_bay', array('bay' => $bay));
        $sirch = Request::factory('widgets/sirch')->execute();
        //вывести в шаблон
        $this->template->page_title = Kohana::$config->load('myconf.bay');
        $this->template->block_center = array($sirch, $content);
    }
}
