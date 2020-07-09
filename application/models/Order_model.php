<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends CI_model
{
    public function cekCartUser($id, $product)
    {
        return $this->db->get_where("cart", array('product_id' => $product, 'user_id' => $id))->row_array();
    }

    public function cekWishlistUser($id, $product)
    {
        return $this->db->get_where("wishlist", array('product_id' => $product, 'user_id' => $id))->row_array();
    }

    public function insertCart($data)
    {
        return $this->db->insert("cart", $data);
    }

    public function insertWhishlist($data)
    {
        return $this->db->insert("wishlist", $data);
    }

    public function insertOrder($data)
    {
        return $this->db->insert("order", $data);
    }

    public function getCountCartByUser($id)
    {
        return $this->db->where(['user_id' => $id])->from("cart")->count_all_results();
    }

    public function getCountWishlistByUser($id)
    {
        return $this->db->where(['user_id' => $id])->from("wishlist")->count_all_results();
    }

    public function getTotalHarga($id)
    {
        $this->db->select_sum('total');
        $this->db->from('cart');
        $this->db->where('user_id', $id);
        return $this->db->get()->row_array();
    }

    public function getCheckout($id)
    {
        $this->db->select('*');
        $this->db->where('user_id', $id);
        $this->db->from('cart');
        $this->db->join('products', 'products.id = cart.product_id');
        return $this->db->get()->result_array();
    }
}
