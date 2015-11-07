<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Widgets extends Controller_Template{
 
    //чтобы на прямую не попасть в виджет
    public function before(){
        parent::before();
        
        if(Request::current()->is_initial()){
            $this->auto_render = FALSE;
        }
    }
    
   
}

