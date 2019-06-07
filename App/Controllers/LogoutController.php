<?php
namespace Controllers;

class LogoutController extends Controller
{

    public function home()
    {
        $this->session->destroy();
        header('location:'. $this->route->baseUrl());
        exit();

    }

}