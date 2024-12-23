<?php
//include admin_function
include_once('../function/admin_function.php');
include_once('../function/common_function.php');
//check authenticated admin
authenticated_admin();

//get inf id from url
$infID = isset($_GET['infID']) ? base64_decode(urldecode($_GET['infID'])) : null;
if($infID==null){
    echo '<script>window.history.back();</script>';
    exit; 
}
$infDetails = get_influencer_details_by_id($infID);
$links = get_influencer_social_links($infID);
$collabroations=fetch_all_collabroation_request(null,$infID);
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
                    <h2>Influencer Details</h2>
                </div>

            </div>

            <div class="req-details">
                <div class="col4">
                    <h3>Influencer Info</h3>
                <div class="pro-info">
                <ul>
                <li><strong>Influencer ID : </strong><p><?= $infID ?></p></li>
                <li><strong>Influencer Category :</strong> <p><?= $infDetails['category_name'] ?></p></li>
                <li><strong>Influencer Name : </strong><p><?= $infDetails['firstname'] . ' ' . $infDetails['lastname'] ?></p></li>
                <li><strong>Influencer Phone : </strong><p><?= $infDetails['phone'] ?></p></li>
                <li><strong>Influencer Email : </strong><p><?= $infDetails['email'] ?></p></li>
                <li><strong>Status : </strong><p><?php echo $infDetails['is_active'] ? 'Active' : 'Inactive'; ?></p></li>
            </ul>
            </div>
            </div>
            <div class="col6">
                <h3>Social Links</h3>
            <div class="pro-info">
                <?php foreach ($links as $link) {  ?>
                    <ul class="socio-links">
                        <li><strong>Platform :</strong><p> <?= $link['platform_name'] ?></p></li>
                        <li><strong>Website Link :</strong> <p><?= $link['platform_link'] ?></p></li>
                        <li><strong>Flowers :</strong> <p><?= $link['total_followers'] ?></p></li>
                        <li><strong>Engagement Rate :</strong> <p><?= $link['engagement_rate'] ?></p></li>
                        <li><strong>Charges :</strong> <p>$<?= $link['price'] ?></p></li>
                    </ul>

                <?php }  ?>
                </div>
                </div>

            </div>

            <div class="title ">
                <div class="title-left ">
                    <h2>Influencer Collabroation List</h2>
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
                        foreach ($collabroations as $collabroation) {?>
<tr>
                            <td><?= $sn++ ?></td>
                            <td>CLB_000<?= $collabroation['id'] ?></td>
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