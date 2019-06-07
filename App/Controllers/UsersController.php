<?php
namespace Controllers;

use Models\UsersModel;

class UsersController extends Controller
{
    public function editProfile()
    {

        if (! $this->session->get('user_email')){
            header('location:' . $this->route->baseUrl());
            exit();
        }

        $userData['user_id'] = $this->filter->int($this->request->post('user_id'));
        $userData['full_name'] = $this->filter->stringStrip($this->request->post('full_name'));
        $userData['user_email'] = $this->filter->email($this->request->post('user_email'));
        $userData['confirm_email'] = $this->filter->email($this->request->post('confirm_email'));
        $userData['user_password'] = $this->filter->password($this->request->post('user_password'));
        $userData['confirm_password'] = $this->filter->password($this->request->post('confirm_password'));

        $id = $userData['user_id'];

        if ($this->request->requestMethod() == 'POST'){

            $sql = "SELECT * FROM users WHERE user_id != $id";

            $user = UsersModel::query($sql);

           if (empty($user) == false){
               foreach ($user as $email) {
                   if ($email->user_email == $this->request->post('user_email')){
                       $data['status'] = 'error';
                       $data['msg'] = 'Email already exists';
                       echo json_encode($data);
                       exit();
                   }
               }
           }


            if (empty($userData['full_name']) == true){
                $data['status'] = 'error';
                $data['msg'] = 'Please insert full name';
                echo json_encode($data);
                exit();
            }


            if ($userData['user_email'] == false){
                $data['status'] = 'error';
                $data['msg'] = 'Empty email or email syntax error';
                echo json_encode($data);
                exit();
            }

            if ($userData['user_email'] != $userData['confirm_email']){
                $data['status'] = 'error';
                $data['msg'] = 'Emails not matched';
                echo json_encode($data);
                exit();
            }

            if (empty($userData['user_password']) == false){

                if ($userData['user_password'] == ''){
                    $data['status'] = 'error';
                    $data['msg'] = 'Please insert password';
                    echo json_encode($data);
                    exit();
                }

                if ($userData['user_password'] != $userData['confirm_password']){
                    $data['status'] = 'error';
                    $data['msg'] = 'Passwords not matches';
                    echo json_encode($data);
                    exit();
                }

                if (mb_strlen($userData['user_password']) < 8 || mb_strlen($userData['confirm_password']) < 8){
                    $data['status'] = 'error';
                    $data['msg'] = 'Passwords at least 8 characters';
                    echo json_encode($data);
                    exit();
                }


                $userData['user_password'] = password_hash($userData['user_password'].'!@#$%^&*()', CRYPT_BLOWFISH);

            }

            if (empty($userData['confirm_password']) == false){
                if ($userData['password'] == ''){
                    $data['status'] = 'error';
                    $data['msg'] = 'Please insert password';
                    echo json_encode($data);
                    exit();
                }

            }

            unset($userData['confirm_password'],$userData['confirm_email'], $userData['user_id']);

            if ($userData['user_password'] == ''){
                unset($userData['user_password']);
            }


            foreach ($userData as $key => $value) {

                $column[] = $key;
                $columnValue[] = $value;

                $this->session->set($key, $value);
            }

            UsersModel::update( $column, $columnValue, "user_id = $id");

//            if ($this->request->post('user_img')){
//                $allow_ext  = array('jpg','jpeg','png','gif');
//                $ext = explode('.', $_FILES['user_image']['name']);
//                $ext = end($ext);
//                $ext = strtolower($ext);
//                if(in_array($ext,$allow_ext)) {
//                    $new_name = $this->request->post('user_img');
//                    move_uploaded_file($_FILES['user_image']['tmp_name'], ABS_PATH . IMAGES_PATH . $new_name);
//                } else {
//                    $data['status'] = 'error';
//                    $data['msg'] = 'ملف غير مسموح به';
//                    echo json_encode($data);
//                    exit();
//                }
//            }

            $data['status'] = 'success';
            $data['msg'] = 'Updated successfully';
            echo json_encode($data);
            exit();

        }

    }

}