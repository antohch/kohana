<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index_News extends Controller_Index{
    public function before(){
        parent::before();
        
        $menu = Request::factory('widgets/menu')->execute();
        $bay = Request::factory('widgets/mybay')->execute();
        
        $this->template->block_left = array($menu);
        $this->template->block_headerRight = array($bay);
    }
    public function action_index(){
        $news = View::factory('index/news/v_news_index');
        
        $this->template->page_title = 'Новости';
        $this->template->block_center = array($news);
    }
}