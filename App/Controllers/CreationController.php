<?php
namespace Controllers;


class CreationController extends Controller
{
    public function home()
    {

        $this->app->container['title'] = 'المبادرات التطويرية و الافكار الابداعية';
        $this->siteView();

    }


}