<?php 
//include admin_function
include_once('../function/admin_function.php');
include_once('../function/common_function.php');
//check authenticated admin
authenticated_admin();

$platforms = fetch_all_platforms();
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
                    <h2>Platform Lists</h2>
                </div>
                <div class="title-right ">
                    
                    <div class="book-btn ">
                        <a href="AddPlatform" class="btn "> <i class="fa fa-plus-circle"></i> Add New Platform</a>
                    </div>
                </div>

            </div>
            
            <div class="booking-table ">
                <table>
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Platform Image</th>
                            <th>Platform Name</th>
                            <th>Total Influencers</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="filtered-results" class="platform-list">
                    <?php $sn=1; foreach($platforms as $platform){  ?>
                        <tr>
                            <td><?= $sn++; ?></td>
                            <td><img src="../assets/img/<?= $platform['platform_image'] ?>" alt=""></td>
                            <td><?= $platform['platform_name'] ?></td>
                            <td><?= count(get_companies_by_ind_id($platform['id']))  ?></td>
                            <td>
                                        <span class="badge badge-<?php echo $platform['is_active'] ? 'success' : 'danger'; ?>">
                                            <?php echo $platform['is_active'] ? 'Active' : 'Inactive'; ?>
                                        </span>
                                    </td>
                            <td class="btns " >
                                <a href="InfluencerList?patID=<?= urlencode(base64_encode($platform['id']))  ?>" class="btn accept ">Influencer_List</a>
                                <a href="AddPlatform?patID=<?= urlencode(base64_encode($platform['id']))  ?>" class="btn accept ">Edit_Details</a>
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