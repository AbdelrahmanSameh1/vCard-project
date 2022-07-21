<?php

namespace itrax\controllers;

use itrax\core\controller;
use itrax\core\registry;
use itrax\core\saas\saas_helper;
use itrax\core\saas\saas;
// use itrax\core\validation;

class createController extends controller
{
    public function index()
    {
        $title = "sign up";
        return $this->view("create/signup", ['title' => $title]);
    }



    public function store()
    {
        registry::get("validation")->input("username")->min(2)->max(10)->required();
        registry::get("validation")->input("password")->min(5)->max(20)->required();
        registry::get("validation")->input("email")->email()->required();


        if (registry::get("validation")->success()) {
            // print_r($_POST);

            // this is the creation of user database step
            saas_helper::handle_hosts($_POST['username']);
            saas_helper::generate_database($_POST['username']);


            // insertion of user data in the main database
            registry::get("main")->insert("users", [
                "subdomain" => $_POST['username'] . ".vcard.test",
                "database_user" => $_POST['username']
            ])->excute();



            sleep(1);


            // insertion of user date in his own database
            if (registry::get("main")->select("users", "*")->where("database_user", "=", $_POST['username'])->getRow()) {

                $saas = new saas;
                $saas->setSubdomain($_POST['username']);

                registry::get("user_card_connection")->insert("user", [
                    "name" => $_POST['username'],
                    "email" => $_POST['email'],
                    "password" => $_POST['password']
                ])->excute();
            } else {
                echo "database not exist";
            }





            echo "<h2 style='color:red;'>You created your vCard successfully</h2>" . "<br>";
            echo "<h2 style='color:red;'>Your subdomain is: </h2>" . $_POST['username'] . ".vcard.test";

            echo "<br>";
            echo "<br>";

            echo "<input type='button' value='Home page'>";
        } else {
            registry::get("validation")->showError();
        }
    }
}
