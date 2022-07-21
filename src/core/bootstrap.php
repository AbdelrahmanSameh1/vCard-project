<?php

// this file will handle the url and run the application

namespace itrax\core;

use itrax\core\saas\saas;
use itrax\core\saas\saas_helper;
use itrax\core\Session;
use itrax\core\session2;

class bootstrap
{

    private $controller;
    private $method;
    private $params = [];

    public function __construct()
    {
        $this->run();
        $this->url();
        $this->render();
    }

    private function url()
    {
        // print_r($_SERVER['QUERY_STRING']);die;

        $saas_controller = saas_helper::saasController();

        $url = explode("/", $_SERVER['QUERY_STRING']);

        //controller
        $this->controller = !empty($url[0]) ? $url[0] : $saas_controller;
        // echo $this->controller;die;       // this line for debugging

        //method
        $this->method = !empty($url[1]) ? $url[1] : "index";
        // echo $this->method;die;

        //params
        unset($url[0], $url[1]);
        $this->params = array_values($url);
        // print_r($url);
    }

    private function render() // this function will bootstraping the project
    {
        $controller = "itrax\\controllers\\" . $this->controller . "Controller";

        // echo $this->controller;
        // echo $this->method;die;

        if (class_exists($controller)) {
            // echo $controller . "<br>";
            $controller = new $controller;
            if (method_exists($controller, $this->method)) {
                call_user_func_array([$controller, $this->method], $this->params);
            }
        }
    }


    public function run()
    {
        session2::start();
        //$session->kill();
    }
}
