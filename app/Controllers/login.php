<?php

namespace App\Controllers;
use App\Models\loginModel;
use App\Models\kelasModel;
use App\Models\studentModel;

class login extends BaseController
{
    protected $user;
    protected $class;
    protected $student;


    function __construct()
    {
        $this->user = new loginModel();
        $this->class = new kelasModel();
        $this->student = new studentModel();
    }
    public function index(): string
    {
        return view('home');
    }

    public function signIn(): string
    {
        // Assuming you are getting the user credentials from a form
        $username = $this->request->getVar('email'); // Make sure 'email' matches the actual form field name
        $password = $this->request->getVar('password');
        // Check if the user exists in the database
        $userData = $this->user->getUserByUsername($username);
    
        if (!$userData || $password !== $userData['upwd']) {
            // Handle authentication failure
            session()->setFlashdata('error', 'Invalid username or password');
            return view('login', ['error' => 'Invalid username or password']);
        }
    
        // Set user session or perform any other necessary actions upon successful login
        // For example: $this->session->set('user_id', $userData['id']);
    
        // Redirect to the home page or any other desired location
        if($userData['role'] == 'admin')
        {
            $data = [
                'email' => $userData['uemail'],
                'role'  => $userData['role'],
                'totalUsers'  => $this->user->getTotalUsers(),
                'totalMahasiswa' => $this->student->getTotalStudents(),
                'totalKelas' => $this->class->getTotalKelas()
            ];
            return view('adminDashboard', $data);
        }
        else
        {
            $data = [
                'email' => $userData['uemail'],
                'role'  => $userData['role'],
            ];
            return view('userDashboard', $data);
        }
            
    }
    public function signUp()
    {
        $this->user->insert([
            'uname' => $this->request->getVar('fullname'),
            'uemail' => $this->request->getVar('email'),
            'upwd' => $this->request->getVar('password'),
            'role' => 'user'
        ]);
        session()->setFlashdata('message', 'Berhasil Register');
        return view('login');
    }

    public function logout()
    {
        return view('home');
    }
}
