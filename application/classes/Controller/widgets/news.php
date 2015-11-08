<?php defined('SYSPATH') or die('No direct script access.');
//виджет меню сайта
class Controller_Widgets_News extends Controller_Widgets{
    public $template = 'widgets/w_news'; //шаблон виджета
    public function action_index(){
        //получить список категорий
        $news = Model::factory('news')->allNews();
        $this->template->news = $news;
    }
}
