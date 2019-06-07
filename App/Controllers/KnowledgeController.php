<?php
namespace Controllers;

use Models\KnowledgeModel;

class KnowledgeController extends Controller
{

    public function home()
    {
        $this->app->container['title'] = 'عرض المواضيع';
        $sql = "SELECT * FROM knowledge ORDER BY id DESC";
        $this->app->container['knowledges'] = KnowledgeModel::query($sql);
        $this->siteView();
    }

    public function show()
    {
        if (! $this->session->has('admin_email')){
            header('location:' . $this->route->baseUrl());
            exit();
        }

        $this->app->container['title'] = 'عرض المواضيع';
        $this->app->container['knowledges'] = KnowledgeModel::getAll();
        $this->adminView();
    }

    public function add()
    {
        if (! $this->session->get('admin_email')){
            header('location:' . $this->route->baseUrl());
            exit();
        }

        $this->app->container['title'] = 'إضافة موضوع';
        $this->adminView();
    }

    public function delete()
    {
        if (! $this->session->get('admin_email')){
            header('location:' . $this->route->baseUrl() . 'login');
            exit();
        }

        $id = $this->filter->int($this->request->post('id'));
        $news = KnowledgeModel::getBy('id', $id);

        if(empty($news) == false){
            KnowledgeModel::delete("id= $id");
            $data['status'] = 'success';
            $data['msg'] = " تم حذف الموضوع رقم " . $id;
            echo json_encode($data);
            exit();
        }
    }

    public function addKnowledge()
    {
        $knowledgeData['title'] = $this->filter->stringStrip($this->request->post('title'));
        $knowledgeData['content'] = $this->filter->stringStrip($this->request->post('content'));


        if (empty($knowledgeData['title']) == true){
            $data['status'] = 'error';
            $data['msg'] = 'فضلا قم بكتابة عنوان الموضوع';
            echo json_encode($data);
            exit();
        }

        if (empty($knowledgeData['content']) == true){
            $data['status'] = 'error';
            $data['msg'] = 'فضلا قم بكتابة محتوى الموضوع';
            echo json_encode($data);
            exit();
        }

        foreach ($knowledgeData as $key => $value) {

            $column[] = $key;
            $columnValue[] = $value;
        }

        KnowledgeModel::insert($column, $columnValue);

        $data['status'] = 'success';
        $data['msg'] = 'تم إضافة الموضوع بنجاح';
        echo json_encode($data);
        exit();

    }


}