<?php

namespace itrax\controllers;

use itrax\models\user;
use itrax\core\registry;
use itrax\core\session2;
use itrax\core\controller;
use itrax\core\validation;
use itrax\models\instructorModel;
use itrax\core\saas\contract\Ihost;



class adminController extends controller implements Ihost        // note we are forced to write the class name in this way and its file.... because we make that in the code of bootstrap file
{

    public function __construct()
    {
        $this->check();
    }
    public function index()
    {
        $user = new user;
        $data =  $user->getUserData(1);

        return $this->view("admin/home", ["title" => "mohamed", 'data' => $data]);
    }

    public function edit()
    {
        // $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $title = $_POST['title'];
        $phone = $_POST['phone'];
        $whatsapp = $_POST['whatsapp'];


        $user = new user;
        $id = 1;


        $user->edit([
            // "name" => $name,
            "email" => $email,
            "address" => $address,
            "title" => $title,
            "phone" => $phone,
            "whatsapp" => $whatsapp,
        ], $id);

        redirect("index");
    }
}
