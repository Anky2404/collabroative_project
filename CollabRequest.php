<?php
//include common function
include_once('function/user_function.php');
include_once('function/common_function.php');

//check authenticated user
$Manager = $_SESSION['Manager'] ?? null;

//get inf id from url
$infID = isset($_GET['infID']) ? base64_decode(urldecode($_GET['infID'])) : null;
$patID = isset($_GET['patID']) ? base64_decode(urldecode($_GET['patID'])) : null;
if ($infID == null || $patID == null) {
    echo '<script>window.history.back();</script>';
    exit;
}

$infDetails = get_influencer_details_by_id($infID);
$platDetails = get_platform_by_id($patID);



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
                        <h1>Collabroation Request</h1>
                        <p>Influencer collaborations are powerful partnerships that help brands reach wider audiences, enhance credibility, and increase engagement. By leveraging influencers' trusted voices, businesses can effectively promote products and services to target markets.</p>


                    </div>
                </div>

            </div>
        </div>

    </section>
    <section class="contact2">

        <div class="container">
            <div class="row">


                <div class="contact-boxes" id="collab">

                    <div class="col8">
                        <div class="form-wrap" id="contact">
                            <form method="POST">
                                <h3>Collaboration Request</h3>

                                <div class="input-grid">
                                    <label for="influencer_name">Influencer Name</label>
                                    <input type="text" id="influencer_name" value="<?= $infDetails['firstname'] . ' ' . $infDetails['lastname'] ?>" placeholder="Name" readonly>
                                </div>

                                <div class="input-grid">
                                    <label for="platform_name">Platform Name</label>
                                    <input type="text" id="platform_name" name="platform_name" value="<?= $platDetails['platform_name'] ?>" readonly>
                                </div>

                                <div class="input-grid">
                                    <label for="campaign_details">Campaign Details</label>
                                    <textarea id="campaign_details" name="campaign_details" placeholder="Message" required></textarea>
                                </div>
                                <input type="hidden" value="<?= $infID ?>" name="influencer_id" hidden>
                                <input type="hidden" value="<?= $Manager['id'] ?>" name="manager_id" hidden>
                                <input type="hidden" value="<?= $patID ?>" name="platform_id" hidden>
                                <div class="form-btn" style="text-align:center;">
                                    <button type="submit" name="collab_request" class="btn">Send Request</button>
                                </div>
                            </form>


                        </div>
                    </div>


                </div>
            </div>




        </div>
        </div>
    </section>

    <?php include_once('partials/footer.php')  ?>

</body>

</html>