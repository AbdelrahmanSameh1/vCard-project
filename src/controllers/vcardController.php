<?php

namespace itrax\controllers;

use itrax\core\controller;
use itrax\core\validation;
use itrax\core\registry;
use itrax\core\saas\contract\Ihost;
use itrax\models\instructorModel;

class vcardController extends controller implements Ihost
{
    public function index()
    {

        // echo assets("vcard");die;
        // echo host_path("vcard");die;

        if (registry::has('user_card_connection')) {
            $data = registry::get("user_card_connection")->select("user", "*")->getRow();
        }

        // print_r($data['color']);die;


        return $this->view("vcard/index", ["title" => "mohamed", "color" => $data['color']]);
    }
}
