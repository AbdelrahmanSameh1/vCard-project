<?php

namespace itrax\core;

use itrax\core\auth\auth;

class controller
{

    use auth;

    public function view($path, $data)
    {
        extract($data);
        require VIEWS . $path . ".php";
    }
}
