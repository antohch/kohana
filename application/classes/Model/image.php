<?php defined('SYSPATH') or die('No direct script access.');

class Model_Image extends ORM{
    protected $_belong_to = array(
        'product' => array(
            'model' => 'product',
            'foreign_key' => 'product_id',
        ),
    );
    
    public function rules(){
        return array(
            'name' => array(
                array('not_empty'),
            ),
        );
    }
}
