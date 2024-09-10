<?php 
namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model{
    protected $table      = 'productos';
    protected $primaryKey = 'id';
    protected $returnedType = 'array';
    protected $allowedFields = ['nombre', 'imagen', 'precio', 'descripcion', 'disponible',
     'destacado', 'categoria_id', 'restaurante_id'];
     protected $useTimestamps = true;
     protected $createdField = 'created_at';
     protected $updatedField = 'updated_at';

    
}