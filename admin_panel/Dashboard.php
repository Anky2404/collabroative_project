<?php //include admin_function
include_once('../function/admin_function.php');
include_once('../function/common_function.php');
//check authenticated admin
authenticated_admin();

$influencers = fetch_all_users('Influencer');
$companies = fetch_all_companies();
$requests = fetch_all_influencer_request();


?>

<!DOCTYPE html>
<html lang="en">
<?php include_once('partials/head.php');  ?>


<body>
    <?php include_once('partials/header.php');  ?>
    <div class="backend">
        <?php include_once('partials/left-menu.php');  ?>
        <?php include_once('partials/toggle.php');  ?>
        <div class="dashboard">
            <div class="title">
                <h2>Dashboard</h2>
            </div>
            <div class="booking-wrap">
                <div class="booking-box">
                    <div class="info box1">
                        <div class="info-text">
                            <h4><?= count($influencers) ?></h4>
                            <span>Total Influencer</span>
                        </div>
                        <div class="info-icon">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </div>
                <div class="booking-box">
                    <div class="info box2">
                        <div class="info-text">
                            <h4><?= count($companies) ?></h4>
                            <span>Total Company</span>
                        </div>
                        <div class="info-icon">
                            <i class="fa fa-building"></i>
                        </div>
                    </div>
                </div>
                <div class="booking-box">
                    <div class="info box3">
                        <div class="info-text">
                            <h4><?= count($requests) ?></h4>
                            <span>Total Request</span>
                        </div>
                        <div class="info-icon">
                            <i class="fa fa-paper-plane"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="title">
                <h2>Up Coming Account Requests!</h2>
            </div>
            <div class="booking-table">
                <table>
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Request ID</th>
                            <th> Request By</th>
                            <th>Status</th>
                            <th>Requested At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sn = 1;
                        foreach ($requests as $request) { ?>
                            <tr>
                                <td><?= $sn++; ?></td>
                                <td>RAQ_000<?= $request['req_id'] ?></td>
                                <td><?= $request['firstname'] . ' ' . $request['lastname'] ?></td>
                                <td><span
                                        class="badge badge-<?php if ($request['req_status'] == 'Pending') {
                                                                echo 'primary';
                                                            } else if ($request['req_status'] == 'Approved') {
                                                                echo 'success';
                                                            } else {
                                                                echo 'danger';
                                                            } ?>"><?= $request['req_status'] ?></span>
                                </td>
                                <td><?= date("d M Y", strtotime($request['requested_at'])) ?></td>
                                <td> <a href="RequestDetails?reqID=<?= urlencode(base64_encode($request['req_id'])) ?>" class="btn accept ">Details</a></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            $('.colright h3 span').click(function() {
                $('.menu').slideToggle('slow');
            })
        });
    </script>
</body>

</html>