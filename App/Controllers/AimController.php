<?php
namespace Controllers;

class AimController extends Controller
{
    public $noLoad = [
        'banner'
    ];

    public function home()
    {

        $this->app->container['title'] = 'أهداف المركز';
        $this->siteView();

    }

}