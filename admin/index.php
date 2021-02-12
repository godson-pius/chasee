<?php
    require_once 'inc/functions/config.php';
    require_once 'inc/header.php';

?>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">

                <!-- Page Content -->
                <div class="content">
                    <!-- Quick Overview -->
                    <div class="row row-deck">
                        <div class="col-6 col-lg-4">
                            <a class="block block-rounded block-link-shadow text-center" href="be_pages_ecom_orders.html">
                                <div class="block-content py-5">
                                    <div class="font-size-h3 font-w600 text-primary mb-1"><?= getTotal("users"); ?></div>
                                    <p class="font-w600 font-size-sm text-muted text-uppercase mb-0">
                                        All Users
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-lg-4">
                            <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
                                <div class="block-content py-5">
                                    <div class="font-size-h3 font-w600 mb-1"><?= getTotal("transactions"); ?></div>
                                    <p class="font-w600 font-size-sm text-muted text-uppercase mb-0">
                                        Total Transactions
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-lg-4">
                            <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
                                <div class="block-content py-5">
                                    <div class="font-size-h3 font-w600 mb-1">$<?= number_format(fetch_all_transactions()); ?></div>
                                    <p class="font-w600 font-size-sm text-muted text-uppercase mb-0">
                                        Transact Amount
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- END Quick Overview -->

                    <!-- Orders Overview -->
                    
                    <!-- END Orders Overview -->

                    <!-- Top Products and Latest Orders -->
                    <div class="row">

                        <div class="col-xl-12">
                            <!-- Latest Orders -->
                            <div class="block block-rounded">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Latest Transactions</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <table class="table table-borderless table-striped table-vcenter font-size-sm">
                                        <tbody>
                                            <?php
                                                $all_transactions = fetch("transactions");
                                                foreach ($all_transactions as $transactions) {
                                                    extract($transactions);
                                                    if ($type == 0) {
                                                        $class = "badge badge-success";
                                                        $message = "Received";
                                                    } else if ($type == 1) {
                                                        $class = "badge badge-danger";
                                                        $message = "Delivered";
                                                    }
                                                    

                                                    $get_users = where("users", "id", $user_id, 11);
                                                    foreach ($get_users as $users) { ?>

                                                        <tr>
                                                            <td class="font-w600 text-center" style="width: 100px;">
                                                                <a href="be_pages_ecom_order.html"><?= $users['acc_number']; ?></a>
                                                            </td>
                                                            <td class="d-none d-sm-table-cell">
                                                                <a href="be_pages_ecom_customer.html"><?= $users['fullname']; ?></a>
                                                            </td>
                                                            <td>
                                                                <span class="<?= $class; ?>"><?= $message; ?></span>
                                                            </td>
                                                            <td class="font-w600 text-right">$<?= $amount; ?></td>
                                                        </tr>
                                            <?php } } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END Latest Orders -->
                        </div>
                    </div>
                    <!-- END Top Products and Latest Orders -->
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <?php require_once 'inc/footer.php'; ?>