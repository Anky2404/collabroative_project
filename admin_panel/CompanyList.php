<?php 
//include admin_function
include_once('../function/admin_function.php');
include_once('../function/common_function.php');
//check authenticated admin
authenticated_admin();

//fetch industry list from url
$indID = isset($_GET['indID']) ? base64_decode(urldecode($_GET['indID'])) : null;

$companyList=fetch_all_companies($indID);

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
                    <h2>Company Lists</h2>
                </div>
              
            </div>

            <div class="booking-table ">
                <table>
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Company ID</th>
                            <th>Company Name</th>
                            <th>Industry </th>
                            <th>Company Size</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="filtered-results">
                        <?php $sn = 1;
                        foreach ($companyList as $list) {?>
                                <tr>
                                    <td><?= $sn++; ?></td>
                                    <td><?= 'COM_000' . $list['com_id'] ?></td>
                                    <td><?= $list['company_name'] ?></td>
                                    <td><?= $list['industry_name'] ?></td>
                                    <td><?= $list['company_size'] ?></td>
                                    <td class="btns ">
                                        <a href="CompanyDetails?comID=<?= urlencode(base64_encode($list['com_id'])) ?>" class="btn accept ">Details</a>
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
