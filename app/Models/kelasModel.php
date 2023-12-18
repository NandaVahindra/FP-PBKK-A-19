<?php

namespace App\Models;

use CodeIgniter\Model;

class kelasModel extends Model
{
    protected $table = 'data_kelas'; // Replace 'users' with your actual table name
    protected $primaryKey = 'id'; // Replace 'id' with your actual primary key column

    protected $allowedFields = ['name', 'hari', 'jam', 'ruangan', 'semester' , 'tahunAjaran']; // Replace with the actual fields in your 'users' table
    public function getTotalKelas()
    {
        // Perform a database query to get the total number of users
        return $this->countAll(); // Adjust 'users' to your actual table name
    }
}