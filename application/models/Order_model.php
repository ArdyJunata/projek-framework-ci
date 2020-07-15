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

    public function updateCart($data)
    {
        $this->db->set('quantity', $data['quantity']);
        $this->db->where('id', $data['cartId']);
        return $this->db->update("cart");
    }

    public function updateCartPlus($data)
    {
        $this->db->set('quantity', $data['quantity'] + 1);
        $this->db->where('id', $data['id']);
        return $this->db->update("cart");
    }

    public function deleteCart($id)
    {
        return $this->db->delete("cart", ['id' => $id]);
    }

    public function deleteWishlist($id)
    {
        return $this->db->delete("wishlist", ['id' => $id]);
    }

    public function getCartByIdUser($id)
    {
        return $this->db->select('products.name, products.image, cart.id, products.price, cart.quantity')
            ->from('cart')
            ->join('products', 'cart.product_id = products.id')
            ->where('cart.user_id', $id)
            ->get()

            ->result_array();
    }
    public function getWishlistByIdUser($id)
    {
        return $this->db->select('products.name, products.id as pid, products.image, wishlist.id, products.price')
            ->from('wishlist')
            ->join('products', 'wishlist.product_id = products.id')
            ->where('wishlist.user_id', $id)
            ->get()
            ->result_array();
    }

    public function getCartByIdCart($id)
    {
        return $this->db->select('products.name, products.image, cart.id, products.price, cart.quantity')
            ->from('cart')
            ->join('products', 'cart.product_id = products.id')
            ->where('cart.id', $id)
            ->get()
            ->row_array();
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
        $query = "select sum(data.prices) as total from ( SELECT quantity * total as prices from cart  where user_id = $id) as data";
        return $this->db->query($query)->row_array();
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
