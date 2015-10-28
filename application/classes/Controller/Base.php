<?php defined('SYSPATH') or die('No direct script access.');
//Общий базовый класс
class Controller_Base extends Controller_Template{
    public $template = 'v_base';
    public function before(){
        parent::before();
        $site_name = 'ITBooks';
        $site_description = "Интернет-магазин книг по IT";
        
        //Вывод в шаблон
        $this->template->site_name = $site_name;
        $this->template->site_description = $site_description;
        $this->template->page_teitle = null;
        
        //Подключение стилий и скриптов
        $this->template->styles = array();
        $this->template->scripts = array();
        
        //Подключаем блоки
        $this->template->block_left = null;
        $this->template->block_center = null;
        $this->template->block_right = null;
    }

}

