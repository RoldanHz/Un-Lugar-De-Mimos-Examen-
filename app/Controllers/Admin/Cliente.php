<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Cliente extends BaseController
{
    public function index()
    {
        //
    }

    public function mostrarcliente()  {

        $clienteModel = model("ClienteModel");
        $data['clientes'] = $clienteModel->findAll();

        return
        view('UnLugarDeMimos/admin/common/headadmin').
        view('UnLugarDeMimos/admin/common/barraadmin').        
        view('UnLugarDeMimos/admin/vistas/clientes/mostrar', $data). 
        view('UnLugarDeMimos/admin/common/footeradmin');  }

    
    public function agregarcliente()  {
        $data['title']= "Agregar Cliente";
        $validation = \Config\Services::validation();
            if (strtolower($this->request->getMethod()) === 'get'){
                //insertamos
                return
                view('UnLugarDeMimos/admin/common/headadmin', $data).
                view('UnLugarDeMimos/admin/common/barraadmin').        
                view('UnLugarDeMimos/admin/vistas/clientes/agregar').
                view('UnLugarDeMimos/admin/common/footeradmin');
            }

            $rules =[
                'nombre' => 'required|max_length[40]',
                'direccion' => 'required',
                'telefono' => 'required|max_length[40]',
                'correo' => 'required|max_length[40]'
            ];
            if (! $this->validate($rules)) {
                return 
                view('UnLugarDeMimos/admin/common/headadmin', $data).
                view('UnLugarDeMimos/admin/common/barraadmin').        
                view('UnLugarDeMimos/admin/vistas/clientes/agregar', ['validation' => $validation]).
                view('UnLugarDeMimos/admin/common/footeradmin');
            }
            else {
                if($this->insertar()){
                    return redirect('UnLugarDeMimos/admin/vistas/clientes/mostrar');
                }
            }
    }

    public function insertar() { 
        $clienteModel = model("ClienteModel");
        $data = [
            "nombre"=> $_POST["nombre"],
            "direccion"=> $_POST["direccion"],
            "telefono"=> $_POST["telefono"],
            "correo_electronico"=> $_POST["correo"]
        ];
        $clienteModel->insert($data, false);
        return true;
    }


    public function editarcliente($id)  {

        $clienteModel = model("ClienteModel");
        $data['cliente'] = $clienteModel->find($id);

        return
        view('UnLugarDeMimos/admin/common/headadmin').
        view('UnLugarDeMimos/admin/common/barraadmin').        
        view('UnLugarDeMimos/admin/vistas/clientes/editar', $data).
        view('UnLugarDeMimos/admin/common/footeradmin');  
    }

    public function buscarcliente() {
        $clienteModel = model('ClienteModel');
        if(isset($_GET['nombre'])){
            $nombre=$_GET['nombre'];
            $direccion=$_GET['direccion'];
            $telefono=$_GET['telefono'];
            $correo=$_GET['correo'];
            $data['clientes']=$clienteModel->like('nombre',$nombre)
            ->like('direccion', $direccion)->like('telefono', $telefono)
            ->like('correo_electronico', $correo)->findAll();
        }
        else{
            $nombre="";
            $data['clientes']=$clienteModel->findAll();
        }
        return
        view('UnLugarDeMimos/admin/common/headadmin').
        view('UnLugarDeMimos/admin/common/barraadmin').        
        view('UnLugarDeMimos/admin/vistas/clientes/buscar', $data).
        view('UnLugarDeMimos/admin/common/footeradmin');
    }

    public function eliminarcliente($id) {
        $clienteModel = model('ClienteModel');
        $clienteModel->delete($id);
        return redirect('UnLugarDeMimos/admin/vistas/clientes/mostrar');
    }

    public function actualizarcliente() {
        $clienteModel = model('ClienteModel');
        $data = array(
            "nombre"=> $_POST['nombre'],
            "direccion"=> $_POST['direccion'],
            "telefono"=> $_POST['telefono'],
            "correo_electronico"=> $_POST['correo']
        ); 
        $clienteModel->update($_POST['id'], $data);
        return redirect('UnLugarDeMimos/admin/vistas/clientes/mostrar');
    }

}

