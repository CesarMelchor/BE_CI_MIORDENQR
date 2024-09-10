<?php 
namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use App\Models\CategoriaModel;
class Categoria extends ResourceController{

    public function __construct(){
        $this->model = new CategoriaModel();
    }

    public function getAll()
    {
       $categorias = $this->model->findAll();
         return $this->respond($categorias);
    }

    public function create(){
        try {
            $categoria = $this->request->getJSON();
            if ($this->model->insert($categoria)) {
                $categoria->id = $this->model->insertID();
                return $this->respondCreated($categoria);
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
                $categoria = $this->model->find($id);
                if ($categoria == null) {
                    return $this->failNotFound("No se ha encontrado un usuario con el id : ".$id);
                }else{
                    return $this->respond($categoria);
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
                $categoriaVerificado = $this->model->find($id);
                if ($categoriaVerificado == null) {
                    return $this->failNotFound("No se ha encontrado un usuario con el id : ".$id);
                }else{
                    $categoria = $this->request->getJSON();
                    
            if ($this->model->update($id,$categoria)) {
                $categoria->id = $id;
                return $this->respondUpdated($categoria);
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
                $categoriaVerificado = $this->model->find($id);
                if ($categoriaVerificado == null) {
                    return $this->failNotFound("No se ha encontrado un usuario con el id : ".$id);
                }else{
                    
            if ($this->model->delete($id)) {
                return $this->respondDeleted($categoriaVerificado);
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