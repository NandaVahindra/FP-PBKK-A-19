<?php

namespace App\Controllers;
use App\Models\studentModel;
use App\Models\userModel;
use App\Models\kelasModel;

class user extends BaseController
{

    protected $user;
    protected $student;
    protected $class;
    function __construct()
    {
        $this->user = new userModel();
        $this->student = new studentModel();
        $this->class = new kelasModel();

    }
    public function index(): string
    {
        return view('userDashboard');
    }

    public function manageuser(): string
    {
        $data['users'] = $this->user->findAll();
        return view('user/manageUser' , $data);
    }

    public function add(): string
    {
        return view('user/addUser');
    }

    public function edit($id): string
    {
        $dataUser = $this->user->find($id);
        if (empty($dataUser)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data User Tidak ditemukan !');
        }
        $data['user'] = $dataUser;
        return view('user/editUser', $data);
    }

    public function update($id)
    {
        $this->user->update($id, [
            'uname' => $this->request->getVar('fullname'),
            'upwd' => $this->request->getVar('pass'),
            'uemail' => $this->request->getVar('email'),
            'role' => $this->request->getVar('role')
        ]);
        session()->setFlashdata('message', 'Update Data user Berhasil');
        $data['users'] = $this->user->findAll();
        return view('user/manageUser', $data);
    }
    public function create()
    {
        $this->user->insert([
            'uname' => $this->request->getVar('name'),
            'upwd' => $this->request->getVar('password'),
            'uemail' => $this->request->getVar('email'),
            'role' => 'user'
        ]);
        session()->setFlashdata('message', 'Tambah Data Mahasiswa Berhasil');
        $data['users'] = $this->user->findAll();
        return view('user/manageUser', $data);
    }

    function delete($id)
    {
        $dataUser = $this->user->find($id);
        if (empty($dataUser)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data User Tidak ditemukan !');
        }
        $this->user->delete($id);
        session()->setFlashdata('message', 'Delete Data User Berhasil');
        $data['users'] = $this->user->findAll();
        return view('user/manageUser', $data);
    }

    public function viewstudent(): string
    {
        $data['students'] = $this->student->findAll();
        return view('user/viewStudent', $data);
    }

    public function viewclass(): string
    {
        $data['kelass'] = $this->class->findAll();
        return view('user/viewClass', $data);
    }

}
