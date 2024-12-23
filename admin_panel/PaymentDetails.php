<?php
//include admin_function
include_once('../function/admin_function.php');
include_once('../function/common_function.php');
//check authenticated admin
authenticated_admin();

//get inf id from url
$pmtID = isset($_GET['pmtID']) ? base64_decode(urldecode($_GET['pmtID'])) : null;
if($pmtID==null){
    echo '<script>window.history.back();</script>';
    exit; 
}
$pmtDetails=get_payment_details_by_id($pmtID);
$paymentBy=get_user_by_id($pmtDetails['user_id']);
$paymentTo=get_user_by_id($pmtDetails['influencer_id']);


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
                    <h2>Payment Details</h2>
                </div>

            </div>

            <div class="req-details" id="display">
            <div class="pro-info" >
                <ul>
                <li><strong>Payment ID : </strong><p> PYMT_000 <?= $pmtID ?></p></li>
                <li><strong>Invoice ID : </strong><p>INV_000 <?= $pmtDetails['invoice_id'] ?></p></li>
                <li><strong>Collab ID : </strong><p>CLB_000<?= $pmtDetails['collab_id'] ?></p></li>
                <li><strong>Campaign : </strong><p><?= $pmtDetails['campaign_details'] ?></p></li>
                <li><strong>Payment By : </strong><p><?= $paymentBy['firstname'] . ' ' . $paymentBy['lastname'] ?></p></li>
                <li><strong>Payment TO : </strong><p><?= $paymentTo['firstname'] . ' ' . $paymentTo['lastname'] ?></p></li>
                <li><strong>Paid Amount : </strong><p>$<?= $pmtDetails['paid_amount'] ?></p></li>
                <li><strong>Payment Mode : </strong><p><?= $pmtDetails['payment_type'] ?></p></li>
                <li><strong>Payment Status : </strong><p><?= $pmtDetails['payment_status'] ?></p></li>
                <li><strong>Payment Date : </strong><p><?= date("d M Y", strtotime($pmtDetails['payment_date'])) ?></p></li>
                <li style="height:auto;"><strong>Invoice Notes : </strong><p><?= $pmtDetails['notes'] ?></p></li>
                </ul>
</div>
            </div>

           
        </div>
    </div>

</body>

</html>