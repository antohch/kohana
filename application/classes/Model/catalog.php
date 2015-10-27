<?php defined('SYSPATH') or die('No direct script access.');

class Model_Catalog extends Model {

	public function all_products()
	{
            $products = array('Товар 1' => 100,
                'Товар 2' => 200,
                'Товар 3' => 300,
                'Товар 4' => 400,
                );
            $tabl = '<table border="1" width="100%">
    <thead>
        <tr>
            <th>Наименование</th>
            <th>Цена</th>
        </tr>
    </thead>
    <tbody>';
            foreach($products as $k => $v)
            {
                $tabl .='        <tr>
            <td>'.$k.'</td>
            <td>'.$v.' руб.</td>
        </tr>';
            }
            $tabl .= '    </tbody>
</table>';
            return $tabl;
        }
        public function bestProduct()
        {
            $products = array(
                'Товар 2' => 200,
                'Товар 4' => 400,
            );
            $tabl = "<ul>";
            foreach($products as $k => $v)
            {
                $tabl .='<li>'.$k.' - '.$v.' руб.';
            }
            $tabl .= "</ul>";
            return $tabl; 
        }
}
