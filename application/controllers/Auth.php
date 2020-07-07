<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        if ($this->input->post()) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->User_model->getUserByEmail($email);

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $data['id_user'] = $user['id'];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == "2") {
                        redirect('/admin');
                    } else {
                        redirect('/home');
                    }
                } else {
                    $data = [
                        'alert' => '1'
                    ];
                    $this->load->view('admin/login', $data);
                }
            } else {
                $data = [
                    'alert' => '2'
                ];
                $this->load->view('admin/login', $data);
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function signup()
    {
        $this->load->view('admin/signup');
    }

    public function logout()
    {
        $this->session->unset_userdata('id_user');
        redirect('/auth');
    }
}
