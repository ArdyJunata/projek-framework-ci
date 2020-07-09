<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_model
{
    public function getProductByCategory($category_id)
    {
        return $this->db->get_where("products", ['category_id' => $category_id])->result_array();
    }

    public function getProductById($id)
    {
        return $this->db->get_where("products", ['id' => $id])->row_array();
    }
}
