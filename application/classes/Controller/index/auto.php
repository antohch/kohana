<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index_Auto extends Controller_Index{
    public function before(){
        parent::before();
        $menu = Request::factory('/widgets/menu')->execute();
        
        $this->template->block_left = array($menu);
    }
    public function action_index(){
        $this->action_login();
    }
    public function action_login(){
        $auth = Auth::instance();
        if(Auth::instance()->logged_in()){
            header ('Location: /catalog');
            exit;
        }
        if($this->request->method() == 'POST'){
            $data = Arr::extract($_POST, array('username', 'password', 'remeber'));
            $status = $auth->login($data['username'], $data['password'], (bool) $data['remeber']);
            if($status){
                if($auth->logged_in('admin')){
                    header('Location: /admin/');
                    exit;
                }
                header('Location: /catalog');
                exit;  
            }else{
                $error = array(Kohana::message('auth/user', 'no_user'));
            }
        }
        
        $content = View::factory('/index/auth/v_auth_login')
                ->bind('error', $error);
        
        //выводим в шаблон
        $this->template->page_title = 'Вход';
        $this->template->block_center = array($content);
    }
    public function action_reg(){
        if ($this->request->method() == 'POST'){
            
            $date = Arr::extract($_POST, array('username', 'first_name', 'email', 'password', 'password_confirm', ));
            $users = ORM::factory('user');

            try{
                $users->create_user($_POST, array(
                    'email',
                    'username',
                    'password',
                    'first_name',
                ));
                $role = ORM::factory('role')->where('name', '=', 'login')->find();
                $users->add('roles', $role);
                $this->action_login();
               // $this->request->redirect('http://kohana/catalog');
            }catch(ORM_Validation_Exception $e){
                $errors = $e->errors('auto');
            }
            header ('Location: /');
            exit;
        }
        //закэшировал
        $content = $this->cache->get('v_reg');
        //$this->cache->delete('v_reg');
        if($content == NULL){
            $content = View::factory('/index/auth/v_auth_register')
                    ->bind('errors', $errors);
            $this->cache->set('v_reg', $content->render());
        }
        
        //выводим в шаблон
        $this->template->page_title = 'Регистрация';
        $this->template->block_center = array($content);
    }
    public function action_exit(){
        Auth::instance()->logout();
        header ('Location: /');
        exit;
    }
    public function action_update(){
        if($this->request->method() == 'POST'){
            $users = ORM::factory('user');
            $users->where('id', '=', $this->user->id)
                    ->find()
                    ->update_user($_POST, array(
                        'first_name',
                        'email',
                    ));
        }
                $auth = Auth::instance();

        $content = View::factory('/index/auth/v_auth_update');
        $this->template->block_center = array($content);
    }
}
