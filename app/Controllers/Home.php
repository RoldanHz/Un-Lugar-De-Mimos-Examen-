<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return
        view('UnLugarDeMimos/common/head').
        view('UnLugarDeMimos/login').
        view('UnLugarDeMimos/common/footer');
    }
}
