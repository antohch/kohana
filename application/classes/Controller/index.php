<?php defined('SYSPATH') or die('No direct script access.');
//Общий базовый класс
class Controller_Index extends Controller_Base{
    
    public $template = 'index/v_base';
    
    public function before(){
        parent::before();

        //вывод в шаблон
        $this->template->styles[] = 'media/css/style.css';
    } 
}

