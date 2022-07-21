<?php

namespace itrax\controllers;

use itrax\models\user;
use itrax\core\registry;
use itrax\core\controller;
use itrax\core\validation;
use itrax\models\instructorModel;
use itrax\core\saas\contract\Ihost;
use itrax\core\session2;

class authController extends controller
{

    public function login()
    {
        if (!registry::has("user_card_connection")) {
            echo "<h2 style='color:red'>Please enter with your subdomain to login</h2>";
        }
        return $this->view("admin/login", ["title" => "mohamed"]);
    }


    public function postlogin()
    {

        $email = $_POST['email'];
        $password = $_POST['password'];


        $user = new user;
        $res = $user->getUserByemailAndPassword($email, $password);


        if (!empty($res)) {
            $session_result = session2::set("auth", $res);
            redirect("../admin/index");
        } else {
            redirect("login");
        }
    }
}
