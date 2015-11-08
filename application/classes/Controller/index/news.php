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
        
        $text = Model::factory('news')->newsPage();
        $news = View::factory('index/news/v_news_index', array('news' => $text));
        
        $this->template->page_title = 'Новости';
        $this->template->block_center = array($news);
    }
    public function action_content(){
        $id = $this->request->param('id');
        $text = Model::factory('news')->newsOne($id);
        $idNext = Model::factory('news')->newsNext($id);
        $idBack = Model::factory('news')->newsBack($id);
        $news = View::factory('index/news/v_news_one', array('news' => $text, 'idNext' => $idNext, 'idBack' => $idBack));
        
        $this->template->page_title = 'Новости';
        $this->template->block_center = array($news);
    }
}