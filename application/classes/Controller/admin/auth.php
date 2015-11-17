<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Auth extends Controller_Admin{
    private $idUser;
    public $user;
    private function userId(){
        $this->idUser = $this->request->param('id');
        $this->user = ORM::factory('user')->where('id', '=', $this->idUser)->find();
    }
    
    public function action_reg(){
        
        if($this->request->method() == 'POST'){
            $data = $_POST;
            $users = ORM::factory('user');
            try{
                $users->create_user($data, array(
                    'username',
                    'first_name',
                    'email',
                    'password',
                ));
                $role = ORM::factory('role')->where('name', '=', 'login')->find();
                $users->add('roles', $role);
                $role = ORM::factory('role')->where('name', '=', 'admin')->find();
                $users->add('roles', $role);
                
                header('Location: /admin');
                exit;
            }catch(ORM_Validation_Exception $e){
                $errors = $e->errors('auth');
            }
        }
        
        $con = View::factory('admin/auth/v_auth_register')
                ->bind('errors', $errors);
        $this->template->block_center = array($con);
    }
    
    public function action_user(){
        $users = ORM::factory('user')->find_all();
        $show = View::factory('/admin/auth/v_user', array('user' => $users));
        $this->template->block_center = array($show);
    }

    public function action_del(){
        $idUser = $this->request->param('id');
        $user = ORM::factory('user')->where('id', '=', $idUser)->find();
        $user->delete();
        header('Location: /admin/auth/user');
        exit;
    }
    
    public function action_update(){
            $this->userId();
        if($this->request->method() == 'POST'){
            
            $this->userId();
            
            $data = Arr::extract($_POST, array("first_name", 'email'));
            $this->user->update_user($data, array("first_name", 'email'));
            header('Location: /admin/auth/user');
            exit;
        }
        $content = View::factory('/admin/auth/v_auth_update', array(
                'user' => $this->user,
                'id' => $this->idUser,
            ));
        $this->template->block_center = array($content);
    }

}