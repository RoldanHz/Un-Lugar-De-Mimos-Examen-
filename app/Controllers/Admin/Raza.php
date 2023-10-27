<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Raza extends BaseController
{
    public function index()
    {
        //
    }

    public function mostrarraza() {

        $razaModel = model("RazaModel");
        $data['razas'] = $razaModel->findAll();

        return
        view('UnLugarDeMimos/admin/common/headadmin'). 
        view('UnLugarDeMimos/admin/common/barraadmin').
        view('UnLugarDeMimos/admin//vistas/razas/mostrar', $data).
        view('UnLugarDeMimos/admin/common/footeradmin');
    }
    public function agregarraza() {
        $data['title']= "Agregar Raza";  
        $especieModel = model('EspecieModel');
        $data['especies'] = $especieModel->findAll();

        $validation = \Config\Services::validation();


            if (strtolower($this->request->getMethod()) === 'get'){
                //insertamos
                return
                view('UnLugarDeMimos/admin/common/headadmin', $data).
                view('UnLugarDeMimos/admin/common/barraadmin').        
                view('UnLugarDeMimos/admin/vistas/razas/agregar').
                view('UnLugarDeMimos/admin/common/footeradmin');
            }

            $rules =[
                'nombre' => 'required|max_length[40]',
                'descripcion' => 'required',
                'especie' => 'required',
            ];

            if (! $this->validate($rules)) {
                return 
                view('UnLugarDeMimos/admin/common/headadmin', $data).
                view('UnLugarDeMimos/admin/common/barraadmin').        
                view('UnLugarDeMimos/admin/vistas/razas/agregar', ['validation' => $validation]).
                view('UnLugarDeMimos/admin/common/footeradmin');
                
            }
            else {
                if($this->insertar()){
                    return redirect('UnLugarDeMimos/admin/vistas/razas/mostrar');
                }
            }
    }

    public function insertar() { 
        $razaModel = model("RazaModel");
        $data = [
            "nombre"=> $_POST["nombre"],
            "descripcion"=> $_POST["descripcion"],
            "especie"=> $_POST["especie"]
        ];
        $razaModel->insert($data, false);
        return true;
    }
    public function editarraza($id) {
        $razaModel = model("RazaModel");
        $data['raza'] = $razaModel->find($id);

        $especieModel = model('EspecieModel');
        $data['especies'] = $especieModel->findAll();

        return
        view('UnLugarDeMimos/admin/common/headadmin').
        view('UnLugarDeMimos/admin/common/barraadmin').        
        view('UnLugarDeMimos/admin/vistas/razas/editar', $data).
        view('UnLugarDeMimos/admin/common/footeradmin');
    }

    public function buscarraza() {
        $razaModel = model('RazaModel');
        if(isset($_GET['nombre'])){
            $nombre=$_GET['nombre'];
            $descripcion=$_GET['descripcion'];
            $especie=$_GET['especie'];
            $data['razas']=$razaModel->like('nombre',$nombre)
            ->like('descripcion', $descripcion)->like('especie', $especie)
            ->findAll();
        }
        else{
            $nombre="";
            $data['razas']=$razaModel->findAll();
        }
        return
        view('UnLugarDeMimos/admin/common/headadmin').
        view('UnLugarDeMimos/admin/common/barraadmin').        
        view('UnLugarDeMimos/admin/vistas/razas/buscar', $data).
        view('UnLugarDeMimos/admin/common/footeradmin');
    }

    public function eliminarraza($id) {
        $razaModel = model('RazaModel');
        $razaModel->delete($id);
        return redirect('UnLugarDeMimos/admin/vistas/razas/mostrar');
    }

    public function actualizarraza() {
        $razaModel = model('RazaModel');
        $data = array(
            "nombre"=> $_POST['nombre'],
            "descripcion"=> $_POST['descripcion'],
            "especie"=> $_POST['especie']
        ); 
        $razaModel->update($_POST['id'], $data);
        return redirect('UnLugarDeMimos/admin/vistas/razas/mostrar');
    }
}

