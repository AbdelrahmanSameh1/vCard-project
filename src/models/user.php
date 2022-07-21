<?php

namespace itrax\models;

use itrax\core\registry;

class user
{
    public function getUserByemailAndPassword($email, $password)
    {
        return registry::get("user_card_connection")->select("user", "*")->where("email", "=", "$email")->andWhere("password", "=", $password)->getRow();
    }
    public function edit($data, $id)
    {
        return registry::get("user_card_connection")->update("user", $data)->where("id", "=", $id)->excute();
    }
    public function getUserData($id)
    {
        return registry::get("user_card_connection")->select("user", "*")->where("id", "=", $id)->getRow();
    }
    public function getUserByName($username)
    {
        return registry::get("user_card_connection")->select("user", "*")->where("name", "=", $username)->getRow();
    }
}
