<?php
namespace Controllers;

class StandardController extends Controller
{
    public $noLoad = [
        'banner'
    ];

    public function home()
    {

        $this->app->container['title'] = 'معايير اختيار الأفكار';
        $this->siteView();

    }

}