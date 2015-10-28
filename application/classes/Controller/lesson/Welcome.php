<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Lesson_Welcome extends Controller {

	public function action_index()
	{
                $name = $this->request->param('id');
                if(!$name){
                    $name = 'Goest';
                }
                $set = Kohana::$config->load('myconf.setting');
                $this->response->body('hello, '.$name.'<br>'.$set);
	}
	public function action_index2()
	{       
                I18n::lang('ru');
//                echo __('Hello, world!');
            $username = 'Гость';
            echo __('Hello, :user', array(':user' => $username));
	}
        public function action_info()
	{
		$firstName = $this->request->param('id');
                $lostName = $this->request->param('lostName');
                $age = $this->request->param('age');
                $this->response->body('Your Name: '.$firstName.', Your Surname: '.$lostName.', Your Age: '. $age);
	}
        public function action_index3()
	{
		$resul = Kohana::message('forms/contact', 'errors.user_not_found');
                print_r($resul);
	}
        public function action_index4()
	{
            $result = $this->request->controller();
            $this->response->body($result);
	}
        public function action_index5()
	{
            $result = Request::factory('http://ya.ru')->execute();
            $this->response->body($result);
	}
        public function action_index6()
	{
            $menu = Request::factory('widget/menu')->execute();
	}

} // End Welcome
