<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index_main extends Controller_Index{
    public function before(){
        parent::before();
        //виджеты
        $menu = Request::factory('widgets/menu')->execute();
        $topproducts = Request::factory('widgets/topproducts')->execute();
        $into = Request::factory('widgets/Into')->execute();
        $mybay = Request::factory('widgets/mybay')->execute();
        $news = Request::factory('widgets/news')->execute();
        
        //вывод в шаблон
        $this->template->block_headerRight = array($mybay);
        $this->template->block_left = array($menu);
        $this->template->block_right = array($into,$topproducts, $news);
    }
    public function action_index()
    {  
        I18n::lang('ru');
        $text = Model::factory('index')->showIndex();
        $user = Model::factory('index')->showUser();
        $block_center = View::factory('v_index',array('text' => $text,'username' => $user));
        $messag = Kohana::message('forms/contact', 'errors.user_not_found');
        //вывод шаблона
       // $this->template->page_title = 'Главная';
        $this->template->page_title = Kohana::$config->load('myconf.page_title');
        $this->template->block_center = array($block_center, $messag);
    }
    public function action_contacts(){
        
        if($this->request->method() == "POST"){
            $data = Arr::extract($_POST, array('name', 'email', 'text'));
            $admin_email = Kohana::$config->load('settings.admin_email');
            $site_name = Kohana::$config->load('setting.site_name');
            
            $email = Email::factory('Контакты', $data['text'])
                    ->to($data['email'], $data['name'])//кому
                    ->from($admin_email, $site_name)//от кого
                    ->send();
            header('Location: /main/contacts');
            exit;
        }
        
        $contact = View::factory('index/contact/v_contact');
        $this->template->block_center = array($contact);
    }

}