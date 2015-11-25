<?php defined('SYSPATH') or die('No direct script access.');
//Общий базовый класс
class Controller_Base extends Controller_Template{
    
    public $user;
    public $auth;
    public $cache;
    
    public $template = 'v_base';
    public function before(){
        parent::before();
        
        I18n::lang('ru');
        $this->cache = Cache::instance('file');
        $this->auth = Auth::instance();
        $this->user = $this->auth->get_user();
        
        $site_name = Kohana::$config->load('myconf.site_name');
        
        $site_description = Kohana::$config->load('myconf.site_description');
        $footer = Kohana::$config->load('myconf.footer');
        //Вывод в шаблон
        $this->template->site_name = $site_name;
        $this->template->site_description = $site_description;
        $this->template->page_title = null;
        $this->template->page_footer = $footer;
        
        //Подключение стилий и скриптов
        $this->template->styles = array('');
        $this->template->scripts = array();
        
        //Подключаем блоки
        $this->template->block_left = null;
        $this->template->block_center = null;
        $this->template->block_right = null;
        $this->template->block_headerRight = null;
    }
}

