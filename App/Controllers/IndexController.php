<?php
namespace Controllers;


class IndexController extends Controller
{
    public $noLoad = ['content'];

    public function home()
    {
//        if (! $this->session->get('email')){
//            header('location:' . $this->route->baseUrl() . 'login/user');
//            exit();
//        }

        $this->app->container['title'] = 'إدارة الشؤون العلمية والفكرية النسائية';
        $this->siteView();

    }

}