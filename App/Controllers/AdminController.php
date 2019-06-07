<?php
namespace Controllers;

use Models\AdminModel;

class AdminController extends Controller
{

    public function home(){

        if (! $this->session->get('admin_email')){
            header('location:' . $this->route->baseUrl() . 'login/admin');
            exit();
        }

        $this->app->container['title'] = 'Admin | Dashboard page';
        $admin = AdminModel::getBy('admin_email', $this->session->get('admin_email'));
        $this->app->container['admin'] = $admin;
        $this->adminView();
    }

    public function editProfile()
    {

        if (! $this->session->get('admin_email')){
            header('location:' . $this->route->baseUrl() . 'admin/login');
            exit();
        }

        $adminData['admin_id'] = $this->filter->int($this->request->post('admin_id'));
        $adminData['full_name'] = $this->filter->stringStrip($this->request->post('full_name'));
        $adminData['admin_email'] = $this->filter->email($this->request->post('admin_email'));
        $adminData['confirm_email'] = $this->filter->email($this->request->post('confirm_email'));
        $adminData['admin_password'] = $this->filter->password($this->request->post('admin_password'));
        $adminData['confirm_password'] = $this->filter->password($this->request->post('confirm_password'));

        $id = $adminData['admin_id'];

        if ($this->request->requestMethod() == 'POST'){

            $sql = "SELECT * FROM admin WHERE admin_id != $id";

            $admin = AdminModel::query($sql);

           if (empty($admin) == false){
               foreach ($admin as $email) {

                   if ($email->admin_email == $this->request->post('admin_email')){
                       $data['status'] = 'error';
                       $data['msg'] = 'Email already exists';
                       echo json_encode($data);
                       exit();
                   }
               }
           }


            if (empty($adminData['full_name']) == true){
                $data['status'] = 'error';
                $data['msg'] = 'Please insert username';
                echo json_encode($data);
                exit();
            }


            if ($adminData['admin_email'] == false){
                $data['status'] = 'error';
                $data['msg'] = 'Empty email or email syntax error';
                echo json_encode($data);
                exit();
            }

            if ($adminData['admin_email'] != $adminData['confirm_email']){
                $data['status'] = 'error';
                $data['msg'] = 'Emails not matched';
                echo json_encode($data);
                exit();
            }

            if (empty($adminData['admin_password']) == false){

                if ($adminData['admin_password'] == ''){
                    $data['status'] = 'error';
                    $data['msg'] = 'Please insert password';
                    echo json_encode($data);
                    exit();
                }

                if ($adminData['admin_password'] != $adminData['confirm_password']){
                    $data['status'] = 'error';
                    $data['msg'] = 'Passwords not matches';
                    echo json_encode($data);
                    exit();
                }

                if (mb_strlen($adminData['admin_password']) < 8 || mb_strlen($adminData['confirm_password']) < 8){
                    $data['status'] = 'error';
                    $data['msg'] = 'Passwords at least 8 characters';
                    echo json_encode($data);
                    exit();
                }


                $adminData['admin_password'] = password_hash($adminData['admin_password'].'!@#$%^&*()', CRYPT_BLOWFISH);

            }

            if (empty($adminData['confirm_password']) == false){
                if ($adminData['admin_password'] == ''){
                    $data['status'] = 'error';
                    $data['msg'] = 'Please insert password';
                    echo json_encode($data);
                    exit();
                }

            }

            unset($adminData['confirm_password'],$adminData['confirm_email'], $adminData['admin_id']);

            if ($adminData['admin_password'] == ''){
                unset($adminData['admin_password']);
            }


            foreach ($adminData as $key => $value) {

                $column[] = $key;
                $columnValue[] = $value;

                $this->session->set($key, $value);
            }

            AdminModel::update( $column, $columnValue, "admin_id = $id");

            if ($this->request->post('admin_img')){
                $allow_ext  = array('jpg','jpeg','png','gif');
                $ext = explode('.', $_FILES['admin_img']['name']);
                $ext = end($ext);
                $ext = strtolower($ext);
                if(in_array($ext,$allow_ext)) {
                    $new_name = $this->request->post('admin_img');
                    move_uploaded_file($_FILES['admin_img']['tmp_name'], ABS_PATH . IMAGES_PATH . $new_name);
                } else {
                    $data['status'] = 'error';
                    $data['msg'] = 'ملف غير مسموح به';
                    echo json_encode($data);
                    exit();
                }
            }

            $data['status'] = 'success';
            $data['msg'] = 'Updated successfully';
            echo json_encode($data);
            exit();

        }

    }

}