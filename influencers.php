<?php include_once('function/common_function.php');
include_once('function/user_function.php');

//get influencer categories
$platforms = fetch_all_platforms();
$categories = fetch_all_influencer_categories();
$influencers = fetch_all_users('Influencer');



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
                        <h1>Influencers List</h1>
                        <p>Connect with top influencers to expand your brand's reach, engage your audience, and drive
                            real results through strategic collaborations and authentic content creation. </p>
                      

                    </div>
                </div>
           
            </div>
        </div>
        
    </section>
    <section class="home_2">
      <div class="container">
         <div class="heading">
            <h2>Check by platform</h2>
        
         </div>
         <!-- influencer categories -->
         <div class="row">
            <div class="col3">
               <h3 class="cat-h3">Categories</h3>
               <div class="catagory">

                  <ul>
                     <?php foreach ($categories as $category) { ?>
                        <li data-cat-id="<?= $category['id'] ?>"><?= $category['category_name'] ?></li>
                     <?php } ?>
                  </ul>
               </div>

            </div>
            <div class="col9">
               <div id="inf_filter" class="row">
                  <?php foreach ($platforms as $platform) {  ?>
                     <div data-id="<?= $platform['id'] ?>" class="col4">
                        <div class="influence-box">
                           <img src="assets/img/<?= $platform['platform_image'] ?>" alt="<?= $platform['platform_name'] ?>" title="<?= $platform['platform_name'] ?>">
                           <h3><?= $platform['platform_name'] ?></h3>

                        </div>
                     </div>
                  <?php } ?>
               </div>

            </div>

         </div>



      </div>
   </section>
   <section class="influencer-list">
      <div class="container">
         <div class="heading">
            <h2>Influencers</h2>
         </div>
         <div id="filteredResults" class="row">
            <?php foreach ($influencers as $influencer) {  ?>
               <div class="col4">
                  <div class="influence-box">
                     <div class="influence-infom">
                        <img src="assets/img/inf_img/<?= $influencer['profile_img'] ?>" alt="<?= $influencer['firstname'] . ' ' . $influencer['lastname'] ?>" title="<?= $influencer['firstname'] . ' ' . $influencer['lastname'] ?>">
                        <h3><?= $influencer['firstname'] . ' ' . $influencer['lastname'] ?></h3>
                        <a href="InfluencerDetails?infID=<?= urlencode(base64_encode($influencer['inf_id']))  ?>" class="btn">View</a>
                     </div>


                     <div class="platform-list">
                        <h3>Social PLatform</h3>
                        <ul>
                           <?php //get influencer social links
                           $links = get_influencer_social_links($influencer['inf_id']);
                           foreach ($links as $link) { ?>

                              <li><strong><?= $link['platform_name'] ?></strong>
                                 <p> Followers : <?= $link['total_followers'] ?> </p>
                              </li>

                           <?php } ?>
                        </ul>
                     </div>

                  </div>



               </div>
            <?php } ?>
         </div>
      </div>
   </section>
    <?php include_once('partials/footer.php')  ?>

    <script>
      $(document).ready(function() {
         $('ul li').on('click', function() {
            // Get selected cat id
            var categoryId = $(this).data('cat-id');
            console.log(categoryId);

            // Create AJAX request 
            $.ajax({
               url: 'function/common_function.php',
               type: 'POST',
               data: {
                  filter_inf: true,
                  catID: categoryId
               },
               success: function(response) {
                  try {
                     var influencers = JSON.parse(response);
                     var output = '';

                     if (influencers.length > 0) {
                        influencers.forEach(function(influencer) {
                           // Create the influencer's box
                           output += '<div class="col4">' +
                              '<div class="influence-box">' +
                              '<div class="influence-infom">' +
                              '<img src="assets/img/inf_img/' + influencer.profile_img + '" alt="' + influencer.firstname + ' ' + influencer.lastname + '" title="' + influencer.firstname + ' ' + influencer.lastname + '">' +
                              '<h3>' + influencer.firstname + ' ' + influencer.lastname + '</h3>' +
                              '<a href="InfluencerDetails?infID=' + encodeURIComponent(btoa(influencer.inf_id)) + '" class="btn">View</a>' +
                              '</div>' +
                              // Platform list section
                              '<div class="platform-list">' +
                              '<h3>Social Platform</h3>' +
                              '<ul>';

                            // Check if the social media links append 
                           if (influencer.social_links && influencer.social_links.length > 0) {
                              influencer.social_links.forEach(function(link) {
                                 output += '<li><strong>' + link.platform_name + '</strong> <p>Followers: ' + link.total_followers + '</p></li>';
                              });
                           }

                           // Close the platform list
                           output += '</ul></div>' +
                              '</div>' +
                              '</div>';
                        });
                     } else {
                        output = '<p style="color: red; margin-left:15px;">No influencers found for this category.</p>';
                     }

                     $('#filteredResults').html(output);
                  } catch (e) {
                     console.error('Error parsing JSON:', e);
                     alert('Failed to parse the response as JSON.');
                  }
               }



            });
         });



         $('#inf_filter .col4').on('click', function() {
            // Get selected cat id
            var platformId = $(this).data('id');

            // Create AJAX request 
            $.ajax({
               url: 'function/common_function.php',
               type: 'POST',
               data: {
                  filter_inf: true,
                  plat_id: platformId
               },
               success: function(response) {
                  try {
                     var influencers = JSON.parse(response);
                     var output = '';

                     if (influencers.length > 0) {
                        influencers.forEach(function(influencer) {
                           // Create the influencer's box
                           output += '<div class="col4">' +
                              '<div class="influence-box">' +
                              '<div class="influence-infom">' +
                              '<img src="assets/img/inf_img/' + influencer.profile_img + '" alt="' + influencer.firstname + ' ' + influencer.lastname + '" title="' + influencer.firstname + ' ' + influencer.lastname + '">' +
                              '<h3>' + influencer.firstname + ' ' + influencer.lastname + '</h3>' +
                              '<a href="InfluencerDetails?infID=' + encodeURIComponent(btoa(influencer.inf_id)) + '" class="btn">View</a>' +
                              '</div>' +
                              // Platform list section
                              '<div class="platform-list">' +
                              '<h3>Social Platform</h3>' +
                              '<ul>';

                           // Check if the social media links append 
                           if (influencer.social_links && influencer.social_links.length > 0) {
                              influencer.social_links.forEach(function(link) {
                                 output += '<li><strong>' + link.platform_name + '</strong> <p>Followers: ' + link.total_followers + '</p></li>';
                              });
                           }

                           // Close the platform list and the influencer box
                           output += '</ul></div>' +
                              '</div>' +
                              '</div>';
                        });
                     } else {
                        output = '<p style="color: red; margin-left:15px;">No influencers found for this category.</p>';
                     }

                     $('#filteredResults').html(output);
                  } catch (e) {
                     console.error('Error parsing JSON:', e);
                     alert('Failed to parse the response as JSON.');
                  }
               }


            });
         });
      });
   </script>


</body>

</html>