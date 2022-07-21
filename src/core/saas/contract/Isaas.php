<?php


namespace itrax\core\saas\contract;


interface Isaas
{
    public function run($subdomain);
    public function getSubdomain($subdomain);
    public function setSubdomain($subdomain);
}
