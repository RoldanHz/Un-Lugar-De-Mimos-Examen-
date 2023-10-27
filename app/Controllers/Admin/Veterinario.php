<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Veterinario extends BaseController
{
    public function index()
    {
        //
    }

    public function mostrarveterinario() {

        $veterinarioModel = model("VeterinarioModel");
        $data['veterinarios'] = $veterinarioModel->findAll();

        return
        view('UnLugarDeMimos/admin/common/headadmin'). 
        view('UnLugarDeMimos/admin/common/barraadmin').
        view('UnLugarDeMimos/admin//vistas/veterinarios/mostrar', $data).
        view('UnLugarDeMimos/admin/common/footeradmin');
    }
    public function agregarveterinario() {

        $data['title']= "Agregar Veterinario";

        $validation = \Config\Services::validation();

            if (strtolower($this->request->getMethod()) === 'get'){
                //insertamos
                return
                view('UnLugarDeMimos/admin/common/headadmin', $data).
                view('UnLugarDeMimos/admin/common/barraadmin').        
                view('UnLugarDeMimos/admin/vistas/veterinarios/agregar').
                view('UnLugarDeMimos/admin/common/footeradmin');
            }

            $rules =[
                'nombre' => 'required|max_length[40]',
                'direccion' => 'required',
                'telefono' => 'required',
            ];

            if (! $this->validate($rules)) {
                return 
                view('UnLugarDeMimos/admin/common/headadmin', $data).
                view('UnLugarDeMimos/admin/common/barraadmin').        
                view('UnLugarDeMimos/admin/vistas/veterinarios/agregar', ['validation' => $validation]).
                view('UnLugarDeMimos/admin/common/footeradmin');
                
            }
            else {
                if($this->insertar()){
                    return redirect('UnLugarDeMimos/admin/vistas/veterinarios/mostrar');
                }
            }
    }
    public function insertar() { 
        $veterinarioModel = model("VeterinarioModel");
        $data = [
            "nombre"=> $_POST["nombre"],
            "direccion"=> $_POST["direccion"],
            "telefono"=> $_POST["telefono"],
        ];
        $veterinarioModel->insert($data, false);
        return true;
    }
    public function editarveterinario($id) {
        $veterinarioModel = model("VeterinarioModel");
        $data['veterinario'] = $veterinarioModel->find($id);

        return
        view('UnLugarDeMimos/admin/common/headadmin').
        view('UnLugarDeMimos/admin/common/barraadmin').        
        view('UnLugarDeMimos/admin/vistas/veterinarios/editar', $data).
        view('UnLugarDeMimos/admin/common/footeradmin');
    }

    public function buscarveterinario() {
        $veterinarioModel = model('VeterinarioModel');
        if(isset($_GET['nombre'])){
            $nombre=$_GET['nombre'];
            $direccion=$_GET['direccion'];
            $telefono=$_GET['telefono'];
            $data['veterinarios']=$veterinarioModel->like('nombre',$nombre)
            ->like('direccion', $direccion)->like('telefono', $telefono)
            ->findAll();
        }
        else{
            $nombre="";
            $data['veterinarios']=$veterinarioModel->findAll();
        }
        return
        view('UnLugarDeMimos/admin/common/headadmin').
        view('UnLugarDeMimos/admin/common/barraadmin').        
        view('UnLugarDeMimos/admin/vistas/veterinarios/buscar', $data).
        view('UnLugarDeMimos/admin/common/footeradmin');
    }

    public function eliminarveterinario($id) {
        $veterinarioModel = model('VeterinarioModel');
        $veterinarioModel->delete($id);
        return redirect('UnLugarDeMimos/admin/vistas/veterinarios/mostrar');
    }

    public function actualizarveterinario() {
        $veterinarioModel = model('VeterinarioModel');
        $data = array(
            "nombre"=> $_POST['nombre'],
            "direccion"=> $_POST['direccion'],
            "telefono"=> $_POST['telefono']
        ); 
        $veterinarioModel->update($_POST['id'], $data);
        return redirect('UnLugarDeMimos/admin/vistas/veterinarios/mostrar');
    }
}

