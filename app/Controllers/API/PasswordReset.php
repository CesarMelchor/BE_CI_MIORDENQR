<?php 
namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use App\Models\PasswordResetModel;
class PasswordReset extends ResourceController{

    public function __construct(){
        $this->model = new PasswordResetModel();
    }

    public function getAll()
    {
       $passwords = $this->model->findAll();
         return $this->respond($passwords);
    }

    public function create(){
        try {
            $password = $this->request->getJSON();
            if ($this->model->insert($password)) {
                $password->id = $this->model->insertID();
                return $this->respondCreated($password);
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
                $password = $this->model->find($id);
                if ($password == null) {
                    return $this->failNotFound("No se ha encontrado un usuario con el id : ".$id);
                }else{
                    return $this->respond($password);
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
                $passwordVerificado = $this->model->find($id);
                if ($passwordVerificado == null) {
                    return $this->failNotFound("No se ha encontrado un usuario con el id : ".$id);
                }else{
                    $password = $this->request->getJSON();
                    
            if ($this->model->update($id,$password)) {
                $password->id = $id;
                return $this->respondUpdated($password);
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
                $passwordVerificado = $this->model->find($id);
                if ($passwordVerificado == null) {
                    return $this->failNotFound("No se ha encontrado un usuario con el id : ".$id);
                }else{
                    
            if ($this->model->delete($id)) {
                return $this->respondDeleted($passwordVerificado);
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