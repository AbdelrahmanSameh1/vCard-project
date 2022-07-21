<?php


namespace itrax\core\saas;

use mysqli;

class saas_helper
{
    public static function handle_hosts($username)        // this function will add the subdomain of the user to the (hosts file) in the windows
    {
        file_put_contents("C:\Windows\System32\drivers\\etc\hosts", "\r\n        127.0.0.1       $username.vcard.test", FILE_APPEND | LOCK_EX);
    }

    public static function generate_database($username)
    {
        // $sql = str_replace("{{username}}", $username, $content);

        $create_database = "CREATE DATABASE `$username`";

        $link = mysqli_connect("localhost", "root", "");
        mysqli_query($link, $create_database);
        static::run_sql($username);
    }


    public static function run_sql($username)
    {
        // echo dirname(__FILE__) . "\database\user_vcard.sql";die;
        $content = file_get_contents(dirname(__FILE__) . "\database\user_vcard.sql");
        // echo $content;die;

        $database = mysqli_connect("localhost", "root", "", $username);
        echo "<pre>";

        // print_r($database);die;

        // mysqli_query($database, $content);
        mysqli_multi_query($database, $content);       // this function run a sql file, but the previous function run a sql query
    }



    public static function saasController()
    {
        $is_saas = (new saas)->isSubDomain();    // short object syntax
        return $is_saas ? 'vcard' : 'home';
    }
}
