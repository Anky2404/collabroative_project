<?php
//include admin_function
include_once('../function/admin_function.php');
include_once('../function/common_function.php');
//check authenticated admin
authenticated_admin();

//get Industry id from url
$indID = isset($_GET['indID']) ? base64_decode(urldecode($_GET['indID'])) : null;

$Industry = get_Industry_by_id($indID);






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
                    <h2><?php echo $indID != null ? 'Edit Industry' : 'Add Industry'; ?></h2>

                </div>
               
            </div>


            <div class="profile">

                <div class="profile-info">
                    <?php if ($indID != null) {  ?>
                        <form method="POST">
                            <h3>Industry Info</h3>
                            <div class="input-box">
                                <label for="IndustryName">Industry Name</label>
                                <input type="text" id="industryName" value="<?= $Industry['industry_name'] ?>" name="industryName" placeholder="Industry Name" required>
                            </div>
                            <div class="input-box">
                                <label for="IndustryDescription">Industry Description</label>
                                <textarea name="industryDescription" id="industryDescription" cols="63" rows="5" placeholder="industry Description" required><?= $Industry['description'] ?></textarea>
                            </div>
                            <input type="hidden" id="indID" name="indID" value="<?= $indID ?>" placeholder="Industry ID" required>
                            <div class="form-add">
                            <button class="btn" type="submit" name="edit_industry">
                                <i class="fa fa-pencil-alt"></i> Edit Industry
                            </button>
                    </div>

                        </form>
                    <?php } else {  ?>
                        <form method="POST">
                            <h3>Industry Info</h3>
                            <div class="input-box">
                                <label for="industryName">industry Name</label>
                                <input type="text" id="industryName" name="industryName" placeholder="Industry Name" required>
                            </div>
                            <div class="input-box">
                                <label for="industryDescription">industry Description</label>
                                <textarea name="industryDescription" id="industryDescription" cols="63" rows="5" placeholder="Industry Description" required></textarea>
                            </div>

                            <div class="form-add">
                            <button class="btn" type="submit" name="add_industry">
                                <i class="fa fa-plus"></i> Add Industry
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