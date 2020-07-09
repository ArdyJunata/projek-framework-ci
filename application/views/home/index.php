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
<!-- Hero Section End -->
<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Coming Soon Product</h2>
                </div>
            </div>
            <div class="categories__slider owl-carousel">
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="<?= base_url('assets') ?>/img/categories/cat-1.jpg">
                        <h5><a href="#">Flights</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="<?= base_url('assets') ?>/img/categories/cat-2.jpg">
                        <h5><a href="#">Trains</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="<?= base_url('assets') ?>/img/categories/cat-3.jpg">
                        <h5><a href="#">Hotels</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="<?= base_url('assets') ?>/img/categories/cat-4.jpg">
                        <h5><a href="#">Car Rental</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="<?= base_url('assets') ?>/img/categories/cat-5.jpg">
                        <h5><a href="#">Cinema</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Product</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".atraction">Attraction</li>
                        <li data-filter=".tours">Tours</li>
                        <li data-filter=".beauty">Beauty</li>
                        <li data-filter=".food">Food</li>
                        <li data-filter=".games">Games & Hobbies</li>
                        <li data-filter=".class">Class & Workshop</li>
                        <li data-filter=".play">Playground</li>
                        <li data-filter=".event">Events</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            <?php
            foreach ($attraction as $att) :
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix atraction">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?= base_url('assets') ?>/img/product/category/<?= $att['image'] ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="<?= base_url('order/wishlist/') ?><?= $att['id'] ?>"><i class="fa fa-heart"></i></a></li>
                                <li><a href="<?= base_url('order/cart/') ?><?= $att['id'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#"><?= $att['name'] ?></a></h6>
                            <h5>IDR <?= number_format($att['price']) ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php
            foreach ($tour as $to) :
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix tours">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?= base_url('assets') ?>/img/product/category/<?= $to['image'] ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#"><?= $to['name'] ?></a></h6>
                            <h5>IDR <?= number_format($to['price']) ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php
            foreach ($beauty as $beau) :
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix beauty">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?= base_url('assets') ?>/img/product/category/<?= $beau['image'] ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#"><?= $beau['name'] ?></a></h6>
                            <h5>IDR <?= number_format($beau['price']) ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php
            foreach ($game as $gim) :
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix games">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?= base_url('assets') ?>/img/product/category/<?= $gim['image'] ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#"><?= $gim['name'] ?></a></h6>
                            <h5>IDR <?= number_format($gim['price']) ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php
            foreach ($food as $foo) :
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix food">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?= base_url('assets') ?>/img/product/category/<?= $foo['image'] ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#"><?= $foo['name'] ?></a></h6>
                            <h5>IDR <?= number_format($foo['price']) ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php
            foreach ($class as $cls) :
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix class">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?= base_url('assets') ?>/img/product/category/<?= $cls['image'] ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#"><?= $cls['name'] ?></a></h6>
                            <h5>IDR <?= number_format($cls['price']) ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php
            foreach ($playground as $play) :
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix play">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?= base_url('assets') ?>/img/product/category/<?= $play['image'] ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="<?= base_url('order/cart/') + $play['id'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#"><?= $play['name'] ?></a></h6>
                            <h5>IDR <?= number_format($play['price']) ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php
            foreach ($event as $ev) :
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix event">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?= base_url('assets') ?>/img/product/category/<?= $ev['image'] ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="<?= base_url('order/cart/') + $ev['id'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#"><?= $ev['name'] ?></a></h6>
                            <h5>IDR <?= number_format($ev['price']) ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="<?= base_url('assets') ?>/img/banner/banner-1.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="<?= base_url('assets') ?>/img/banner/banner-2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<br><br>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    if (<?= $this->session->userdata('alert') ?>) {
        if (<?= $this->session->userdata('alert') ?> == 1) {
            swal("Oops", "You Already Add this item to your wishlist", "error")
        } else if (<?= $this->session->userdata('alert') ?> == 2) {
            swal("Good job!", `Order Success, just wait for the products`, "success")
        }
        <?php $this->session->unset_userdata('alert'); ?>
    }
</script>