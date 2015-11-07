<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Widgets_Sirch extends Controller_Widgets{
    public $template = 'widgets/w_sirch';
    public function action_index(){
        $sirch = Model::factory('sirch')->SirchHref();
        $this->template->sirch = $sirch;
    }
}

