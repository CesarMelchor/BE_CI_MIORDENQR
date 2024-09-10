<?php 
namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use App\Models\SesionModel;
class Sesion extends ResourceController{

    public function __construct(){
        $this->model = new SesionModel();
    }

    public function getAll()
    {
       $sesiones = $this->model->findAll();
         return $this->respond($sesiones);
    }

    public function create(){
        try {
            $sesion = $this->request->getJSON();
            if ($this->model->insert($sesion)) {
                $sesion->id = $this->model->insertID();
                return $this->respondCreated($sesion);
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
                $sesion = $this->model->find($id);
                if ($sesion == null) {
                    return $this->failNotFound("No se ha encontrado un usuario con el id : ".$id);
                }else{
                    return $this->respond($sesion);
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
                $sesionVerificado = $this->model->find($id);
                if ($sesionVerificado == null) {
                    return $this->failNotFound("No se ha encontrado un usuario con el id : ".$id);
                }else{
                    $sesion = $this->request->getJSON();
                    
            if ($this->model->update($id,$sesion)) {
                $sesion->id = $id;
                return $this->respondUpdated($sesion);
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
                $sesionVerificado = $this->model->find($id);
                if ($sesionVerificado == null) {
                    return $this->failNotFound("No se ha encontrado un usuario con el id : ".$id);
                }else{
                    
            if ($this->model->delete($id)) {
                return $this->respondDeleted($sesionVerificado);
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