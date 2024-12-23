<?php 
//include admin_function
include_once('../function/admin_function.php');
include_once('../function/common_function.php');
//check authenticated admin
authenticated_admin();

$categories = fetch_all_influencer_categories();
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
                    <h2>Influencer Categories</h2>
                </div>
                <div class="title-right ">
                    
                    <div class="book-btn ">
                        <a href="AddCategory" class="btn "> <i class="fa fa-plus-circle"></i> Add New Category</a>
                    </div>
                </div>

            </div>
            
            <div class="booking-table ">
                <table>
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Total Influencers</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="filtered-results">
                        <?php $sn = 1;
                        foreach ($categories as $category) {?>
                        <tr>
                            <td><?= $sn++; ?></td>
                            <td><?= 'CAT_000' . $category['id'] ?></td>
                            <td><?= $category['category_name'] ?></td>
                            <td><?= count(fetch_all_influencers_by_categories($category['id'])) ?></td>
                            <td><?= $category['description'] ?> </td>
                            <td>
                                <span class="badge badge-<?php echo $category['is_active'] ? 'success' : 'danger'; ?>">
                                    <?php echo $category['is_active'] ? 'Active' : 'Inactive'; ?>
                                </span>
                            </td>
                            <td class="btns " id="check-btn">
                                <a  href="InfluencerList?catID=<?= urlencode(base64_encode($category['id']))  ?>" class="btn accept ">Influencer List</a>
                                <a  href="AddCategory?catID=<?= urlencode(base64_encode($category['id']))  ?>" class="btn accept ">Edit Category</a>
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