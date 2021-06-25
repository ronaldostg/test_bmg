<?php namespace App\Models;

use CodeIgniter\Model;
 
class AdminModel extends Model{
    protected $table = 't_user';
    protected $allowedFields = ['username','password'];
}