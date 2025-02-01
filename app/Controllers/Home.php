<?php

namespace App\Controllers;

use App\Models\Dashboard_model;

class Home extends BaseController
{

    public function __construct()
    {
        $this->dashboard_model = new Dashboard_model();
    }

    public function index()
    {
        $data['total_pengurus']       = $this->dashboard_model->getCountPengurus();
        $data['total_imam']           = $this->dashboard_model->getCountImam();
        $data['total_bilal']          = $this->dashboard_model->getCountBilal();
        $data['total_khotib']         = $this->dashboard_model->getCountKhotib();
        $data['total_marbot']         = $this->dashboard_model->getCounMarbot();
        $data['total_muazin']         = $this->dashboard_model->getCountMuazin();
        $data['total_remaja']         = $this->dashboard_model->getCountRemaja();
        $data['total_ynz']            = $this->dashboard_model->getCountYnz();



        return view('dashboard',  $data);
    }

    public function login(){return view('login');}
    public function profile(){return view('profile');}
    public function faq(){return view('faq');}
    public function blank(){return view('blank');}
    public function notfound(){return view('404');}
    public function register(){return view('register');}
    public function contact(){return view('contact');}
}
