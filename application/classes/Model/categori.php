<?php defined('SYSPATH') or die('No direct script access.');

class Model_Categori extends ORM {
    protected $_has_many = array(
        'product' => array(
            'model' => 'product',
<<<<<<< HEAD
            'through' => 'productc_categoris'
=======
            'foreign_key' => 'category_id',
            'through' => 'productc_categoris',
            'far_key' => 'product_id',
>>>>>>> bb70e782d9ebe95f452acd166560d19df3e948cd
        ),
    );
}
