<?php

namespace itrax\controllers;

use itrax\core\controller;
use itrax\core\validation;
use itrax\core\registry;
use itrax\core\saas\contract\Ihost;
use itrax\models\instructorModel;

class homeController extends controller implements Ihost
{
    public function index()
    {
        return $this->view("index", ["title" => "mohamed"]);
    }


    public function store()
    {
        // print_r($_POST);die;
        $validation = new validation;

        // $validation->input("username")->integer();
        // $validation->input("username")->required()->max(5)->min(2);


        // $validation->input("username")->required()->email();
        registry::get("validation")->input("username")->required()->email();

        // print_r($validation->showError());
        print_r(registry::get("validation")->showError());
    }
}
