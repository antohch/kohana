<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Widgets_Into extends Controller_Widgets{
    public $template = 'widgets/w_into';
    public function action_index(){
        $data = array();
        if(Auth::instance()->logged_in()){
            $data['display_in'] = 'none';
            $data['display_out'] = 'block';
        }else{
            $data['display_in'] = 'block';
            $data['display_out'] = 'none';
        }
        $into = Model::factory('Into')->intoHref();
        $this->template->into = $into;
        $this->template->display = $data;
    }
}

