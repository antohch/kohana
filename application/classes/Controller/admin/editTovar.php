<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_EditTovar extends Controller_Admin{
    public function before(){
        parent::before();
        $this->template->scripts[] = 'media/js/jquery-1.6.2.min.js';
        $this->template->scripts[] = 'media/js/jquery.MultiFile.pack.js';
        $this->template->scripts[] = 'media/js/upload.js';
    }
    public function action_index(){
        $product = array_reverse(ORM::factory('product')->find_all()->as_array());
        $catToPro = ORM::factory('categori')->find_all();
        $productView = View::factory('admin/products/v_products_index', array(
            'product' => $product,
            'catToPro' => $catToPro,
            ));
        $this->template->block_center = array($productView);
    }
    
    public function _upload_img($file, $ext = NULL, $directory = NULL){
        if($directory == NULL){
            $directory = 'media/uploads';
        }
        if($ext == NULL){
            $ext = 'jpg';
        }
        $symbols = '34534651324369789fsgtrgfsdfsdvcnvma';
        $filename = '';
        for($i = 0; $i < 10; $i++){
            $filename .= rand(1, strlen($symbols));
        }
        $im = Image::factory($file);
        if($im->width > 150){
            $im->resize(150);
        }
        $im->save("$directory/small_$filename.$ext");
        
        $im = Image::factory($file);
        $im->save("$directory/$filename.$ext");
        
        return "$filename.$ext";
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
                
                if(!empty($_FILES['images']['name'][0])){
                    foreach($_FILES['images']['tmp_name'] as $image){
                        $filename = $this->_upload_img($image);
                        
                        $im_db = ORM::factory('image');
                        $im_db->product_id = $product->pk();
                        $im_db->name = $filename;
                        $im_db->save;
                    }
                }
                
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