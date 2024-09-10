<?php 
namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model{
    protected $table      = 'categorias';
    protected $primaryKey = 'id';
    protected $returnedType = 'array';
    protected $allowedFields = ['nombre', 'disponible', 'user_id'];
     protected $useTimestamps = true;
     protected $createdField = 'created_at';
     protected $updatedField = 'updated_at';

    
}