<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?= base_url() ?>assets/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Wishlist</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Wishlist</span>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($wishlistData as $c) : ?>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img width="150" src="<?= base_url('assets/') ?>img/product/category/<?= $c['image'] ?>" alt="">
                                        <h5><?= $c['name'] ?></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        IDR <?= number_format($c['price']) ?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a href="<?= base_url() ?>order/wishlist?action=addcart&pid=<?= $c['pid'] ?>&id=<?= $c['id'] ?>" class="btn btn-primary btn-sm">add to cart</a>
                                        <a id="deleteCart" href="<?= base_url() ?>order/wishlist?action=delete&id=<?= $c['id'] ?>" class="btn btn-danger btn-sm">delete</a>
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
        </div>
    </div>
</section>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    if (<?= $this->session->userdata('alert') ?>) {
        if (<?= $this->session->userdata('alert') ?> == 1) {
            swal("Good job!", `Delete Success`, "success")
        }
        <?php $this->session->unset_userdata('alert'); ?>
    }
</script>