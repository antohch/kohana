<?php defined('SYSPATH') or die('No direct script access.');

class Model_Bay extends Model{
    public function showBay(){
        return array(
          'text' => 'Вы находитесь в корзине',  
        );
    }
}
