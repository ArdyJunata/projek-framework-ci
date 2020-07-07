<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Data</a></li>
                            <li class="active">Data Admin</li>
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
                        <strong class="card-title">Data Admin</strong>
                    </div>
                    <div class="card-body">
                        <i id="alert">
                        </i>
                        <!-- Modal Trigger -->
                        <button data-toggle="modal" data-target="#mediumModal" class="btn btn-outline-primary userAdd"><i class="fa fa-user-plus"></i>&nbsp;Add User </button>

                        <!-- Modal -->
                        <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="mediumModalLabel useradd">Add User</h5>
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
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group has-success">
                                                                    <label for="cc-name" class="control-label mb-1">Email</label>
                                                                    <input id="email" name="email" type="email" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name">
                                                                    <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group has-success">
                                                                    <label for="cc-name" class="control-label mb-1">Password</label>
                                                                    <input id="password" name="password" type="password" class="form-control">
                                                                    <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="cc-number" class="control-label mb-1">Address</label>
                                                            <input id="address" name="address" type="text" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number">
                                                            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="cc-exp" class="control-label mb-1">City</label>
                                                                    <input id="city" name="city" type="text" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year">
                                                                    <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="x_card_code" class="control-label mb-1">Province</label>
                                                                <div class="input-group">
                                                                    <input id="province" name="province" type="text" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="x_card_code" class="control-label mb-1">Image</label>
                                                                    <div class="input-group">
                                                                        <input id="image" name="image" type="file" class="form-control-file" multiple required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                                SUBMIT
                                                            </button>
                                                        </div>
                                                        <input type="hidden" name="role_id" value="2">
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
                                    <td>Email</td>
                                    <td>Address</td>
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
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?= base_url('assets') ?>/admin/assets/js/request.js"></script>
<script>
    addRowUser(2);

    // GET ALL DATA END

    window.onload = () => {
        delt();
        update();
        insert();
    }

    const alertNotif = (status) => {
        swal("Good job!", `${status} Data Success !`, "success")
            .then((value) => {
                document.location.reload();
            });
    }

    // DELETE DATA END
</script>