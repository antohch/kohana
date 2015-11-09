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
        $form = View::factory('/admin/news/v_add');
        $this->template->block_center = array($form);
    }
    
    public function action_edit(){
        $id = $this->request->param('id');
        if ($this->request->method() == 'POST'){
            $title = $this->request->post('title');
            $intro = $this->request->post('intro');
            $content = $this->request->post('content');
            $date = $this->request->post('date');
            $query = Model::factory('news')->update($id, $title, $intro, $content, $date);
            header('Location: /admin/editNews/');
            exit;
        }
        $news = Model::factory('news')->newsOne($id);
        $title = $news[0]['title'];
        $intro = $news[0]['intro'];
        $content = $news[0]['content'];
        $date = $news[0]['date'];
        $edit = View::factory('/admin/news/v_edit',array(
            'title' => $title, 
            'intro' => $intro, 
            'content' => $content, 
            'date' => $date,
            'id' => $id));
        $this->template->block_center = array($edit);
    }
    
    public function action_delete(){
        $id = $this->request->param('id');
        $query = DB::delete('news')->where('id', '=', array($id));
        $query->execute();
        header('Location: /admin/editNews');
        exit;
    }
}