<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller {

	public function action_index()
	{
                $name = $this->request->param('id');
                if(!$name){
                    $name = 'Goest';
                }
                $this->response->body('hello, '.$name);
	}
        public function action_info()
	{
		$firstName = $this->request->param('id');
                $lostName = $this->request->param('lostName');
                $age = $this->request->param('age');
                $this->response->body('Your Name: '.$firstName.', Your Surname: '.$lostName.', Your Age: '. $age);
	}

} // End Welcome
