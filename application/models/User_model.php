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

    public function insertUser($data)
    {
        return $this->db->insert("user", $data);
    }

    public function updateUser($data)
    {
        $this->db->set('name', $data['name']);
        $this->db->set('address', $data['address']);
        $this->db->set('city', $data['city']);
        $this->db->set('province', $data['province']);
        $this->db->where('id', $data['id']);
        return $this->db->update("user");
    }
}
