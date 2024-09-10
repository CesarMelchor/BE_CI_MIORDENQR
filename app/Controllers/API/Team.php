<?php 
namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use App\Models\TeamModel;
class Team extends ResourceController{

    public function __construct(){
        $this->model = new TeamModel();
    }

    public function getAll()
    {
       $teams = $this->model->findAll();
         return $this->respond($teams);
    }

    public function create(){
        try {
            $team = $this->request->getJSON();
            if ($this->model->insert($team)) {
                $team->id = $this->model->insertID();
                return $this->respondCreated($team);
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
                $team = $this->model->find($id);
                if ($team == null) {
                    return $this->failNotFound("No se ha encontrado un usuario con el id : ".$id);
                }else{
                    return $this->respond($team);
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
                $teamVerificado = $this->model->find($id);
                if ($teamVerificado == null) {
                    return $this->failNotFound("No se ha encontrado un usuario con el id : ".$id);
                }else{
                    $team = $this->request->getJSON();
                    
            if ($this->model->update($id,$team)) {
                $team->id = $id;
                return $this->respondUpdated($team);
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
                $teamVerificado = $this->model->find($id);
                if ($teamVerificado == null) {
                    return $this->failNotFound("No se ha encontrado un usuario con el id : ".$id);
                }else{
                    
            if ($this->model->delete($id)) {
                return $this->respondDeleted($teamVerificado);
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