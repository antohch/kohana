<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Auto extends Controller_Base{
    public function action_enter(){
        echo 'enter';
    }
    public function action_reg(){
        echo 'reg';
    }
    public function action_exit(){
        echo 'exit';
    }
}
