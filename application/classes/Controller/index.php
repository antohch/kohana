<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index extends Controller_Base{
    public function action_index()
    {
        $block_center = View::factory('v_index');
        //вывод шаблона
        $this->template->page_title = 'Главная';
        $this->template->block_center = array($block_center);
    }
}