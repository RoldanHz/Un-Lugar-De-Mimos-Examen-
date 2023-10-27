<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Cuidado extends BaseController
{
    public function index()
    {
        //
    }

    public function mostrarcuidado() {

        $cuidadoModel = model("CuidadoModel");
        $data['cuidados'] = $cuidadoModel->findAll();

        return
        view('UnLugarDeMimos/admin/common/headadmin'). 
        view('UnLugarDeMimos/admin/common/barraadmin').
        view('UnLugarDeMimos/admin/vistas/cuidados/mostrar', $data).
        view('UnLugarDeMimos/admin/common/footeradmin');
    }
    public function agregarcuidado() {
        $data['title']= "Agregar Cuidado";

        $validation = \Config\Services::validation();

            if (strtolower($this->request->getMethod()) === 'get'){
                //insertamos
                return
                view('UnLugarDeMimos/admin/common/headadmin', $data).
                view('UnLugarDeMimos/admin/common/barraadmin').        
                view('UnLugarDeMimos/admin/vistas/cuidados/agregar').
                view('UnLugarDeMimos/admin/common/footeradmin');
            }

            $rules =[
                'nombre' => 'required|max_length[40]',
                'descripcion' => 'required',
            ];

            if (! $this->validate($rules)) {
                return 
                view('UnLugarDeMimos/admin/common/headadmin', $data).
                view('UnLugarDeMimos/admin/common/barraadmin').        
                view('UnLugarDeMimos/admin/vistas/cuidados/agregar', ['validation' => $validation]).
                view('UnLugarDeMimos/admin/common/footeradmin');
                
            }
            else {
                if($this->insertar()){
                    return redirect('UnLugarDeMimos/admin/vistas/cuidados/mostrar');
                }
            }
    }


    public function insertar() { 
        $cuidadoModel = model("CuidadoModel");
        $data = [
            "nombre"=> $_POST["nombre"],
            "descripcion"=> $_POST["descripcion"],
        ];
        $cuidadoModel->insert($data, false);
        return true;
    }
    public function editarcuidado($id) {

        $cuidadoModel = model("CuidadoModel");
        $data['cuidado'] = $cuidadoModel->find($id);

        return
        view('UnLugarDeMimos/admin/common/headadmin'). 
        view('UnLugarDeMimos/admin/common/barraadmin').
        view('UnLugarDeMimos/admin/vistas/cuidados/editar', $data).
        view('UnLugarDeMimos/admin/common/footeradmin');
    }

    public function buscarcuidado() {
        $cuidadoModel = model('CuidadoModel');
        if(isset($_GET['nombre'])){
            $nombre=$_GET['nombre'];
            $descripcion=$_GET['descripcion'];
            $data['cuidados']=$cuidadoModel->like('nombre',$nombre)
            ->like('descripcion', $descripcion)->findAll();
        }
        else{
            $nombre="";
            $data['cuidados']=$cuidadoModel->findAll();
        }
        return
        view('UnLugarDeMimos/admin/common/headadmin').
        view('UnLugarDeMimos/admin/common/barraadmin').        
        view('UnLugarDeMimos/admin/vistas/cuidados/buscar', $data).
        view('UnLugarDeMimos/admin/common/footeradmin');
    }


    public function eliminarcuidado($id) { 
        $cuidadoModel = model('CuidadoModel');
        $cuidadoModel->delete($id);
        return redirect('UnLugarDeMimos/admin/vistas/cuidados/mostrar');
    }

    public function actualizarcuidado() {
        $cuidadoModel = model('CuidadoModel');
        $data = array (
            'nombre'=> $_POST['nombre'],
            'descripcion'=> $_POST['descripcion']
        );
        $cuidadoModel->update($_POST['id'],$data);
        return redirect('UnLugarDeMimos/admin/vistas/cuidados/mostrar');
    }
    
}

