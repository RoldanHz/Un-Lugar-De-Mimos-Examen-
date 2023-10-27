<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dieta extends BaseController
{
    public function index()
    {
        //
    }

    public function mostrardieta() {

        $dietaModel = model("DietaModel");
        $data['dietas'] = $dietaModel->findAll();

        return
        view('UnLugarDeMimos/admin/common/headadmin'). 
        view('UnLugarDeMimos/admin/common/barraadmin').
        view('UnLugarDeMimos/admin/vistas/dietas/mostrar', $data).
        view('UnLugarDeMimos/admin/common/footeradmin');
    }
    public function agregardieta() {
        $data['title']= "Agregar Cliente";

        $validation = \Config\Services::validation();

            if (strtolower($this->request->getMethod()) === 'get'){
                //insertamos
                return
                view('UnLugarDeMimos/admin/common/headadmin', $data).
                view('UnLugarDeMimos/admin/common/barraadmin').        
                view('UnLugarDeMimos/admin/vistas/dietas/agregar').
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
                view('UnLugarDeMimos/admin/vistas/dietas/agregar', ['validation' => $validation]).
                view('UnLugarDeMimos/admin/common/footeradmin');
                
            }
            else {
                if($this->insertar()){
                    return redirect('UnLugarDeMimos/admin/vistas/dietas/mostrar');
                }
            }
    }
    public function insertar() {
        $dietaModel = model("DietaModel");
        $data = [
            "nombre"=> $_POST["nombre"],
            "descripcion"=> $_POST["descripcion"]
        ];
        $dietaModel->insert($data, false);
        return true;
    }
    public function editardieta($id) {
        $dietaModel = model("DietaModel");
        $data['dieta'] = $dietaModel->find($id);

        return
        view('UnLugarDeMimos/admin/common/headadmin').
        view('UnLugarDeMimos/admin/common/barraadmin').        
        view('UnLugarDeMimos/admin/vistas/dietas/editar', $data).
        view('UnLugarDeMimos/admin/common/footeradmin');
    }

    public function buscardieta() {
        $dietaModel = model('DietaModel');
        if(isset($_GET['nombre'])){
            $nombre=$_GET['nombre'];
            $descripcion=$_GET['descripcion'];
            $data['dietas']=$dietaModel->like('nombre',$nombre)
            ->like('descripcion', $descripcion)->findAll();
        }
        else{
            $nombre="";
            $data['dietas']=$dietaModel->findAll();
        }
        return
        view('UnLugarDeMimos/admin/common/headadmin').
        view('UnLugarDeMimos/admin/common/barraadmin').        
        view('UnLugarDeMimos/admin/vistas/dietas/buscar', $data).
        view('UnLugarDeMimos/admin/common/footeradmin');
    }

    public function eliminardieta($id) {
        $dietaModel = model('DietaModel');
        $dietaModel->delete($id);
        return redirect('UnLugarDeMimos/admin/vistas/dietas/mostrar');
    }

    public function actualizardieta() {
        $dietaModel = model('DietaModel');
        $data = array(
            "nombre"=> $_POST['nombre'],
            "descripcion"=> $_POST['descripcion']
        ); 
        $dietaModel->update($_POST['id'], $data);
        return redirect('UnLugarDeMimos/admin/vistas/dietas/mostrar');
    }
}

