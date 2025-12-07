<?php

namespace PROJECT\Controllers;
use PROJECT\Services\Session_service;
use PROJECT\Models\User;


class User_controller
{
    public function login(array $data)
    {
        if(empty($data['username']))
        {
            die("Please provide username");
        }

        if(empty($data['password']))
        {
            die("Please provide password");
        }

        $username = trim($data['username']);
        $username_lower = strtolower($username);
        $password = trim($data['password']);
        
        $user = new User();

        $user_data = $user -> get_user_by_username($username_lower);

        if(!$user_data)
        {
            die ("User does not exists");
        }

        $password_verify = password_verify($password,$user_data['password']);

        if(!$password_verify)
        {
            die ("Password does not match!");
        }

        $session = new Session_service;
        $session -> set_session("user_id",$user_data["id"]);

        switch($user_data['role'])
        {
            case "user":
                $session -> set_session("logedin",true);
                header ("location: user_dashboard.php");
                exit;

            case "admin":
                $session -> set_session("logedin_admin",true);
                header ("location: admin_dashboard.php");
                exit;

            default:
                die ("Uknown user role");
        }
        
    }
}
