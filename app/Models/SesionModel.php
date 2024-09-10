<?php 
namespace App\Models;

use CodeIgniter\Model;

class SesionModel extends Model{
    protected $table      = 'sessions';
    protected $primaryKey = 'id';
    protected $returnedType = 'array';
    protected $allowedFields = ['user_id', 'ip_address', 'user_agent', 'payload', 'last_activity'];

    
}