<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index extends Controller_Template{
    public $template = 'v_base';
    public function action_index()
    {
        $this->template->title = 'Интернет магазин';
    }
    public function action_catalog()
    {
        
    }
}