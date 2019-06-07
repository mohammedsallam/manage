<?php
namespace Controllers;

class centIdeaController extends Controller
{
    public $noLoad = [
//        'slider'
    ];

    public function home()
    {
//        if (! $this->session->get('email')){
//            header('location:' . $this->route->baseUrl() . 'login/user');
//            exit();
//        }

        $this->app->container['title'] = 'فكرة المركز';
        $this->siteView();

    }

}