<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_AllBay extends Controller_Base{
    public function before(){
        parent::before();
        $menu = Request::factory('widgets/menu')->execute();
        $this->template->block_left = array($menu);
    }
    public function action_index(){
        $text = Model::factory('textAllbay')->text();
        $block_center = View::factory('v_text', array('text' => $text));
        $this->template->block_center = array($block_center);
    }
}