<?php defined('SYSPATH') or die('No direct script access.');

class Model_Categori extends ORM {
    protected $_has_many = array(
        'product' => array(
            'model' => 'product',
            'through' => 'productc_categoris'
        ),
    );
}
