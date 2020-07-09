<div class="hero__item set-bg" data-setbg="<?= base_url('assets') ?>/img/hero/banner-1.jpg">
    <div class="hero__text">
        <span>PRAMBANAN TEMPLE</span>
        <h2>Entrace <br />50% Discount</h2>
        <p id="enjoy">Enjoy trip with your family</p>
        <a href="#" class="primary-btn">SHOP NOW</a>
    </div>
</div>
</div>
</div>
</div>
</section>
<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h6><span class="icon_tag_alt"></span> Checkout Page
                </h6>
            </div>
        </div>
        <div class="checkout__form">
            <h4>Billing Details</h4>
            <form action="<?= base_url('home/updateUser') ?>" method="post">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Full Name</p>
                                    <input type="text" name="name" value="<?= $user['name'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Province</p>
                            <input type="text" name="province" value="<?= $user['province'] ?>">
                        </div>
                        <div class=" row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Address</p>
                                    <input type="text" name="address" value="<?= $user['address'] ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Town/City</p>
                                    <input type="text" name="city" value="<?= $user['city'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="checkout__input">
                            <p>Email</p>
                            <input type="text" value="<?= $user['email'] ?>" disabled>
                        </div>
                        <button id="update" type="submit" class="btn btn-primary">Update</button>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Your Order</h4>
                            <div class="checkout__order__products">Products <span>Price</span></div>
                            <ul>
                                <?php foreach ($check as $c) : ?>
                                    <li><?= $c['name'] ?><span>Rp. <?= number_format($c['price']) ?></span></li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="checkout__order__total">Total <span>Rp. <?= number_format($total['total']) ?></span>
                            </div>
                            <?php if ($check) { ?>
                                <a href="<?= base_url('order/addOrder/') ?><?= $total['total'] ?>" class="site-btn">PLACE ORDER</a>
                            <?php } else { ?>
                                <div class="checkout__order__total"><span>you havent select an item yet</span>
                                <?php } ?>
                                </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->