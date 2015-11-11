<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_EditTovar extends Controller_Admin{
    public function action_index(){
        $product = array_reverse(ORM::factory('product')->find_all()->as_array());
        $productView = View::factory('admin/products/v_products_index', array('product' => $product));
        $this->template->block_center = array($productView);
    }
    public function action_add(){
        $product = ORM::factory('product');
        $add = View::factory('admin/products/v_products_add');
        $this->template->block_center = array($add);
        
        //тут будет пост и проверка на него
        if ($this->request->method() == 'POST'){
            $cat_id = $_POST['cat_id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $cost = $_POST['cost'];
            $status = $_POST['status'];
            
            $product->cat_id = $cat_id;
            $product->title = $title;
            $product->description = $description;
            $product->cost = $cost;
            $product->status = $status;
            $product->save();
            
            header('Location: /admin/edittovar/add');
            exit;
        }
        //конец поста
        

    }
}