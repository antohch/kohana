<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index extends Controller_Template {
    
        public $template = 'v_index';
        public function before()
        {
            parent::before();
            $this->template->title = 'Интернет-магазин';
        }
	public function action_index()
	{
            
            $this->template->content = 'Главная страница';
	}
	public function action_catalog()
	{
            $products = Model::factory('Catalog')->all_products();
            $this->template->content = View::factory('v_catalog', array('products' => $products));
	}


} 