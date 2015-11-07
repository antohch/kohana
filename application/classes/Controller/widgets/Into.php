<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Widgets_Into extends Controller_Widgets{
    public $template = 'widgets/w_into';
    public function action_index(){
        $into = Model::factory('Into')->intoHref();
        $this->template->into = $into;
    }
}

