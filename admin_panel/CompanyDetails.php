<?php
//include admin_function
include_once('../function/admin_function.php');
include_once('../function/common_function.php');
//check authenticated admin
authenticated_admin();

//get inf id from url
$comID = isset($_GET['comID']) ? base64_decode(urldecode($_GET['comID'])) : null;
if($comID==null){
    echo '<script>window.history.back();</script>';
    exit; 
}

$comDetails = get_company_details_by_id($comID);
$collabroations=fetch_all_collabroation_request($comDetails['user_id'],null);
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
                    <h2>Company Details</h2>
                </div>

            </div>

            <div class="req-details" id="display">
            <div class="pro-info" >
                <ul>
                <li><strong>Company ID : </strong><p><?= 'CMP_000'.$comID ?></p></li>
                <li><strong>Industry Name : </strong><p><?= $comDetails['industry_name'] ?></p></li>
                <li><strong>company Name : </strong><p><?= $comDetails['company_name'] ?></p></li>
                <li><strong>company Size : </strong><p><?= $comDetails['company_size'] ?></p></li>
                <li><strong>company Website : </strong><p><?= $comDetails['website'] ?></p></li>
                <li><strong>Contact Info : </strong><p><?= $comDetails['contact_info'] ?></p></li>
                <li><strong>Location : </strong><p><?= $comDetails['location'] ?></p></li>
                <li><strong>Manager Name : </strong><p><?= $comDetails['firstname'] . ' ' . $comDetails['lastname'] ?></p></li>
                <li><strong>Manager Phone : </strong><p><?= $comDetails['phone'] ?></p></li>
                <li><strong>Manager Email : </strong><p><?= $comDetails['email'] ?></p></li>
                <li><strong>Manager Status : </strong><p><?php echo $comDetails['is_active'] ? 'Active' : 'Inactive'; ?></p></li>
                </ul>
</div>

            </div>

            <div class="title ">
                <div class="title-left ">
                    <h2>Company Collabroation List</h2>
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