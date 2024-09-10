<?php 
namespace App\Models;

use CodeIgniter\Model;

class CuentaModel extends Model{
    protected $table      = 'cuentas';
    protected $primaryKey = 'id';
    protected $returnedType = 'array';
    protected $allowedFields = ['user_id', 'clave'];
     protected $useTimestamps = true;
     protected $createdField = 'created_at';
     protected $updatedField = 'updated_at';

    
}