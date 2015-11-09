<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_EditNews extends Controller_Admin{
    public function action_index(){
        $news = Model::factory('news')->newsPage();
        
        $add = View::factory('admin/news/v_news', array('news' => $news));
        
        $this->template->block_center = array($add);
    }
    public function action_add(){
        //инициализация реквеста, для работы с базой
       // $request = Request::$initial;
        if($this->request->method() == HTTP_Request::POST){
            //получаем post
           $title = $this->request->post('title');
           $intro = $this->request->post('intro');
           $content = $this->request->post('content');
           $date = $this->request->post('date');
           
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