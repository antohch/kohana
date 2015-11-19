<?php defined('SYSPATH') or die('No direct script access.');

class Model_Product extends ORM {
    protected $_table_name = 'products';
    protected $_primary_key = 'id';
    protected $_db_group = 'default';
    protected $_has_many = array(
        'comments' => array(
            'model' => 'comment',
            'foreign_key' => 'product_id',
        ),
        'images' => array(
            'model' => 'image',
            'foreign_key' => 'product_id',
        ),
        'categori' => array(
            'model' => 'categori',
            'foreign_key' => 'product_id',
            'through' => 'productc_categoris',
            'far_key' => 'category_id',
        ),
    );
    public function rules(){
        return array(
            'title' => array(
                array('not_empty'),
                array('min_length', array(':value', 3))
            ),
        );
    }
    public function labels(){
        return array(
            'title' => 'Название',
        );
    }
    public function filters(){
        return array(
            TRUE => array(
                array('trim'),
                array('strip_tags'),
            ),
        );
    }
}
