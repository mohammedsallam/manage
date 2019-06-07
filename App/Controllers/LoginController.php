<?php
namespace Controllers;

use Models\AdminModel;
use Models\UsersModel;

class LoginController extends Controller
{
    public $noLoad = [
        'searchNav',
        'topNav',
        'sidesSection',
        'contentStart',
        'contentEnd'
    ];

    public $loadCss = [
        'bootstrap',
        'waves',
        'animate',
        'style',
        'my_style',

    ];

    public $loadJs = [
        'jquery',
        'bootstrap',
        'waves',
        'validate',
        'admin',
        'sign_in',
//        'lettering',
        'main'

    ];

    public function user()
    {

        if (! $this->session->get('user_email')){
            header('location:' . $this->route->baseUrl());
            exit();
        }

        $this->app->container['title'] = 'Login User page';
        $this->siteView();
    }

    public function admin(){

        if ($this->session->get('admin_email')){
            header('location:' . $this->route->baseUrl() . 'admin/home');
            exit();
        }

        $this->app->container['title'] = 'Admin login page';
        $admin = AdminModel::getBy('admin_email', $this->session->get('admin_email'));
        $this->app->container['admin'] = $admin;
        $this->adminView();
    }

    public function checkLoginAdmin()
    {

        $adminEmail = $this->filter->email($this->request->post('admin_email'));
        $adminPassword = $this->filter->password($this->request->post('admin_password'));

        $admin = AdminModel::getBy('admin_email', $adminEmail);

        if ($this->request->requestMethod() == 'POST') {

            if ($adminEmail == false){
                $data['status'] = 'error';
                $data['msg'] = 'Empty email or email syntax error';
                echo json_encode($data);
                exit();
            }


            if (empty($adminPassword) == true) {
                $data['status'] = 'error';
                $data['msg'] = 'Pleas inter you password';
                echo json_encode($data);
                exit();
            }

            if ($admin == null) {
                $data['status'] = 'error';
                $data['msg'] = 'Email not exists';
                echo json_encode($data);
                exit();
            }


            $password = $adminPassword.'!@#$%^&*()';

            if (password_verify($password, $admin->admin_password) == false){
                $data['status'] = 'error';
                $data['msg'] = 'Password not correct';
                echo json_encode($data);
                exit();
            }


            $this->session->set('admin_id', $admin->admin_id);
            $this->session->set('admin_email', $admin->admin_email);
            $this->session->set('full_name', $admin->full_name);

            $data['status'] = 'success';
            $data['msg'] = 'Login successfully';
            echo json_encode($data);
            exit();
        }


    }

    public function checkLoginUser()
    {

        $userEmail = $this->filter->email($this->request->post('user_email'));
        $userPassword = $this->filter->password($this->request->post('user_password'));

        $user = UsersModel::getBy('user_email', $userEmail);

        if ($this->request->requestMethod() == 'POST') {

            if($user == null){
                $data['status'] = 'error';
                $data['msg'] = 'User information not found';
                echo json_encode($data);
                exit();
            }

            if ($user->approve == 0){
                $data['status'] = 'error';
                $data['msg'] = 'Dear student You are finished exams! thank you';
                echo json_encode($data);
                exit();
            }

            if ($userEmail == false){
                $data['status'] = 'error';
                $data['msg'] = 'Empty email or email syntax error';
                echo json_encode($data);
                exit();
            }


            if ($user == null) {
                $data['status'] = 'error';
                $data['msg'] = 'Email not exists';
                echo json_encode($data);
                exit();
            }

            if (empty($userPassword) == true) {
                $data['status'] = 'error';
                $data['msg'] = 'Pleas inter you password';
                echo json_encode($data);
                exit();
            }

            $password = $userPassword.'!@#$%^&*()';

            if (password_verify($password, $user->user_password) == false){
                $data['status'] = 'error';
                $data['msg'] = 'Password not correct';
                echo json_encode($data);
                exit();
            }

            UsersModel::update(['last_login'], [time()], "user_id = $user->user_id");

            $this->session->set('user_email', $user->user_email);
            $this->session->set('user_id', $user->user_id);
            $this->session->set('full_name', $user->full_name);


            $data['status'] = 'success';
            $data['msg'] = 'Login successfully';
            echo json_encode($data);
            exit();
        }

        header('location:' . $this->route->baseUrl());

    }

}