<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_EditTovar extends Controller_Admin{
    public function action_index(){
        $product = array_reverse(ORM::factory('product')->find_all()->as_array());
        $catToPro = ORM::factory('categori')->find_all();
        $productView = View::factory('admin/products/v_products_index', array(
            'product' => $product,
            'catToPro' => $catToPro,
            ));
        $this->template->block_center = array($productView);
    }
    public function action_add(){
        $product = ORM::factory('product');
        //тут будет пост и проверка на него
        if ($this->request->method() == 'POST'){
            $cat_id = $_POST['cat_id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $cost = $_POST['cost'];
            $status = $_POST['status'];
            $cat = explode(', ', $cat_id);
            
            $product->cat_id = $cat_id;
            $product->title = $title;
            $product->description = $description;
            $product->cost = $cost;
            $product->status = $status;
            try{
                $product->save();
                $product->add('categori', $cat);
                header('Location: /admin/edittovar/add');
                exit;
            }
            catch(ORM_Validation_Exception $e){
                $errors = $e->errors('validation');
            }

        }
        //конец поста
        $add = View::factory('admin/products/v_products_add')->bind('errors', $errors);
        $this->template->block_center = array($add);

    }
    public function action_delete(){
        $id = $this->request->param('id');
        $product = ORM::factory('product')->where('id', '=', $id)->find();
        if ($product){
            $product->remove('categori');
            $product->delete();
            header('Location: /admin/edittovar');
            exit;
        }
    }
    public function action_edit(){
        $id = $this->request->param('id');
        $product = ORM::factory('product')->where('id', '=', $id)->find();
        if($this->request->method() == 'POST'){
            $cat_id = $_POST['cat_id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $cost = $_POST['cost'];
            $status = $_POST['status'];
            $cat = explode(', ', $cat_id);
            
            $product->cat_id = $cat_id;
            $product->title = $title;
            $product->description = $description;
            $product->cost = $cost;
            $product->status = $status;
            try{
                $product->save();
                $product->remove('categori');
                if (is_array($cat)){
                    foreach($cat as $id_cat){
                        $product->add('categori', $id_cat);
                    }
                }
                header('Location: /admin/edittovar/');
                exit;
            }
            catch(ORM_Validation_Exception $e){
                $errors = $e->errors('validation');
            }
        }
        $edit = View::factory('/admin/products/v_products_edit', array('product' => $product));
        $this->template->block_center = array($edit);
    }
}