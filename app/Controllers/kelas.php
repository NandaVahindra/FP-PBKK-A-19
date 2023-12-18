<?php

namespace App\Controllers;
use App\Models\kelasModel, App\Models\studentModel;
class Kelas extends BaseController
{
    
    protected $student;
    protected $kelas;
    function __construct()
    {
        $this->kelas = new kelasModel();
        $this->student = new studentModel();
    }
    public function index(): string
    {
        $data['kelass'] = $this->kelas->findAll();
        return view('/Kelas/classDashboard', $data);
    }

    public function edit($id): string
    {
        $dataClass = $this->kelas->find($id);
        if (empty($dataClass)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Mahasiswa Tidak ditemukan !');
        }
        $data['kelass'] = $dataClass;
        return view('/Kelas/editClass', $data);
    }
    public function add(): string
    {
        return view('/Kelas/addClass');
    }
    public function addstudent(): string
    {
        return view('/Kelas/addStudent');
    }
    public function viewclass($id): string
    {
        $data['students'] = $this->student->getMahasiswaByClassId($id);
        $data['kelas'] = $this->kelas->find($id);
        return view('/Kelas/viewClass', $data);
      
    }
    public function update($id)
    {
        $this->kelas->update($id, [
            'name' => $this->request->getVar('name'),
            'hari' => $this->request->getVar('hari'),
            'jam' => $this->request->getVar('jam'),
            'ruangan' => $this->request->getVar('ruangan'),
            'semester' => $this->request->getVar('semester'),
            'tahunAjaran' => $this->request->getVar('tahunAjaran')
        ]);
        session()->setFlashdata('message', 'Update Data Kelas Berhasil');
        $data['kelass'] = $this->kelas->findAll();
        return view('/Kelas/classDashboard', $data);
    }
    public function create()
    {
        $this->kelas->insert([
            'name' => $this->request->getVar('name'),
            'hari' => $this->request->getVar('hari'),
            'jam' => $this->request->getVar('jam'),
            'ruangan' => $this->request->getVar('ruangan'),
            'semester' => $this->request->getVar('semester'),
            'tahunAjaran' => $this->request->getVar('tahunAjaran')
        ]);
        session()->setFlashdata('message', 'Tambah Data Kelas Berhasil');
        $data['kelass'] = $this->kelas->findAll();
        return view('/Kelas/classDashboard', $data);
    }
    function delete($id)
    {
        $dataKelas = $this->kelas->find($id);
        if (empty($dataKelas)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak ditemukan !');
        }
        $this->kelas->delete($id);
        session()->setFlashdata('message', 'Delete Data Kelas Berhasil');
        $data['kelass'] = $this->kelas->findAll();
        return view('/Kelas/classDashboard', $data);
    }
}
