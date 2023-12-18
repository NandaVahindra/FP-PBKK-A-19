<?php

namespace App\Models;

use CodeIgniter\Model;

class studentClassModel extends Model
{
    protected $table = 'class_student'; // Replace 'users' with your actual table name
    protected $allowedFields = ['mahasiswa_id', 'kelas_id']; // Replace with the actual fields in your 'users' table
}