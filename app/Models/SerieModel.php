<?php 
namespace App\Models;

use CodeIgniter\Model;

class SerieModel extends Model{
    protected $table      = 'series';
    protected $primaryKey = 'id';
    protected $returnedType = 'array';
    protected $allowedFields = ['clave'];

    
}