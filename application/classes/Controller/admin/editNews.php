<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_EditNews extends Controller_Admin{
    public function action_index(){
        echo 'admin_EditNews';
    }
    public function action_add(){
        //инициализация реквеста, для работы с базой
        $request = Request::$initial;
        if($request->method() == HTTP_Request::POST){
            //получаем post
           $title = $request->post('title');
           $intro = $request->post('intro');
           $content = $request->post('content');
           $date = $request->post('date');
           
           $query = DB::insert('news', array('title','intro','content','date'))//подготовить запрос для отправки записи в базу
                  ->values(array($title, $intro, $content, $date));
           $query->execute();//отправить запрос на сервер
           
           header('Location: /admin/editNews/add');
           exit;
        }
        $form = View::factory('admin/news/v_add');
        
        $this->template->block_center = array($form);
    }
    public function action_edit(){}
    public function action_delete(){}
}