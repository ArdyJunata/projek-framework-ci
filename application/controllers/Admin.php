<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        if (!$this->session->userdata('id_user')) {
            redirect('/auth');
        }
    }

    public function index()
    {
        $data = [
            'user' => $this->User_model->getUserById($this->session->userdata('id_user'))
        ];
        $this->load->view('admin/header', $data);
        $this->load->view('admin/index');
        $this->load->view('admin/footer');
    }

    public function userData()
    {
        $data = [
            'user' => $this->User_model->getUserById($this->session->userdata('id_user'))
        ];
        $this->load->view('admin/header', $data);
        $this->load->view('admin/userData');
        $this->load->view('admin/footer');
    }

    public function adminData()
    {
        $data = [
            'user' => $this->User_model->getUserById($this->session->userdata('id_user'))
        ];
        $this->load->view('admin/header', $data);
        $this->load->view('admin/adminData');
        $this->load->view('admin/footer');
    }
}
