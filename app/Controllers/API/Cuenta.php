<?php 
namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use App\Models\CuentaModel;
class Cuenta extends ResourceController{

    public function __construct(){
        $this->model = new CuentaModel();
    }

    public function getAll()
    {
       $cuentas = $this->model->findAll();
         return $this->respond($cuentas);
    }

    public function create(){
        try {
            $cuenta = $this->request->getJSON();
            if ($this->model->insert($cuenta)) {
                $cuenta->id = $this->model->insertID();
                return $this->respondCreated($cuenta);
            } else{
                return $this->failValidationErrors($this->model->validation->listErrors());
            }
        } catch (\Exception $e) {
            return $this->failServerError("Ha ocurrido un error en el servidor");
        }
    }

    
    public function detail($id = null){
        try {
            if ($id == null) {
                return $this->failServerError("No se ha encontrado un ID válido");
            }else{
                $cuenta = $this->model->find($id);
                if ($cuenta == null) {
                    return $this->failNotFound("No se ha encontrado un usuario con el id : ".$id);
                }else{
                    return $this->respond($cuenta);
                }
            }
        } catch (\Exception $e) {
            return $this->failServerError("Ha ocurrido un error en el servidor");
        }
    }

    public function update($id = null){
        try {
            if ($id == null) {
                return $this->failServerError("No se ha encontrado un ID válido");
            }else{
                $cuentaVerificado = $this->model->find($id);
                if ($cuentaVerificado == null) {
                    return $this->failNotFound("No se ha encontrado un usuario con el id : ".$id);
                }else{
                    $cuenta = $this->request->getJSON();
                    
            if ($this->model->update($id,$cuenta)) {
                $cuenta->id = $id;
                return $this->respondUpdated($cuenta);
            } else{
                return $this->failValidationErrors($this->model->validation->listErrors());
            }

                }
            }
        } catch (\Exception $e) {
            return $this->failServerError("Ha ocurrido un error en el servidor");
        }
    }


    public function delete($id = null){
        try {
            if ($id == null) {
                return $this->failServerError("No se ha encontrado un ID válido");
            }else{
                $cuentaVerificado = $this->model->find($id);
                if ($cuentaVerificado == null) {
                    return $this->failNotFound("No se ha encontrado un usuario con el id : ".$id);
                }else{
                    
            if ($this->model->delete($id)) {
                return $this->respondDeleted($cuentaVerificado);
            } else{
                
            return $this->failServerError("No se ha podido eliminar el usuario");
            }

                }
            }
        } catch (\Exception $e) {
            return $this->failServerError("Ha ocurrido un error en el servidor");
        }
    }
    
}