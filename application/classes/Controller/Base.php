<?php defined('SYSPATH') or die('No direct script access.');
//Общий базовый класс
class Controller_Base extends Controller_Template{
    public $template = 'v_base';
    public function before(){
        parent::before();
        $site_name = Kohana::$config->load('myconf.site_name');
        $site_description = Kohana::$config->load('myconf.site_description');
        $footer = Kohana::$config->load('myconf.footer');
        //Вывод в шаблон
        $this->template->site_name = $site_name;
        $this->template->site_description = $site_description;
        $this->template->page_title = null;
        $this->template->page_footer = $footer;
        
        //Подключение стилий и скриптов
        $this->template->styles = array('media/css/style.css');
        $this->template->scripts = array();
        
        //Подключаем блоки
        $this->template->block_left = null;
        $this->template->block_center = null;
        $this->template->block_right = null;
    }
}

