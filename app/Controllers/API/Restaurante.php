<?php 
namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use App\Models\RestauranteModel;
class Restaurante extends ResourceController{

    public function __construct(){
        $this->model = new RestauranteModel();
    }

    public function getAll()
    {
       $restaurantes = $this->model->findAll();
         return $this->respond($restaurantes);
    }

    public function create(){
        try {
            $restaurante = $this->request->getJSON();
            if ($this->model->insert($restaurante)) {
                $restaurante->id = $this->model->insertID();
                return $this->respondCreated($restaurante);
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
                $restaurante = $this->model->find($id);
                if ($restaurante == null) {
                    return $this->failNotFound("No se ha encontrado un usuario con el id : ".$id);
                }else{
                    return $this->respond($restaurante);
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
                $restauranteVerificado = $this->model->find($id);
                if ($restauranteVerificado == null) {
                    return $this->failNotFound("No se ha encontrado un usuario con el id : ".$id);
                }else{
                    $restaurante = $this->request->getJSON();
                    
            if ($this->model->update($id,$restaurante)) {
                $restaurante->id = $id;
                return $this->respondUpdated($restaurante);
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
                $restauranteVerificado = $this->model->find($id);
                if ($restauranteVerificado == null) {
                    return $this->failNotFound("No se ha encontrado un usuario con el id : ".$id);
                }else{
                    
            if ($this->model->delete($id)) {
                return $this->respondDeleted($restauranteVerificado);
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