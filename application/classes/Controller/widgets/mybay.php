<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Widgets_Mybay extends Controller_Widgets{
    public $template = 'widgets/w_myshop';
    public function action_index(){
        $mybay = Model::factory('mybayw')->mybayHref();
        $this->template->hrefMybay =$mybay;
    }
}
