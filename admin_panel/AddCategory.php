<?php
//include admin_function
include_once('../function/admin_function.php');
include_once('../function/common_function.php');
//check authenticated admin
authenticated_admin();

//get category id from url
$catID = isset($_GET['catID']) ? base64_decode(urldecode($_GET['catID'])) : null;

$category = get_category_by_id($catID);






?>

<!DOCTYPE html>
<html lang="en">
<?php include_once('partials/head.php');  ?>

<body>
    <?php include_once('partials/header.php');  ?>
    <div class="backend">
        <?php include_once('partials/left-menu.php');  ?>
        <?php include_once('partials/toggle.php');  ?>
        <div class="dashboard">
            <div class="title">
                <div class="title-left">
                    <h2><?php echo $catID != null ? 'Edit Category' : 'Add Category'; ?></h2>

                </div>
               
            </div>


            <div class="profile">

                <div class="profile-info">
                    <?php if ($catID != null) {  ?>
                        <form method="POST">
                            <h3>Category Info</h3>
                            <div class="input-box">
                                <label for="categoryName">Category Name</label>
                                <input type="text" id="categoryName" value="<?= $category['category_name'] ?>" name="categoryName" placeholder="Category Name" required>
                            </div>
                            <div class="input-box">
                                <label for="categoryDescription">Category Description</label>
                                <textarea name="categoryDescription" id="categoryDescription" cols="63" rows="5" placeholder="Category Description" required><?= $category['description'] ?></textarea>
                            </div>
                            <input type="hidden" id="catID" name="catID" value="<?= $catID ?>" placeholder="Category ID" required>
                            <div class="form-add">
                            <button class="btn" type="submit" name="edit_category">
                                <i class="fa fa-pencil-alt"></i> Edit Category
                            </button>
                    </div>

                        </form>
                    <?php } else {  ?>
                        <form method="POST">
                            <h3>Category Info</h3>
                            <div class="input-box">
                                <label for="categoryName">Category Name</label>
                                <input type="text" id="categoryName" name="categoryName" placeholder="Category Name" required>
                            </div>
                            <div class="input-box">
                                <label for="categoryDescription">Category Description</label>
                                <textarea name="categoryDescription" id="categoryDescription" cols="63" rows="5" placeholder="Category Description" required></textarea>
                            </div>
                            
                            <div class="form-add">
                            <button class="btn" type="submit" name="add_category">
                                <i class="fa fa-plus"></i> Add Category
                            </button>
                             </div>
                        </form>
                    <?php }  ?>
                </div>

            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        jQuery(document).ready(function() {

            jQuery('.colright h3 span').click(function() {
                jQuery('.menu').slideToggle('slow');
            })
        });
    </script>
</body>

</html>