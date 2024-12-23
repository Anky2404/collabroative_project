<?php 
//include admin_function
include_once('../function/admin_function.php');
include_once('../function/common_function.php');
//check authenticated admin
authenticated_admin();

//get category id from url
$cat_id=isset($_GET['catID']) ? base64_decode(urldecode($_GET['catID'])) : null;

if($cat_id!=null){
    $influencers=fetch_all_influencers_by_categories($cat_id);
}else{
    $influencers = fetch_all_users('Influencer');
}


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
                    <h2>Influencer Lists</h2>
                </div>
              
            </div>

            <div class="booking-table ">
                <table>
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Influencer ID</th>
                            <th> Full Name</th>
                            <th>Category</th>
                            <th> Email</th>
                            <th> Contact No</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="filtered-results">
                        <?php $sn = 1;
                        foreach ($influencers as $influencer) {?>
                                <tr>
                                    <td><?= $sn++; ?></td>
                                    <td><?= 'INF_000' . $influencer['inf_id'] ?></td>
                                    <td><?= $influencer['firstname'] . ' ' . $influencer['lastname'] ?></td>
                                    <td><?= $influencer['category_name'] ?></td>
                                    <td><?= $influencer['email'] ?></td>
                                    <td><?= $influencer['phone'] ?></td>
                                    <td>
                                        <span class="badge badge-<?php echo $influencer['is_active'] ? 'success' : 'danger'; ?>">
                                            <?php echo $influencer['is_active'] ? 'Active' : 'Inactive'; ?>
                                        </span>
                                    </td>

                                    <td class="btns ">
                                        <a href="InfluencerDetails?infID=<?= urlencode(base64_encode($influencer['inf_id']))  ?>" class="btn accept ">Details</a>
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
