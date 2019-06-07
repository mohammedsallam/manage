<?php
namespace Controllers;

class MotivationController extends Controller
{
    public $noLoad = [
        'banner'
    ];

    public function home()
    {
        $this->app->container['title'] = 'التحفيز';
        $this->siteView();

    }

}