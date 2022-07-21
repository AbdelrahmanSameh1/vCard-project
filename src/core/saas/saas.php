<?php

namespace itrax\core\saas;

use itrax\core\saas\contract\Isaas;
use itrax\core\registry;
use itrax\core\Database\db;

class saas implements Isaas
{

    public function run($subdomain)
    {
        if (count(explode(".", $subdomain)) > 2) {
            $subdomain_database = $this->getSubdomain($subdomain);
            $this->setSubdomain($subdomain_database);
        }
    }



    public function getSubdomain($subdomain)        // this function check if the user has database or not from the main database
    {
        // echo $subdomain;die;
        $userinfo = registry::get("main")->select("users", "database_user")->where("subdomain", "=", $subdomain)->getRow();
        // echo $userinfo;die;
        if (!empty($userinfo)) {
            return $userinfo['database_user'];
        }
        return "user not exist";
    }



    public function setSubdomain($subdomain)      // this function make the connection to a certain user database
    {
        if (!empty($subdomain)) {
            registry::set("user_card_connection", new db($subdomain));
        }
    }


    public function isSubDomain()
    {
        return (count(explode(".", $_SERVER['HTTP_HOST'])) > 2) ? true : false;
    }
}
