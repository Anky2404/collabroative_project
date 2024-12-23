<?php
//include common function
include_once('function/user_function.php');
include_once('function/common_function.php');

//check authenticated user
authenticated_user();
$Manager = $_SESSION['Manager'] ?? null;
$Influencer = $_SESSION['Influencer'] ?? null;
$collabroations = fetch_all_collabroation_request();
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
                        <h1>Collabroations</h1>
                        <p>Influencer collaborations are powerful partnerships that help brands reach wider audiences, enhance credibility, and increase engagement. By leveraging influencers' trusted voices, businesses can effectively promote products and services to target markets.</p>


                    </div>
                </div>

            </div>
        </div>

    </section>
    <section class="influencer-detail">
        <div class="container">
            <div class="heading">
                <h2>Collabroations</h2>
            </div>



            <div class="booking-table ">
                <table>
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Requested By</th>
                            <th>Platform</th>
                            <th>Influencer</th>
                            <th>Campaign</th>
                            <th>Requested At</th>
                            <th>Status</th>
                            <?php if ($Influencer != null) { ?>
                                <th>Action</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sn = 1;
                        foreach ($collabroations as $collabroation) {
                            if ($collabroation['influencer_id'] == 11) { ?>
                                <tr>
                                    <td><?= $sn++ ?></td>
                                    <td><?= $collabroation['user_firstname'] . ' ' . $collabroation['user_lastname'] ?></td>
                                    <td><?= $collabroation['platform_name'] ?></td>
                                    <td><?= $collabroation['inf_firstname'] . ' ' . $collabroation['inf_lastname'] ?></td>
                                    <td><?= $collabroation['campaign_details'] ?></td>
                                    <td><?= date("d M Y", strtotime($collabroation['requested_at'])) ?></td>
                                    <td><span
                                            class="badge badge-<?php if ($collabroation['status'] == 'Pending') {
                                                                    echo 'primary';
                                                                } else if ($collabroation['status'] == 'Accepted') {
                                                                    echo 'success';
                                                                } else {
                                                                    echo 'danger';
                                                                } ?>"><?= $collabroation['status'] ?></span>
                                    </td>
                                    <?php if ($Influencer != null && $collabroation['status']=='Pending') { ?>
                                        <td class="action-btn"><button id="accept-btn" data-id="<?= $collabroation['collab_id'] ?>" class="btn btn-success">Accept</button> <button id="reject-btn" data-id="<?= $collabroation['collab_id'] ?>" class="btn btn-cancel">Reject</button></td>
                                    <?php } ?>
                                </tr>
                        <?php }
                        } ?>

                    </tbody>
                </table>

            </div>
        </div>
    </section>

    <?php include_once('partials/footer.php')  ?>

    <script>
        $(document).ready(function() {
            $('button').on('click', function() {
                // Get selected cat id
                var action = $(this).attr('id');
                var collab_id = $(this).data('id');
                let status;
                if(action == 'accept-btn'){
                    status = 'Accepted';
                }else{
                    status = 'Rejected';
                }

                // Create AJAX request 
                $.ajax({
                   url: 'function/user_function.php',
                   type: 'POST',
                   data: {
                      collab_id: collab_id,
                      action: action
                   },
                   success: function(response) {
                     if (response == 'success') {
                        alert('Collabroation request ' + status + 'ed successfully');
                        location.reload();
                     } else {
                        alert('Something went wrong');
                     }
                   }
                });
            });




        });
    </script>





</body>

</html>