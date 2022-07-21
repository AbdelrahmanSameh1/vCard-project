<?php

namespace itrax\core\auth;

use itrax\core\session2;

trait auth
{

    public function check()
    {
        if (session2::has("auth") == false) {     // here we check if the session (auth) is empty or not
            exit("<h1 style='color:red;text-align:center;'>you should login to access this page</h1>");
        }
    }
}
