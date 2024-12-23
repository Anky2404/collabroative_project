<?php include_once('function/common_function.php');
include_once('function/user_function.php');

//get inf id from url
$infID = isset($_GET['infID']) ? base64_decode(urldecode($_GET['infID'])) : null;
if ($infID == null) {
    echo '<script>window.history.back();</script>';
    exit;
}

$infDetails = get_influencer_details_by_id($infID);
$links = get_influencer_social_links($infID);
$collabroations = fetch_all_collabroation_request(null, $infID);



?>
<!DOCTYPE html>
<html lang="en">
<?php include_once('partials/head.php')  ?>


<body>
    <?php include_once('partials/header.php')  ?>
    <section class="home_1 list">
        <div class="container">
            <div class="row">
                <div class="col6">
                    <div class="home-left">
                        <h1>Influencers Detail</h1>
                        <p>Connect with top influencers to expand your brand's reach, engage your audience, and drive
                            real results through strategic collaborations and authentic content creation. </p>


                    </div>
                </div>

            </div>
        </div>

    </section>
    <section class="influencer-detail">
        <div class="container">
            <div class="heading">
                <h2>Influencer Info</h2>
            </div>
            <div class="influencer-info">
                <div class="col3">
                    <ul>
                        <li>
                            <strong><img src="assets/img/inf_img/<?= $infDetails['profile_img'] ?>" alt="<?= $infDetails['firstname'] . ' ' . $infDetails['lastname'] ?>" width="100px" ; height="100px" ;></strong>
                            <p><?= $infDetails['firstname'] . ' ' . $infDetails['lastname'] ?></p>
                        </li>
                    </ul>

                </div>
                <div class="col9">
                    <ul>
                        <div class="left">
                            <li>
                                <strong>Influencer ID:</strong>
                                <p><?= 'INF_000' . $infID ?></p>
                            </li>
                            <li>
                                <strong>Category:</strong>
                                <p><?= $infDetails['category_name'] ?></p>
                            </li>

                            <li>
                                <strong>Phone:</strong>
                                <p><?= $infDetails['phone'] ?></p>
                            </li>
                        </div>
                        <div class="left">
                            <li>
                                <strong>Email:</strong>
                                <p><a href="mailto:john@gmail.com"><?= $infDetails['email'] ?></a></p>
                            </li>
                            <li>
                                <strong>Status:</strong>
                                <p><?php echo $infDetails['is_active'] ? 'Active' : 'Inactive'; ?></p>
                            </li>
                            <li>
                                <strong>Social Links:</strong>
                                <p class="social-links"><i class="fa-brands fa-facebook"></i> <i
                                        class="fa-brands fa-tiktok"></i><i class="fa-brands fa-youtube"></i> </p>
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section class="platform-div">
        <div class="container">
            <div class="heading">
                <h2>Platforms</h2>
            </div>
            <div class="row">
                <?php foreach ($links as $link) {  ?>
                    <div class="col4">
                        <div class="platform">
                            <img src="assets/img/<?= $link['platform_image'] ?>" alt="<?= $link['platform_name'] ?>" title="<?= $link['platform_name'] ?>">
                            <h3><?= $link['platform_name'] ?></h3>
                            <ul>
                                <li><strong>Followers:</strong>
                                    <p><?= $link['total_followers'] ?></p>
                                </li>
                                <li> <strong>Engagement Rate:</strong>
                                    <p><?= $link['engagement_rate'] ?>%</p>
                                </li>
                                <li> <strong>Charges:</strong>
                                    <p>$<?= $link['price'] ?></p>
                                </li>
                            </ul>
                            <a class="btn" href="CollabRequest?infID=<?= urlencode(base64_encode($infID)) . '&&patID=' . urlencode(base64_encode($link['platform_id'])) ?>"> Request</a>

                        </div>
                    </div>
                <?php }  ?>

            </div>
        </div>
    </section>

    <section class="influencer-detail">
        <div class="container">
            <div class="heading">
                <h2> collabroation Details</h2>
            </div>
            <div class="influencer-info">
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


    </section>
    <?php include_once('partials/footer.php')  ?>

</body>

</html>