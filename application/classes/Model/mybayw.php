<?php defined('SYSPATH') or die('No direct script access.');

class Model_Mybayw extends Model {
    public function mybayHref(){
        return array(
            'mybayHref' => Kohana::$config->load('myconf.mybay'),
        );
    }
}