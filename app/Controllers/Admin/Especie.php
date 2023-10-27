<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Especie extends BaseController
{
    public function index()
    {
        //
    }

    public function mostrarespecie() {

        $especieModel = model("EspecieModel");
        $data['especies'] = $especieModel->findAll();

        return
        view('UnLugarDeMimos/admin/common/headadmin'). 
        view('UnLugarDeMimos/admin/common/barraadmin').
        view('UnLugarDeMimos/admin/vistas/especies/mostrar', $data).
        view('UnLugarDeMimos/admin/common/footeradmin');
    }
    public function agregarespecie() {
        $data['title']= "Agregar Cliente";

        $validation = \Config\Services::validation();

            if (strtolower($this->request->getMethod()) === 'get'){
                //insertamos
                return
                view('UnLugarDeMimos/admin/common/headadmin', $data).
                view('UnLugarDeMimos/admin/common/barraadmin').        
                view('UnLugarDeMimos/admin/vistas/especies/agregar').
                view('UnLugarDeMimos/admin/common/footeradmin');
            }

            $rules =[
                'nombre' => 'required|max_length[40]',
            ];

            if (! $this->validate($rules)) {
                return 
                view('UnLugarDeMimos/admin/common/headadmin', $data).
                view('UnLugarDeMimos/admin/common/barraadmin').        
                view('UnLugarDeMimos/admin/vistas/especies/agregar', ['validation' => $validation]).
                view('UnLugarDeMimos/admin/common/footeradmin');
                
            }
            else {
                if($this->insertar()){
                    return redirect('UnLugarDeMimos/admin/vistas/especies/mostrar');
                }
            }
    }

    public function insertar() {
        $especieModel = model("EspecieModel");
        $data = [
            "nombre"=> $_POST["nombre"],
        ];
        $especieModel->insert($data, false);
        return true;
    }
    public function editarespecie($id) {
        $especieModel = model("EspecieModel");
        $data['especie'] = $especieModel->find($id);

        return
        view('UnLugarDeMimos/admin/common/headadmin').
        view('UnLugarDeMimos/admin/common/barraadmin').        
        view('UnLugarDeMimos/admin/vistas/especies/editar', $data).
        view('UnLugarDeMimos/admin/common/footeradmin');
    }

    public function buscarespecie() {
        $especieModel = model('EspecieModel');
        if(isset($_GET['nombre'])){
            $nombre=$_GET['nombre'];
            $data['especies']=$especieModel->like('nombre',$nombre)->findAll();
        }
        else{
            $nombre="";
            $data['especies']=$especieModel->findAll();
        }
        return
        view('UnLugarDeMimos/admin/common/headadmin').
        view('UnLugarDeMimos/admin/common/barraadmin').        
        view('UnLugarDeMimos/admin/vistas/especies/buscar', $data).
        view('UnLugarDeMimos/admin/common/footeradmin');
    }  

    public function eliminarespecie($id) {
        $especieModel = model('EspecieModel');
        $especieModel->delete($id);
        return redirect('UnLugarDeMimos/admin/vistas/especies/mostrar');
    }

    public function actualizarespecie() {
        $especieModel = model('EspecieModel');
        $data = array(
            "nombre"=> $_POST['nombre']
        ); 
        $especieModel->update($_POST['id'], $data);
        return redirect('UnLugarDeMimos/admin/vistas/especies/mostrar');
    }
}

