<?php

namespace App\Controllers;
use App\Models\studentModel;

class student extends BaseController
{
    protected $student;
    function __construct()
    {
        $this->student = new studentModel();
    }
    public function index(): string
    {
        $data['students'] = $this->student->findAll();
        return view('student/manageStudent', $data);
    }

    public function edit($id): string
    {
        $dataStudent = $this->student->find($id);
        if (empty($dataStudent)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Mahasiswa Tidak ditemukan !');
        }
        $data['student'] = $dataStudent;
        return view('student/editStudent', $data);
    }
    public function add(): string
    {
        return view('student/addStudent');
    }

    public function update($id)
    {
        $this->student->update($id, [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'NRP' => $this->request->getVar('NRP'),
            'Batch' => $this->request->getVar('Batch'),
            'Major' => $this->request->getVar('Major')
        ]);
        session()->setFlashdata('message', 'Update Data Mahasiswa Berhasil');
        $data['students'] = $this->student->findAll();
        return view('student/manageStudent', $data);
    }

    public function create()
    {
        $this->student->insert([
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'NRP' => $this->request->getVar('NRP'),
            'Batch' => $this->request->getVar('Batch'),
            'Major' => $this->request->getVar('Major')
        ]);
        session()->setFlashdata('message', 'Tambah Data Mahasiswa Berhasil');
        $data['students'] = $this->student->findAll();
        return view('student/manageStudent', $data);
    }

    function delete($id)
    {
        $dataStudent = $this->student->find($id);
        if (empty($dataStudent)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak ditemukan !');
        }
        $this->student->delete($id);
        session()->setFlashdata('message', 'Delete Data Mahasiswa Berhasil');
        $data['students'] = $this->student->findAll();
        return view('student/manageStudent', $data);
    }

    
}