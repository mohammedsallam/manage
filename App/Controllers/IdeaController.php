<?php
namespace Controllers;

use Models\IdeasModel;

class IdeaController extends Controller
{
    public $noLoad = [
        'slider',
        'news',
        'navBar',
    ];

    public function home()
    {

        $this->app->container['title'] = 'تسجيل فكرة';
        $this->siteView();

    }

    public function show()
    {
        if (! $this->session->has('admin_email')){
            header('location:' . $this->route->baseUrl());
            exit();
        }

        $this->app->container['title'] = 'عرض الأفكار';
        $this->app->container['ideas'] = IdeasModel::getAll();
        $this->adminView();
    }

    public function view()
    {
        if (! $this->session->get('admin_email')){
            header('location:' . $this->route->baseUrl());
            exit();
        }

        $id = $this->filter->int($this->app->params);
        $this->app->container['title'] = 'عرض فكرة';

        $this->app->container['idea'] = IdeasModel::getBy('id', $id);

        $this->siteView();
    }

    public function active()
    {
        if (! $this->session->get('admin_email')){
            header('location:' . $this->route->baseUrl() . 'login');
            exit();
        }

        $id = $this->filter->int($this->request->post('id'));
        $approve = $this->filter->int($this->request->post('approve'));
        $idea = IdeasModel::getBy('id', $id);

        if(empty($idea) == false){
            IdeasModel::update(['approve'], [$approve], "id = $id");
            exit();
        }
    }

    public function delete()
    {
        if (! $this->session->get('admin_email')){
            header('location:' . $this->route->baseUrl() . 'login');
            exit();
        }

        $id = $this->filter->int($this->request->post('id'));
        $idea = IdeasModel::getBy('id', $id);

        if(empty($idea) == false){
            IdeasModel::delete("id= $id");
            $data['status'] = 'success';
            $data['msg'] = $id . " تم حذف الفكرة رقم ";
            echo json_encode($data);
            exit();
        }
    }

    public function sendIdea()
    {
        $ideaData['name'] = $this->filter->stringStrip($this->request->post('name'));
        $ideaData['rec_num'] = $this->filter->int($this->request->post('rec_num'));
        $ideaData['management'] = $this->filter->stringStrip($this->request->post('management'));
        $ideaData['com_num'] = $this->filter->int($this->request->post('com_num'));
        $ideaData['section'] = $this->filter->stringStrip($this->request->post('section'));
        $ideaData['phone'] = $this->filter->int($this->request->post('phone'));
        $ideaData['unit'] = $this->filter->stringStrip($this->request->post('unit'));
        $ideaData['email'] = $this->filter->email($this->request->post('email'));
        $ideaData['area'] = $this->filter->stringStrip($this->request->post('area'));
        $ideaData['idea_title'] = $this->filter->stringStrip($this->request->post('idea_title'));
        $ideaData['idea_content'] = $this->filter->stringStrip($this->request->post('idea_content'));


        if (empty($ideaData['name']) == true){
            $data['status'] = 'error';
            $data['msg'] = 'فضلا قم بكتابة الإسم يالكامل';
            echo json_encode($data);
            exit();
        }
        if (empty($ideaData['rec_num']) == true){
            $data['status'] = 'error';
            $data['msg'] = 'فضلا قم بكتابة رقم السجل المدني';
            echo json_encode($data);
            exit();
        }
        if (empty($ideaData['management']) == true){
            $data['status'] = 'error';
            $data['msg'] = 'فضلا قم بكتابة إسم الإدارة';
            echo json_encode($data);
            exit();
        }
        if (empty($ideaData['com_num']) == true){
            $data['status'] = 'error';
            $data['msg'] = 'فضلا قم بكتابة رقم الحاسب';
            echo json_encode($data);
            exit();
        }
        if (empty($ideaData['section']) == true){
            $data['status'] = 'error';
            $data['msg'] = 'فضلا قم بكتابة القسم';
            echo json_encode($data);
            exit();
        }
        if (empty($ideaData['phone']) == true){
            $data['status'] = 'error';
            $data['msg'] = 'فضلا قم بكتابة رقم الجوال';
            echo json_encode($data);
            exit();
        }
        if (empty($ideaData['unit']) == true){
            $data['status'] = 'error';
            $data['msg'] = 'فضلا قم بكتابةالوحدة';
            echo json_encode($data);
            exit();
        }
        if (empty($ideaData['email']) == true){
            $data['status'] = 'error';
            $data['msg'] = 'فضلا قم بكتابة البريد الإلكتروني';
            echo json_encode($data);
            exit();
        }
        if (empty($ideaData['area']) == true){
            $data['status'] = 'error';
            $data['msg'] = 'فضلا قم باختار المجال';
            echo json_encode($data);
            exit();
        }
        if (empty($ideaData['idea_title']) == true){
            $data['status'] = 'error';
            $data['msg'] = 'فضلا قم بكتابة عنوان الفكرة';
            echo json_encode($data);
            exit();
        }
        if (empty($ideaData['idea_content']) == true){
            $data['status'] = 'error';
            $data['msg'] = 'فضلا قم بكتابة محتوى الفكرة';
            echo json_encode($data);
            exit();
        }

        foreach ($ideaData as $key => $value) {

            $column[] = $key;
            $columnValue[] = $value;
        }

        IdeasModel::insert($column, $columnValue);

        $data['status'] = 'success';
        $data['msg'] = 'تم إرسال الفكرة';
        echo json_encode($data);
        exit();

    }

}