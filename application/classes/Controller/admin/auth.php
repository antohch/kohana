<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Auth extends Controller_Admin{
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

}