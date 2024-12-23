<?php
//include admin_function
include_once('../function/admin_function.php');
include_once('../function/common_function.php');
//check authenticated admin
authenticated_admin();

//get platform id from url
$patID = isset($_GET['patID']) ? base64_decode(urldecode($_GET['patID'])) : null;

$platform = get_Platform_by_id($patID);






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
                    <h2><?php echo $patID != null ? 'Edit Platform' : 'Add Platform'; ?></h2>

                </div>

            </div>


            <div class="profile">

                <div class="profile-info">
                    <?php if ($patID != null) {  ?>
                        <form method="POST" enctype="multipart/form-data">
                            <h3>Platform Info</h3>
                            <div class="input-grid">
                                <div class="input-box">
                                    <label for="platformName">Platform Name</label>
                                    <input type="text" id="platformName" value="<?= $platform['platform_name'] ?>" name="platformName" placeholder="Platform Name" required>
                                </div>
                                <div class="input-box">
                                    <label for="platformStatus">Platform Status</label>
                                    <select name="platformStatus" id="platformStatus" required>
                                        <option value="1" <?= ($platform['is_active'] == '1') ? 'selected' : ''; ?>>Active</option>
                                        <option value="0" <?= ($platform['is_active'] == '0') ? 'selected' : ''; ?>>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-box">
                                <label for="platformLogo">Platform Logo</label>
                                <input type="file" name="platformLogo" id="platformLogo" placeholder="Upload Platform Logo" accept="image/*">
                            </div>
                            <input type="hidden" id="patID" name="patID" value="<?= $patID ?>" placeholder="platform ID" required>
                            <div class="form-add">
                            <button class="btn" type="submit" name="edit_platform">
                                <i class="fa fa-pencil-alt"></i> Edit Platform
                            </button>
                    </div>
                        </form>
                    <?php } else {  ?>
                        <form method="POST" enctype="multipart/form-data">
                            <h3>Platform Info</h3>
                            <div class="input-grid">
                                <div class="input-box">
                                    <label for="platformName">Platform Name</label>
                                    <input type="text" id="platformName" name="platformName" placeholder="Platform Name" required>
                                </div>
                                <div class="input-box">
                                    <label for="platformStatus">Platform Status</label>
                                    <select name="platformStatus" id="platformStatus" required>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-box">
                                <label for="platformLogo">Platform Logo</label>
                                <input type="file" name="platformLogo" id="platformLogo" placeholder="Upload Platform Logo" accept="image/*" required>
                            </div>
                            <div class="form-add">
                            <button class="btn" type="submit" name="add_platform">
                                <i class="fa fa-plus"></i> Add Platform
                            </button>
                    </div>
                        </form>
                    <?php } ?>

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