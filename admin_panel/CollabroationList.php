<?php
//include admin_function
include_once('../function/admin_function.php');
include_once('../function/common_function.php');
//check authenticated admin
authenticated_admin();
$collabroations = fetch_all_collabroation_request();
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
                    <h2>Collabroation Lists</h2>
                </div>

            </div>

            <div class="booking-table ">
                <table>
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Collabroation ID</th>
                            <th>Requested By</th>
                            <th>Influencer</th>
                            <th>Campaign</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sn = 1;
                        foreach ($collabroations as $collabroation) { ?>
                            <tr>
                                <td><?= $sn++ ?></td>
                                <td>CLB_000<?= $collabroation['collab_id'] ?></td>
                                <td><?= $collabroation['user_firstname'] . ' ' . $collabroation['user_lastname'] ?></td>
                                <td><?= $collabroation['inf_firstname'] . ' ' . $collabroation['inf_lastname'] ?></td>
                                <td><?= $collabroation['campaign_details'] ?></td>
                                <td><span
                                        class="badge badge-<?php if ($collabroation['status'] == 'Pending') {
                                                                echo 'primary';
                                                            } else if ($collabroation['status'] == 'Accepted') {
                                                                echo 'success';
                                                            } else {
                                                                echo 'danger';
                                                            } ?>"><?= $collabroation['status'] ?></span>
                                </td>
                            </tr>

                        <?php }  ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>


</body>

</html>