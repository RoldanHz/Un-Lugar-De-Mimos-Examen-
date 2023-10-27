<?php

namespace App\Controllers;

class Principal extends BaseController
{
    public function inicio()
    {
        return
        view('UnLugarDeMimos/admin/common/headadmin').
        view('UnLugarDeMimos/admin/common/barraadmin').        
        view('UnLugarDeMimos/admin/inicio').
        view('UnLugarDeMimos/admin/common/footeradmin');
    }
    public function verBD() {
        return
        view('UnLugarDeMimos/basededatos');
    }
}
