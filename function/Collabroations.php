<?php include_once('function/common_function.php');
include_once('function/user_function.php');


$infID = 11;

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
                <h2> collabroation Details</h2>
            </div>
            <div class="influencer-info">
                <table>
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Requested By</th>
                            <th>Platform</th>
                            <th>Influencer</th>
                            <th>Campaign</th>
                            <th>Request At</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sn = 1;
                        foreach ($collabroations as $collabroation) { ?>
                            <tr>
                                <td><?= $sn++ ?></td>
                                <td><?= $collabroation['user_firstname'] . ' ' . $collabroation['user_lastname'] ?></td>
                                <td><?= $collabroation['platform_name'] ?></td>
                                <td><?= $collabroation['inf_firstname'] . ' ' . $collabroation['inf_lastname'] ?></td>
                                <td><?= $collabroation['campaign_details'] ?></td>
                                <td><?= date("d M Y", strtotime($collabroation['requested_at'])) ?></td>
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