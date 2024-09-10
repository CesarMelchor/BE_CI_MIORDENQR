<?php 
namespace App\Models;

use CodeIgniter\Model;

class PersonalTokenModel extends Model{
    protected $table      = 'personal_access_tokens';
    protected $primaryKey = 'id';
    protected $returnedType = 'array';
    protected $allowedFields = ['tokenable_type', 'tokenable_id', 'name', 'token', 'abilities',
     'remember_token', 'current_team_id', 'profile_photo_path', 'status'];
     protected $useTimestamps = true;
     protected $createdField = 'created_at';
     protected $updatedField = 'updated_at';
     protected $lastUsedField = 'last_used_at';

    
}