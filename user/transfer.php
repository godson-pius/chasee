<?php
require_once '../admin/inc/functions/config.php';
$title = "User Dashboard";
require_once 'inc/header.php';

$total_transfer = fetch_transactions(1, $user_id);
foreach ($total_transfer as $transfer) {
}

$total_income = fetch_transactions(0, $user_id);
foreach ($total_income as $income) {
}

?>
<!-- END Header -->

<!-- Main Container -->
<main id="main-container">

    <!-- Page Content -->
    <div class="content">
        <!-- Quick Overview -->
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Quick Transfer
        </h2>

        <div class="row">

            <div class="col-lg-12 col-xl-12">
                <form action="" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-user"></i>
                                </span>
                            </div>
                            <input type="text" name="destination" class="form-control" id="example-group2-input1" name="example-group2-input1">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-dollar-sign"></i>
                                </span>
                            </div>
                            <input type="number" amount class="form-control text-center" id="example-group2-input3" name="example-group2-input3" placeholder="Amount">
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="email" disabled class="form-control form-control-alt" id="example-group3-input2-alt2" name="example-group3-input2-alt2" placeholder="Receiver">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-alt-success">Make Transfer</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->

<!-- Footer -->
<?php require_once 'inc/footer.php'; ?>