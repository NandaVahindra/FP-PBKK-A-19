<?php

namespace App\Models;

use CodeIgniter\Model;

class loginModel extends Model
{
    protected $table = 'user1'; // Replace 'users' with your actual table name
    protected $primaryKey = 'id'; // Replace 'id' with your actual primary key column

    protected $allowedFields = ['uname', 'upwd', 'uemail', 'role']; // Replace with the actual fields in your 'users' table

    public function getUserByUsername($username)
    {
        return $this->where('uemail', $username)->first();
    }
    public function getTotalUsers()
    {
        // Perform a database query to get the total number of users
        return $this->countAll(); // Adjust 'users' to your actual table name
    }
}