<?php

namespace App\Models;


use CodeIgniter\Model;

class studentModel extends Model
{
    protected $table = 'datamahasiswa'; // Replace 'users' with your actual table name
    protected $primaryKey = 'id'; // Replace 'id' with your actual primary key column

    protected $allowedFields = ['name', 'email', 'NRP', 'Batch', 'Major']; // Replace with the actual fields in your 'users' table

    public function getMahasiswaByClassId($classId)
    {
        $sql = "SELECT * FROM datamahasiswa 
                JOIN class_student ON class_student.mahasiswa_id = datamahasiswa.id
                WHERE class_student.kelas_id = ?";

        $query = $this->db->query($sql, [$classId]);

        return $query->getResultArray();
    }
    public function getTotalStudents()
    {
        // Perform a database query to get the total number of users
        return $this->countAll(); // Adjust 'users' to your actual table name
    }
}