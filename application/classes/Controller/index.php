<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index extends Controller_Template {
    
        public $template = 'v_index';

	public function action_index()
	{
            $this->template->title = 'Интернет-магазин';
            $this->template->content = 'Главная страница';
	}
	public function action_catalog()
	{
            $products = array(
                'Товар 1' => 100,
                'Товар 2' => 200,
            );
            $this->template->title = 'Интернет-магазин';
            $this->template->content = View::factory('v_catalog', array('products' => $products));
	}


} 