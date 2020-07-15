<section class="breadcrumb-section set-bg" data-setbg="<?= base_url() ?>assets/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cartUser as $c) : ?>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img width="150" src="<?= base_url('assets/') ?>img/product/category/<?= $c['image'] ?>" alt="">
                                        <h5><?= $c['name'] ?></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        IDR <?= number_format($c['price']) ?>
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <input size="1" onchange="updateCart(<?= $c['id'] ?>)" id="cart_<?= $c['id'] ?>" type="text" value="<?= $c['quantity'] ?>">
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total" id="total_<?= $c['id'] ?>">
                                        IDR <?= number_format($c['price'] * $c['quantity']) ?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a id="deleteCart" href="<?= base_url() ?>order/cartOptions?action=delete&id=<?= $c['id'] ?>" class="btn btn-danger btn-sm">delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="<?= base_url() ?>home" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">

                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Total <span id="totalPrice">IDR <?= number_format($total['total']) ?></span>
                        </li>
                    </ul>
                    <a href="<?= base_url() ?>order/checkout" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
<script src="<?= base_url('assets') ?>/js/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function updateCart(cartId) {
        var qv = $('#cart_' + cartId).val();
        var quantity = Number(qv);
        console.log(quantity);
        $.ajax({
            url: "<?= base_url() ?>order/cartOptions",
            data: "cartId=" + cartId + "&action=update&quantity=" + quantity,
            method: "get"
        }).done(function(response) {
            var data = JSON.parse(response);
            console.log(data);
            var num = new Intl.NumberFormat("en-US", {
                style: "currency",
                currency: "IDR"
            })
            if (data.status == 0) {
                console.log('gagal update');
            } else {
                $("#total_" + cartId).html(
                    num.format(data.data.cartUser.price * data.data.cartUser.quantity));
                $("#totalPrice").html(num.format(data.data.total.total));
            }
        });
    }
</script>
<?php $this->session->unset_userdata('alert'); ?>