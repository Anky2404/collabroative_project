<?php
//include admin_function
include_once('../function/admin_function.php');
include_once('../function/common_function.php');
//check authenticated admin
authenticated_admin();

//get category id from url
$cat_id = isset($_GET['catID']) ? base64_decode(urldecode($_GET['catID'])) : null;

$payments = fetch_payment_list();


?>

<!DOCTYPE html>
<html lang="en">
<?php include_once('partials/head.php');  ?>

<body>
    <?php include_once('partials/header.php');  ?>
    <div class="backend">
        <?php include_once('partials/left-menu.php');  ?>
        <?php include_once('partials/toggle.php');  ?>
        <div class="dashboard ">
            <div class="title ">
                <div class="title-left ">
                    <h2>Payment Lists</h2>
                </div>

            </div>

            <div class="booking-table ">
                <table>
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Payment ID</th>
                            <th>Invoice ID</th>
                            <th>Paid Amont</th>
                            <th>Status</th>
                            <th>Payment Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sn = 1;
                        foreach ($payments as $payment) { ?>
                            <tr>
                                <td><?= $sn++; ?></td>
                                <td><?= 'PYMT_000' . $payment['id'] ?></td>
                                <td><?= 'INV_000' . $payment['invoice_id'] ?></td>
                                <td>$<?= $payment['paid_amount'] ?></td>
                                <td><span
                                        class="badge badge-<?php if ($payment['payment_status'] == 'Pending') {
                                                                echo 'primary';
                                                            } else if ($payment['payment_status'] == 'Paid') {
                                                                echo 'success';
                                                            } else {
                                                                echo 'danger';
                                                            } ?>"><?= $payment['payment_status'] ?>
                                    </span>
                                </td>
                                <td><?= date("d M Y", strtotime($payment['payment_date'])) ?></td>

                                <td class="btns ">
                                    <a href="PaymentDetails?pmtID=<?= urlencode(base64_encode($payment['id']))  ?>" class="btn accept ">Details</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>


</body>

</html>