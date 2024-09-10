<?php 
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $returnedType = 'array';
    protected $allowedFields = ['name', 'email', 'password', 'two_factor_secret', 
    'two_factor_recovery_codes',
     'remember_token', 'current_team_id', 'profile_photo_path', 'status'];
     protected $useTimestamps = true;
     protected $createdField = 'created_at';
     protected $updatedField = 'updated_at';
     protected $emailField = 'email_verified_at';

     public function idLogin($email = null , $pass = null){
        
        
        $builder = $this->db->table($this->table);
        $builder->select("id");
        $builder->where('email' , $email);
        $builder->where('password' , $pass);
        $query = $builder->get();
        return $query->getResult();

     }
    
}