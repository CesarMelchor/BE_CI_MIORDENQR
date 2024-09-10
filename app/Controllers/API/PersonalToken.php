<?php 
namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use App\Models\PersonalTokenModel;
class PersonalToken extends ResourceController{

    public function __construct(){
        $this->model = new PersonalTokenModel();
    }

    public function getAll()
    {
       $tokens = $this->model->findAll();
         return $this->respond($tokens);
    }

    public function create(){
        try {
            $token = $this->request->getJSON();
            if ($this->model->insert($token)) {
                $token->id = $this->model->insertID();
                return $this->respondCreated($token);
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
                $token = $this->model->find($id);
                if ($token == null) {
                    return $this->failNotFound("No se ha encontrado un usuario con el id : ".$id);
                }else{
                    return $this->respond($token);
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
                $tokenVerificado = $this->model->find($id);
                if ($tokenVerificado == null) {
                    return $this->failNotFound("No se ha encontrado un usuario con el id : ".$id);
                }else{
                    $token = $this->request->getJSON();
                    
            if ($this->model->update($id,$token)) {
                $token->id = $id;
                return $this->respondUpdated($token);
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
                $tokenVerificado = $this->model->find($id);
                if ($tokenVerificado == null) {
                    return $this->failNotFound("No se ha encontrado un usuario con el id : ".$id);
                }else{
                    
            if ($this->model->delete($id)) {
                return $this->respondDeleted($tokenVerificado);
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