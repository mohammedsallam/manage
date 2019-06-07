<?php
namespace Controllers;

use Models\NewsModel;

class NewsController extends Controller
{
    public $noLoad = [
        'banner'
    ];

    public function show()
    {
        if (! $this->session->has('admin_email')){
            header('location:' . $this->route->baseUrl());
            exit();
        }

        $this->app->container['title'] = 'عرض الأخبار';
        $this->app->container['news'] = NewsModel::getAll();
        $this->adminView();
    }

    public function add()
    {
        if (! $this->session->get('admin_email')){
            header('location:' . $this->route->baseUrl());
            exit();
        }

        $this->app->container['title'] = 'إضافة خبر';
        $this->adminView();
    }

    public function delete()
    {
        if (! $this->session->get('admin_email')){
            header('location:' . $this->route->baseUrl() . 'login');
            exit();
        }

        $id = $this->filter->int($this->request->post('id'));
        $news = NewsModel::getBy('id', $id);

        if(empty($news) == false){
            NewsModel::delete("id= $id");
            $data['status'] = 'success';
            $data['msg'] = " تم حذف الخبر رقم " . $id;
            echo json_encode($data);
            exit();
        }
    }

    public function addNew()
    {
        $newData['news_title'] = $this->filter->stringStrip($this->request->post('news_title'));
        $newData['news_content'] = $this->filter->stringStrip($this->request->post('news_content'));


        if (empty($newData['news_title']) == true){
            $data['status'] = 'error';
            $data['msg'] = 'فضلا قم بكتابة عنوان الخبر';
            echo json_encode($data);
            exit();
        }

        if (empty($newData['news_content']) == true){
            $data['status'] = 'error';
            $data['msg'] = 'فضلا قم بكتابة محتوى الخبر';
            echo json_encode($data);
            exit();
        }

        foreach ($newData as $key => $value) {

            $column[] = $key;
            $columnValue[] = $value;
        }

        NewsModel::insert($column, $columnValue);

        $data['status'] = 'success';
        $data['msg'] = 'تم إضافة الخبر بنجاح';
        echo json_encode($data);
        exit();

    }

    public function more()
    {
        $id = $this->filter->int($this->app->params);
        $this->app->container['title'] = 'تفاصيل الخبر';

        $new = NewsModel::getBy('id', $id);

        if($new != null){

            $this->app->container['new'] = $new;
        } else {
            header('location:'. $this->route->baseUrl());

            exit();
        }


        $this->siteView();

    }

}