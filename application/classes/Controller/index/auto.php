<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index_Auto extends Controller_Index{
    public function before(){
        parent::before();
        $menu = Request::factory('widgets/menu')->execute();
        
        $this->template->block_left = array($menu);
    }
    public function action_index(){
        $this->action_enter();
    }
    public function action_enter(){
        $content = View::factory('index/auth/v_auth_login');
        
        //выводим в шаблон
        $this->template->page_title = 'Вход';
        $this->template->block_center = array($content);
    }
    public function action_reg(){
        $content = View::factory('index/auth/v_auth_register');
        
        //выводим в шаблон
        $this->template->page_title = 'Регистрация';
        $this->template->block_center = array($content);
    }
    public function action_exit(){
        $this->request->redirect();
    }
}
