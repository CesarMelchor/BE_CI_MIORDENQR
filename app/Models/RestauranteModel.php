<?php 
namespace App\Models;

use CodeIgniter\Model;

class RestauranteModel extends Model{
    protected $table      = 'restaurantes';
    protected $primaryKey = 'id';
    protected $returnedType = 'array';
    protected $allowedFields = ['nombre', 'nombre_corto', 'imagen', 'telefono', 'direccion',
     'user_id', 'open', 'closed', 'eslogan'];
     protected $useTimestamps = true;
     protected $createdField = 'created_at';
     protected $updatedField = 'updated_at';
     protected $emailField = 'email_verified_at';

    
}