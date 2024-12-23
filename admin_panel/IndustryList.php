<?php 
//include admin_function
include_once('../function/admin_function.php');
include_once('../function/common_function.php');
//check authenticated admin
authenticated_admin();

$industries=fetch_all_industries();

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
                    <h2>Industry Lists</h2>
                </div>
                <div class="title-right ">
                    
                    <div class="book-btn ">
                        <a href="AddIndustry" class="btn "> <i class="fa fa-plus-circle"></i> Add New Industry</a>
                    </div>
                </div>

            </div>
            
            <div class="booking-table ">
                <table>
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Industry ID</th>
                            <th>Industry Name</th>
                            <th>Total Companies</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="filtered-results">
                       <?php $sn=1; foreach($industries as $industry){  ?>
                        <tr>
                            <td><?= $sn++; ?></td>
                            <td>IND_000<?= $industry['id'] ?></td>
                            <td><?= $industry['industry_name'] ?></td>
                            <td><?= count(get_companies_by_ind_id($industry['id']))  ?></td>
                            <td><?= $industry['description'] ?></td>
                            <td class="btns " id="check-btn">
                                <a href="CompanyList?indID=<?= urlencode(base64_encode($industry['id']))  ?>" class="btn accept ">Company_List</a>
                                <a href="AddIndustry?indID=<?= urlencode(base64_encode($industry['id']))  ?>" class="btn accept ">Edit_Details</a>
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