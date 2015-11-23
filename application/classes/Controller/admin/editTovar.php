<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_EditTovar extends Controller_Admin{
    public function before(){
        parent::before();
        $this->template->scripts[] = 'media/js/jquery-1.6.2.min.js';
        $this->template->scripts[] = 'media/js/jquery.MultiFile.pack.js';
        $this->template->scripts[] = 'media/js/upload.js';
    }
    public function action_index(){
        $count = ORM::factory('product')->count_all();
        $pagination = Pagination::factory(array(
            'total_items' => $count,
            $this->request,
        ));
        $product = array_reverse(ORM::factory('product')
            ->limit($pagination->items_per_page)
            ->offset($pagination->offset)
            ->find_all()
            ->as_array()
            );
        $catToPro = ORM::factory('categori')->find_all();
        $productView = View::factory('admin/products/v_products_index', array(
            'product' => $product,
            'catToPro' => $catToPro,
            'pagination' => $pagination,
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
        $symbols = '3x45346p513a2gzeg4369789fsgtrgzfsdfsdvcnvma';
        $filename = substr(str_shuffle($symbols),0,16);

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
                if(!empty($_FILES['image']['tmp_name'][0])){
                    foreach($_FILES['image']['tmp_name'] as $image){
                        $filename = $this->_upload_img($image);
                        
                        $im_db = ORM::factory('image');
                        $im_db->product_id = $product->pk();
                        $im_db->name = $filename;
                        
                        $im_db->save();
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
      
        $data['images'] = $product->images->find_all()->as_array();
        
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
                if(!empty($_FILES['image']['tmp_name'][0])){
                    foreach($_FILES['image']['tmp_name'] as $image){
                        $filename = $this->_upload_img($image);
                        
                        $im_db = ORM::factory('image');
                        $im_db->product_id = $product->pk();
                        $im_db->name = $filename;
                        
                        $im_db->save();
                    }
                }
                header('Location: /admin/edittovar/');
                exit;
            }
            catch(ORM_Validation_Exception $e){
                $errors = $e->errors('validation');
            }
        }
        $edit = View::factory('/admin/products/v_products_edit', array('product' => $product, 'data' => $data));
        $this->template->block_center = array($edit);
    }
       
   public function action_delimg(){
       $id = $this->request->param('id');
       $idTovar = $this->request->param('idTovar');
       $product = ORM::factory('image')->where('id', '=', $id)->find();
       $filename = "media/uploads/".$product->name;
       $filenameSmall = "media/uploads/small_".$product->name;
       if(file_exists($filename))
            unlink($filename); 
       if(file_exists($filenameSmall))
            unlink($filenameSmall); 
       if ($product){
            $product->delete();
            header('Location: /admin/edittovar/edit/'.$idTovar.'#img');
            exit;
        }
   }
}