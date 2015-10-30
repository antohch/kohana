<?php defined('SYSPATH') or die('No direct script access.');

class Model_index extends Model{
    public function showIndex(){
        
        return array(
            'text' => 'One page internet shop',
        );
    }
    public function showUser(){
        return 'Вася';
    }
}