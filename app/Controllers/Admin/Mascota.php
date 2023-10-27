<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Mascota extends BaseController
{
    public function index()
    {
        //
    }

    public function mostrarmascota() {

        $mascotaModel = model("MascotaModel");
        $data['mascotas'] = $mascotaModel->findAll();

        return
        view('UnLugarDeMimos/admin/common/headadmin'). 
        view('UnLugarDeMimos/admin/common/barraadmin').
        view('UnLugarDeMimos/admin//vistas/mascotas/mostrar', $data).
        view('UnLugarDeMimos/admin/common/footeradmin');
    }
    public function agregarmascota() {

        $especieModel = model('EspecieModel');
        $razaModel = model('RazaModel');
        $dietaModel = model('DietaModel');
        $veterinarioModel = model('VeterinarioModel');
        $cuidadoModel = model('CuidadoModel');

        $data['especies'] = $especieModel->findAll();
        $data['razas'] = $razaModel->findAll();
        $data['dietas'] = $dietaModel->findAll();
        $data['veterinarios'] = $veterinarioModel->findAll();
        $data['cuidados'] = $cuidadoModel->findAll();


        $validation = \Config\Services::validation();

            if (strtolower($this->request->getMethod()) === 'get'){
                //insertamos
                return
                view('UnLugarDeMimos/admin/common/headadmin').
                view('UnLugarDeMimos/admin/common/barraadmin').        
                view('UnLugarDeMimos/admin/vistas/mascotas/agregar', $data).
                view('UnLugarDeMimos/admin/common/footeradmin');
            }

            $rules =[
                'nombre' => 'required|max_length[40]',
                'especie' => 'required',
                'raza' => 'required',
                'edad' => 'required',
                'sexo' => 'required',
                'dieta' => 'required',
                'descripcion' => 'required',
                'foto' => 'required',
                'cuidado' => 'required',
                'estado' => 'required',
                'veterinario' => 'required'
            ];

            if (! $this->validate($rules)) {
                return
                view('UnLugarDeMimos/admin/common/headadmin', $data).
                view('UnLugarDeMimos/admin/common/barraadmin').        
                view('UnLugarDeMimos/admin/vistas/mascotas/agregar', ['validation' => $validation]).
                view('UnLugarDeMimos/admin/common/footeradmin');
            }
            else {
                if($this->insertar()){
                    return redirect('UnLugarDeMimos/admin/vistas/mascotas/mostrar');
                }
            }
    }

    public function insertar() {
        $mascotaModel = model("MascotaModel");
        $data = [
            "nombre"=> $_POST["nombre"],
            "especie"=> $_POST["especie"],
            "raza"=> $_POST["raza"],
            "edad"=> $_POST["edad"],
            "sexo"=> $_POST["sexo"],
            "dieta"=> $_POST["dieta"],
            "descripcion"=> $_POST["descripcion"],
            "foto"=> $_POST["foto"],
            "cuidado"=> $_POST["cuidado"],
            "estado_adopcion"=> $_POST["estado"],
            "id_veterinario"=> $_POST["veterinario"],
        ];
        $mascotaModel->insert($data, false);
        return true;
    }
    public function editarmascota($id) {

        $mascotaModel = model("MascotaModel");
        $data['mascota'] = $mascotaModel->find($id);
        $especieModel = model('EspecieModel');
        $razaModel = model('RazaModel');
        $dietaModel = model('DietaModel');
        $veterinarioModel = model('VeterinarioModel');
        $cuidadoModel = model('CuidadoModel');

        $data['especies'] = $especieModel->findAll();
        $data['razas'] = $razaModel->findAll();
        $data['dietas'] = $dietaModel->findAll();
        $data['veterinarios'] = $veterinarioModel->findAll();
        $data['cuidados'] = $cuidadoModel->findAll();

        return
        view('UnLugarDeMimos/admin/common/headadmin').
        view('UnLugarDeMimos/admin/common/barraadmin').        
        view('UnLugarDeMimos/admin/vistas/mascotas/editar', $data).
        view('UnLugarDeMimos/admin/common/footeradmin');
    }

    public function buscarmascota() {
        $mascotaModel = model('mascotaModel');
        if(isset($_GET['nombre'])){
            $nombre=$_GET['nombre'];
            $especie=$_GET['especie'];
            $raza=$_GET['raza'];
            $edad=$_GET['edad'];
            $sexo=$_GET['sexo'];
            $dieta=$_GET['dieta'];
            $descripcion=$_GET['descripcion'];
            $foto=$_GET['foto'];
            $cuidado=$_GET['cuidado'];
            $estado=$_GET['estado'];
            $veterinario=$_GET['veterinario'];
            $data['mascotas']=$mascotaModel->like('nombre',$nombre)
            ->like('especie', $especie)->like('raza', $raza)
            ->like('edad', $edad)->like('sexo', $sexo)->like('dieta', $dieta)
            ->like('descripcion', $descripcion)->like('foto', $foto)->like('cuidado', $cuidado)
            ->like('estado_adopcion', $estado)->like('id_veterinario', $veterinario)
            ->findAll();
        }
        else{
            $nombre="";
            $data['mascotas']=$mascotaModel->findAll();
        }
        return
        view('UnLugarDeMimos/admin/common/headadmin').
        view('UnLugarDeMimos/admin/common/barraadmin').        
        view('UnLugarDeMimos/admin/vistas/mascotas/buscar', $data).
        view('UnLugarDeMimos/admin/common/footeradmin');
    }

    public function eliminarmascota($id) {
        $mascotaModel = model('MascotaModel');
        $mascotaModel->delete($id);
        return redirect('UnLugarDeMimos/admin/vistas/mascotas/mostrar');
    }
    public function actualizarmascota() {
        $mascotaModel = model('MascotaModel');
        $data = array(
            "nombre"=> $_POST['nombre'],
            "especie"=> $_POST['especie'],
            "raza"=> $_POST['raza'],
            "edad"=> $_POST['edad'],
            'sexo'=> $_POST['sexo'],
            'dieta'=> $_POST['dieta'],
            'descripcion'=> $_POST['descripcion'],
            'foto'=> $_POST['foto'],
            'cuidado'=> $_POST['cuidado'],
            'estado_adopcion'=> $_POST['estado'],
            'id_veterinario'=> $_POST['veterinario'],
        ); 
        $mascotaModel->update($_POST['id'], $data);
        return redirect('UnLugarDeMimos/admin/vistas/mascotas/mostrar');
    }
}

