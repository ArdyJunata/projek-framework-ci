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

    public function cartOptions()
    {
        switch ($this->input->get('action')) {
            case "create":
                $id = $this->input->get('id');
                $product = $this->Product_model->getProductById($id);
                $data = [
                    'quantity' => 1,
                    'total' => $product['price'],
                    'product_id' => $id,
                    'user_id' => $this->session->userdata('id_user')
                ];
                $cart = $this->Order_model->cekCartUser($this->session->userdata('id_user'), $id);
                if ($cart) {
                    if ($this->Order_model->updateCartPlus($cart)) {
                        $data['alert'] = 5;
                        $this->session->set_userdata($data);
                        redirect('home');
                    } else {
                        echo "update gagal";
                    }
                } else {
                    if ($this->Order_model->insertCart($data)) {
                        $data['alert'] = 4;
                        $this->session->set_userdata($data);
                        redirect('home');
                    } else {
                        echo "add cart gagal";
                    }
                }
                break;
            case "delete":
                $id = $this->input->get('id');
                if ($this->Order_model->deleteCart($id)) {
                    $data['alert'] = 1;
                    $this->session->set_userdata($data);
                    redirect('/order/cartOptions');
                } else {
                    echo 'delete gagal';
                }
                break;
            case "update":
                $cartId = $this->input->get('cartId');
                $quantity = $this->input->get('quantity');
                $dataUpdate = [
                    'cartId' => $cartId,
                    'quantity' => $quantity
                ];
                if ($this->Order_model->updateCart($dataUpdate)) {
                    $id_user = $this->session->userdata('id_user');
                    $data = [
                        'cartUser' => $this->Order_model->getCartByIdCart($cartId),
                        'total' => $this->Order_model->getTotalHarga($id_user)
                    ];
                    echo json_encode(["status" => 1, "msg" => "Cart Updated", "data" => $data]);
                }
                break;
            default:
                $id_user = $this->session->userdata('id_user');
                $data = [
                    'user' => $this->User_model->getUserById($id_user),
                    'cart' => $this->Order_model->getCountCartByUser($id_user),
                    'cartUser' => $this->Order_model->getCartByIdUser($id_user),
                    'wishlist' => $this->Order_model->getCountWishlistByUser($id_user),
                    'total' => $this->Order_model->getTotalHarga($id_user)
                ];
                $this->load->view('templates/header', $data);
                $this->load->view('home/cart', $data);
                $this->load->view('templates/footer');
                break;
        }
    }

    public function wishlist()
    {
        switch ($this->input->get('action')) {
            case "create":
                $id = $this->input->get('id');
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
                        $data['alert'] = 3;
                        $this->session->set_userdata($data);
                        redirect('home');
                    } else {
                        echo "add wishlist gagal";
                    }
                }
                break;
            case "delete":
                $id = $this->input->get('id');
                if ($this->Order_model->deleteWishlist($id)) {
                    $data['alert'] = 1;
                    $this->session->set_userdata($data);
                    redirect('/order/wishlist');
                } else {
                    echo 'delete gagal';
                }
                break;
            case "addcart":
                $id = $this->input->get('id');
                $pid = $this->input->get('pid');
                $product = $this->Product_model->getProductById($pid);
                $data = [
                    'quantity' => 1,
                    'total' => $product['price'],
                    'product_id' => $pid,
                    'user_id' => $this->session->userdata('id_user')
                ];
                $cart = $this->Order_model->cekCartUser($this->session->userdata('id_user'), $pid);
                if ($cart) {
                    if ($this->Order_model->updateCartPlus($cart)) {
                        $data['alert'] = 2;
                        $this->session->set_userdata($data);
                    } else {
                        echo "update gagal";
                    }
                } else {
                    if ($this->Order_model->insertCart($data)) {
                        $data['alert'] = 2;
                        $this->session->set_userdata($data);
                    } else {
                        echo "add cart gagal";
                    }
                }
                if ($this->Order_model->deleteWishlist($id)) {
                    $data['alert'] = 2;
                    $this->session->set_userdata($data);
                    redirect('/order/cartOptions');
                } else {
                    echo 'add to cart failed';
                }
                break;
            default:
                $id_user = $this->session->userdata('id_user');
                $data = [
                    'user' => $this->User_model->getUserById($id_user),
                    'cart' => $this->Order_model->getCountCartByUser($id_user),
                    'wishlistData' => $this->Order_model->getWishlistByIdUser($id_user),
                    'wishlist' => $this->Order_model->getCountWishlistByUser($id_user),
                    'total' => $this->Order_model->getTotalHarga($id_user)
                ];
                $this->load->view('templates/header', $data);
                $this->load->view('home/wishlist', $data);
                $this->load->view('templates/footer');
                break;
        }
    }
}
