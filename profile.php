<?php include_once('function/common_function.php');
include_once('function/user_function.php');

//check authenticated user
authenticated_user();

//Get influencer & manager session
$Manager = $_SESSION['Manager'] ?? null;
$Influencer = $_SESSION['Influencer'] ?? null;

//  print_r($Influencer);die;


if ($Manager != null) {
    $comID = $Manager['company_id'];
    $comDetails = get_company_details_by_id($comID);
    $collabroations = fetch_all_collabroation_request($comDetails['user_id'], null);
    $profilename='Manager';
    
} else {
    $infID = $Influencer['requested_by'];
    $infDetails = get_influencer_details_by_id($infID);
    $links = get_influencer_social_links($infID);
    $collabroations = fetch_all_collabroation_request(null, $infID);
    $profilename='Influencer';
}

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
                        <h1>Profile</h1>
                        <p>Connect with top influencers to expand your brand's reach, engage your audience, and drive
                            real results through strategic collaborations and authentic content creation. </p>


                    </div>
                </div>

            </div>
        </div>

    </section>
    <section class="influencer-detail">
        <div class="container">
            <div class="heading">
                <h2><?=$profilename.' Profile' ?></h2>
            </div>
            <div class="influencer-info">
                <?php if ($Influencer != null) { ?>
                    <div class="col3">
                        
                        <ul>
                            <li >
                                <strong><img src="assets/img/inf_img/<?= $infDetails['profile_img'] ?>" alt="<?= $infDetails['firstname'] . ' ' . $infDetails['lastname'] ?>" width="100px" ; height="100px" ;></strong>
                                <p><?= $infDetails['firstname'] . ' ' . $infDetails['lastname'] ?></p>
                            </li>
                        </ul>

                    </div>
                    <div class="col9">
                        <ul>
                            <div class="left">
                                <li>
                                    <strong>Influencer ID:</strong>
                                    <p><?= 'INF_000' . $infID ?></p>
                                </li>
                                <li>
                                    <strong>Category:</strong>
                                    <p><?= $infDetails['category_name'] ?></p>
                                </li>

                                <li>
                                    <strong>Phone:</strong>
                                    <p><?= $infDetails['phone'] ?></p>
                                </li>
                            </div>
                            <div class="left">
                                <li>
                                    <strong>Email:</strong>
                                    <p><a href="mailto:john@gmail.com"><?= $infDetails['email'] ?></a></p>
                                </li>
                                <li>
                                    <strong>Status:</strong>
                                    <p><?php echo $infDetails['is_active'] ? 'Active' : 'Inactive'; ?></p>
                                </li>
                                <li>
                                    <strong>Social Links:</strong>
                                    <p class="social-links"><i class="fa-brands fa-facebook"></i> <i
                                            class="fa-brands fa-tiktok"></i><i class="fa-brands fa-youtube"></i> </p>
                                </li>
                            </div>
                        </ul>
                    </div>
                <?php } else { ?>
                    
                        <div class="main-class">
                        <div class="left" id="profile-left">
                        <ul>
                                <li>
                                    <strong>Company ID : </strong>
                                    <p><?= 'CMP_000' . $comID ?></p>
                                </li>
                                <li>
                                    <strong>Industry Name : </strong>
                                    <p><?= $comDetails['industry_name'] ?></p>
                                </li>

                                <li>
                                    <strong>company Name : </strong>
                                    <p><?= $comDetails['company_name'] ?></p>
                                </li>
                                <li>
                                    <strong>company Size : </strong>
                                    <p><?= $comDetails['company_size'] ?></p>
                                </li>
                                <li>
                                    <strong>company Website : </strong>
                                    <p><?= $comDetails['website'] ?></p>
                                </li>

                                <li>
                                    <strong>Contact Info : </strong>
                                    <p><?= $comDetails['contact_info'] ?></p>
                                </li>
                                </ul>
                            </div>
                            <div class="left" id="profile-left">
                                <ul> 
                                <li>
                                    <strong>Location : </strong>
                                    <p><?= $comDetails['location'] ?></a></p>
                                </li>
                                <li>
                                    <strong>Manager Name : </strong>
                                    <p><?= $comDetails['firstname'] . ' ' . $comDetails['lastname'] ?></p>
                                </li>
                                <li>
                                    <strong>Manager Phone : </strong>
                                    <p><?= $comDetails['phone'] ?></p>
                                </li>
                                <li>
                                    <strong>Manager Email :</strong>
                                    <p><?= $comDetails['email'] ?></a></p>
                                </li>
                                <li>
                                    <strong>Manager Status :</strong>
                                    <p><?php echo $comDetails['is_active'] ? 'Active' : 'Inactive'; ?></p>
                                </li>
                                </ul>
                            
                        </div>
                 
                    </div>
                <?php } ?>
            </div>

        </div>
    </section>

    <?php if ($Influencer != null) { ?>
        <section class="platform-div">
            <div class="container">
                <div class="heading">
                    <h2>Platforms</h2>
                </div>
                <div class="row">
                    <?php foreach ($links as $link) {  ?>
                        <div class="col4">
                            <div class="platform">
                                <img src="assets/img/<?= $link['platform_image'] ?>" alt="<?= $link['platform_name'] ?>" title="<?= $link['platform_name'] ?>">
                                <h3><?= $link['platform_name'] ?></h3>
                                <ul>
                                    <li><strong>Followers:</strong>
                                        <p><?= $link['total_followers'] ?></p>
                                    </li>
                                    <li> <strong>Engagement Rate:</strong>
                                        <p><?= $link['engagement_rate'] ?>%</p>
                                    </li>
                                    <li> <strong>Charges:</strong>
                                        <p>$<?= $link['price'] ?></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php }  ?>


                </div>
                <div style="width:100%; text-align:center;">

                    <button class="btn" id="addMoreBtn">Add More</button>
                </div>
            </div>
        </section>
    <?php } ?>
    <section class="profile-form">
        <div class="container">
            <div class="add-form" id="add-form" style="display: none;">
                <form>
                    <div class="heading">
                        <h2>Create your Account</h2>
                        <span class="close" id="closeBtn"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
                        </span>
                    </div>
                    <div class="input-field">
                        <div class="input-grid">
                            <label for="Full Name">Full Name</label>
                            <input type="text" placeholder="Enter your Fulll Name here">
                        </div>
                        <div class="input-grid">
                            <label for="Email">Email</label>
                            <input type="text" placeholder="Enter your Email here">
                        </div>
                    </div>
                    <div class="input-field">
                        <div class="input-grid" style="width:100%">
                            <label for="Contact">Contact</label>
                            <input type="text" placeholder="Enter your Contact here">
                        </div>
                    </div>
                    <div class="input-grid">
                        <label for="Subject">Subject</label>
                        <textarea name="Subject" id="" placeholder="Subject"></textarea>
                    </div>

                    <div class="form-btn">
                        <button class="btn">Add</button>
                    </div>


                </form>
            </div>
        </div>
    </section>

    <section class="influencer-detail">
        <div class="container">
            <div class="heading">
                <h2> collabroation Details</h2>
            </div>
            <div class="influencer-info">
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
                        foreach ($collabroations as $collabroation) { ?>
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


        <script>
            $(document).ready(function() {
                // Show the form 
                $('#addMoreBtn').click(function() {
                    $('#add-form').show();
                });

                // Hide the form 
                $('#closeBtn').click(function() {
                    $('#add-form').hide();
                });
            });
        </script>

    </section>
    <?php include_once('partials/footer.php')  ?>

</body>

</html>