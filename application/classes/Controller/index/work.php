<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index_Work extends Controller_Index{
    public function before(){
        parent::before();
    }
    public function action_oplata(){
        echo 'oplata';
    }
    public function action_dostavka(){
        echo 'dostavka';
    }
    public function action_korzina(){
        echo 'korzina';
    }
}