<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_model
{
    public function getUserByEmail($email)
    {
        return $this->db->get_where("user", ['email' => $email])->row_array();
    }

    public function getUserById($id)
    {
        return $this->db->get_where("user", ['id' => $id])->row_array();
    }
}
