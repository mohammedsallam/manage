<?php
namespace Controllers;

use Models\TrainingModel;

class TrainingController extends Controller
{
    public function home()
    {
        $this->app->container['title'] = 'عرض الدورات التدريبية';
        $sql = "SELECT * FROM training ORDER BY id DESC";
        $this->app->container['trainings'] = TrainingModel::query($sql);
        $this->siteView();
    }

    public function show()
    {
        if (! $this->session->has('admin_email')){
            header('location:' . $this->route->baseUrl());
            exit();
        }

        $this->app->container['title'] = 'عرض الدورات التدريبية';
        $this->app->container['trainings'] = TrainingModel::getAll();
        $this->adminView();
    }

    public function add()
    {
        if (! $this->session->get('admin_email')){
            header('location:' . $this->route->baseUrl());
            exit();
        }

        $this->app->container['title'] = 'إضافة دورة تدريبية';
        $this->adminView();
    }

    public function delete()
    {
        if (! $this->session->get('admin_email')){
            header('location:' . $this->route->baseUrl() . 'login');
            exit();
        }

        $id = $this->filter->int($this->request->post('id'));
        $training = TrainingModel::getBy('id', $id);

        if(empty($training) == false){
            TrainingModel::delete("id= $id");
            $data['status'] = 'success';
            $data['msg'] = " تم حذف الدورة التدريبية رقم " . $id;
            echo json_encode($data);
            exit();
        }
    }

    public function addTraining()
    {
        $trainingData['title'] = $this->filter->stringStrip($this->request->post('title'));
        $trainingData['content'] = $this->filter->stringStrip($this->request->post('content'));


        if (empty($trainingData['title']) == true){
            $data['status'] = 'error';
            $data['msg'] = 'فضلا قم بكتابة عنوان الدورة التدريبية';
            echo json_encode($data);
            exit();
        }

        if (empty($trainingData['content']) == true){
            $data['status'] = 'error';
            $data['msg'] = 'فضلا قم بكتابة محتوى الدورة التدريبية';
            echo json_encode($data);
            exit();
        }

        foreach ($trainingData as $key => $value) {

            $column[] = $key;
            $columnValue[] = $value;
        }

        TrainingModel::insert($column, $columnValue);

        $data['status'] = 'success';
        $data['msg'] = 'تم إضافة الدورة التدريبية بنجاح';
        echo json_encode($data);
        exit();

    }


}