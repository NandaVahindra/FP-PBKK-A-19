<?php

namespace App\Models;

use CodeIgniter\Model;

class userModel extends Model
{
    protected $table = 'datamahasiswa'; // Replace 'users' with your actual table name
    protected $primaryKey = 'id'; // Replace 'id' with your actual primary key column

    protected $allowedFields = ['name', 'email', 'NRP', 'Batch', 'Major']; // Replace with the actual fields in your 'users' table
}