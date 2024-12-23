<?php 
//include admin_function
include_once('../function/admin_function.php');
include_once('../function/common_function.php');
//check authenticated admin
authenticated_admin();

//get inf id from url
$infID=isset($_GET['infID']) ? base64_decode(urldecode($_GET['infID'])) : null;
if($infID==null){
    echo '<script>window.history.back();</script>';
    exit; 
}
$infDetails=get_influencer_details_by_id($infID);
$links=get_influencer_social_links($infID);

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
                    <h2>Influencer Details</h2>
                </div>

            </div>

           <div class="req-details">
                <strong>Influencer ID : INF_000<?= $infID ?></strong><br>
                <strong>Influencer Category : <?= $infDetails['category_name'] ?></strong><br>
                <strong>Influencer Name : <?= $infDetails['firstname'] . ' ' . $infDetails['lastname'] ?></strong><br>
                <strong>Influencer Phone : <?= $infDetails['phone'] ?></strong><br>
                <strong>Influencer Email : <?= $infDetails['email'] ?></strong><br>
                <strong>Status :  <?php echo $infDetails['is_active'] ? 'Active' : 'Inactive'; ?></strong><br>
                <strong>Social Links : </strong><br>
                <?php foreach($links as $link){  ?>
                <ul>
                <li>Platform : <?= $link['platform_name'] ?></li>
                <li>Website Link : <?= $link['platform_link'] ?></li>
                <li>Flowers : <?= $link['total_flowers'] ?></li>
                <li>Engagement Rate : <?= $link['engagement_rate'] ?></li>
                <li>Charges : $<?= $link['price'] ?></li>
                </ul>

                <?php }  ?>
                
            </div>

            <div class="title ">
                <div class="title-left ">
                    <h2>Influencer Collabroation List</h2>
                </div>

            </div>
            <div class="booking-table ">
                <table>
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Influencer ID</th>
                            <th> Full Name</th>
                            <th> Email</th>
                            <th> Contact No</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="filtered-results">
                       
                    </tbody>
                </table>

            </div>







        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Approve the request
            $('button').click(function() {
                var action=$(this).attr('id');
                var reqId = '<?= $inf_id ?>'; 
                var isConfirmed = confirm('Are you sure you want to approve this request?');
                if(isConfirmed){
                // Send AJAX request to update the status
                $.ajax({
                    url: '../function/common_function.php', 
                    type: 'POST',
                    data: {
                        req_id: reqId,
                        action: action
                    },
                    success: function(response) {
                        // Check if the status update was successful
                        if (response === 'success') {
                            alert('Your Request '+action+' Successfully. ');
                            location.reload();
                        } else {
                            alert('Failed to approve the request.');
                        }
                    }
                });
            }
            });

        
        });
    </script>

</body>

</html>