<?php

namespace App\Models;

use CodeIgniter\Model;

class userModel extends Model
{
    protected $table = 'user1'; // Replace 'users' with your actual table name
    protected $primaryKey = 'id'; // Replace 'id' with your actual primary key column

    protected $allowedFields = ['uname', 'upwd', 'uemail', 'role']; // Replace with the actual fields in your 'users' table
}