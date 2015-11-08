<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index_main extends Controller_Index{
    public function before(){
        parent::before();
        //виджеты
        $menu = Request::factory('widgets/menu')->execute();
        $topproducts = Request::factory('widgets/topproducts')->execute();
        $into = Request::factory('widgets/Into')->execute();
        $mybay = Request::factory('widgets/mybay')->execute();
        $news = Request::factory('widgets/news')->execute();
        
        //вывод в шаблон
        $this->template->block_headerRight = array($mybay);
        $this->template->block_left = array($menu);
        $this->template->block_right = array($into,$topproducts, $news);
    }
    public function action_index()
    {  
        I18n::lang('ru');
        $text = Model::factory('index')->showIndex();
        $user = Model::factory('index')->showUser();
        $block_center = View::factory('v_index',array('text' => $text,'username' => $user));
        $messag = Kohana::message('forms/contact', 'errors.user_not_found');
        //вывод шаблона
       // $this->template->page_title = 'Главная';
        $this->template->page_title = Kohana::$config->load('myconf.page_title');
        $this->template->block_center = array($block_center, $messag);
    }

}