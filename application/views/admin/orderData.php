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
                            <li class="active">Data Transaction</li>
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
                        <strong class="card-title">Data Transaction</strong>
                    </div>
                    <div class="card-body">
                        <i id="alert">
                        </i>

                        <table id="table-user" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Name</td>
                                    <td>Total Price</td>
                                    <td>Date</td>
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
<script src="<?= base_url('assets') ?>/admin/assets/js/requestOrder.js"></script>
<script>
    addRowUser();

    // GET ALL DATA END

    window.onload = () => {

    }

    const alertNotif = (status) => {
        swal("Good job!", `${status} Data Success !`, "success")
            .then((value) => {
                document.location.reload();
            })
    }

    // DELETE DATA END
</script>