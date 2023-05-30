<?php 
namespace App\Models;
use CodeIgniter\Model;

class Model_Auth extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id_users';
    protected $allowedFields = ['nik','foto','nm_instansi','email','no_hp','provinsi','kota', 'password', 'roles','status'];

    
}



