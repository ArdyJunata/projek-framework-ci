<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->model('User_model');
        $this->load->model('Order_model');
        if (!$this->session->userdata('id_user')) {
            redirect('/auth');
        }
    }

    public function orderData()
    {
        $data = [
            'user' => $this->User_model->getUserById($this->session->userdata('id_user'))
        ];
        $this->load->view('admin/header', $data);
        $this->load->view('admin/orderData');
        $this->load->view('admin/footer');
    }

    public function checkout()
    {
        $id_user = $this->session->userdata('id_user');

        $data = [
            'user' => $this->User_model->getUserById($id_user),
            'cart' => $this->Order_model->getCountCartByUser($id_user),
            'wishlist' => $this->Order_model->getCountWishlistByUser($id_user),
            'total' => $this->Order_model->getTotalHarga($id_user),
            'check' => $this->Order_model->getCheckout($id_user)
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('home/checkout', $data);
        $this->load->view('templates/footer');
    }

    public function addOrder($total)
    {
        $id_user = $this->session->userdata('id_user');
        $date = new DateTime();
        $data = [
            'total_price' => $total,
            'date_order' => $date->getTimestamp(),
            'status' => 'payed',
            'user_id' => $id_user
        ];

        if ($this->Order_model->insertOrder($data)) {
            $this->db->delete('cart', array('user_id' => $id_user));
            $data['alert'] = 2;
            $this->session->set_userdata($data);
            redirect('home');
        } else {
            echo "gagal menyimpan orderan";
        }
    }
    public function cart($id)
    {
        // if ($this->Order_model->getCartByUser($this->session->userdata('id_user'), $id)) {

        // }
        $product = $this->Product_model->getProductById($id);
        $data = [
            'quantity' => 1,
            'total' => $product['price'],
            'product_id' => $id,
            'user_id' => $this->session->userdata('id_user')
        ];
        if ($this->Order_model->insertCart($data)) {
            redirect('home');
        } else {
            echo "add cart gagal";
        }
    }

    public function wishlist($id)
    {
        if ($this->Order_model->cekWishlistUser($this->session->userdata('id_user'), $id)) {
            $data['alert'] = 1;
            $this->session->set_userdata($data);
            redirect('home');
        } else {
            $data = [
                'product_id' => $id,
                'user_id' => $this->session->userdata('id_user')
            ];
            if ($this->Order_model->insertWhishlist($data)) {
                $data['alert'] = 0;
                $this->session->set_userdata($data);
                redirect('home');
            } else {
                echo "add wishlist gagal";
            }
        }
    }
}
