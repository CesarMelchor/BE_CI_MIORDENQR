<?php 
namespace App\Models;

use CodeIgniter\Model;

class PasswordResetModel extends Model{
    protected $table      = 'passwords_resets';
    protected $returnedType = 'array';
    protected $allowedFields = ['email', 'token'];
     protected $useTimestamps = true;
     protected $createdField = 'created_at';

    
}