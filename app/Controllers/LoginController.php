<?php

namespace App\Controllers;

use App\Models\UsersModel;

class LoginController extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->loginmodel = new UsersModel();
    }


    public function login()
    {
        return view('login');
    }

}
