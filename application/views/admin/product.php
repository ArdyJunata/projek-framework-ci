<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Table</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Data</a></li>
                            <li class="active">Data Product</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data <?= $name ?></strong>
                    </div>
                    <div class="card-body">
                        <i id="alert">
                        </i>
                        <?php if ($name != 'All') { ?>
                            <!-- Modal Trigger -->
                            <button data-toggle="modal" data-target="#mediumModal" class="btn btn-outline-primary userAdd"><i class="fa fa-plus-square"></i>&nbsp;Add <?= $name ?> </button>
                        <?php } ?>
                        <!-- Modal -->
                        <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="mediumModalLabel useradd">Add <?= $name ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card-body">
                                            <!-- Credit Card -->
                                            <div id="pay-invoice">
                                                <div class="card-body">
                                                    <form method="post" id="addUser" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label for="cc-payment" class="control-label mb-1">Name</label>
                                                            <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="cc-number" class="control-label mb-1">Price</label>
                                                            <input id="price" name="price" type="number" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number">
                                                            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="cc-number" class="control-label mb-1">Description</label>
                                                            <div class="col-12 col-md-12"><textarea name="description" id="description" rows="9" placeholder="" class="form-control"></textarea></div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="x_card_code" class="control-label mb-1">Image</label>
                                                                    <div class="input-group">
                                                                        <input id="image" name="image" type="file" class="form-control-file" multiple>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                                SUBMIT
                                                            </button>
                                                        </div>
                                                        <input type="hidden" name="category_id" value="<?= $category_id ?>">
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- End Modal -->


                        <br>
                        <br>
                        <table id="table-user" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Name</td>
                                    <td>Price</td>
                                    <td>Description</td>
                                    <td>Image</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody id="userTable">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<div class="clearfix"></div>
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?= base_url('assets') ?>/admin/assets/js/requestProduct.js"></script>
<script>
    if (<?= $category_id ?> == 0) {
        getAllProduct();
    } else {
        addRowUser(<?= $category_id ?>);
    }


    window.onload = () => {
        delt();
        update();
        insert();
    }

    const alertNotif = (status) => {
        swal("Good job!", `${status} Data Success !`, "success")
            .then((value) => {
                document.location.reload();
            })
    }
</script>