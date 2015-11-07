<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Admin extends Controller_Admin{
    public function before(){
        parent::before();
    }
    public function action_index() {

    $content = View::factory('admin/main/v_main_index');

    // Вывод в шаблон
    $this->template->page_title = 'Главная';
    $this->template->block_center = array($content);
    }

}