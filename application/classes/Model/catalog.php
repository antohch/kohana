<?php defined('SYSPATH') or die('No direct script access.');

class Model_Catalog extends Model {

	public function all_products()
	{
            return array(
                'PHP. Сборник рецептов' => 100,
                'Язык программирования Java' => 200,
                'Совершенный код' => 300,
                'Web-сервер глазами хакера' => 400,
                );
        }
        public function bestProduct()
        {
            return array(
                'PHP. Сборник рецептов' => 100,
                'Язык программирования Java' => 200,
                'Web-сервер глазами хакера' => 400,
            );
        }
}
