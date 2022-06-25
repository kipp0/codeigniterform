<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $autoload['helper'] = array('html');
        $data['title'] = "Join the team!";
        $data['ajax_url'] = base_url('ajax');
        $data['form_Title'] = "Basic Information";
        $data['helper'] = $autoload['helper'];

        return view('templates/header', $data)
        . view('register')
        . view('templates/footer', $data);
    }
}
