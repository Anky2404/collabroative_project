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
   <section class="home_1">
      <div class="container">
         <div class="row">
            <div class="col6">
               <div class="home-left">
                  <h1>Partner with <span>Influencers</span> to Amplify Your Brand</h1>
                  <p>Connect with top influencers to expand your brand's reach, engage your audience, and drive
                     real results through strategic collaborations and authentic content creation. </p>
                  <a class="btn" href="#">Discover More</a>

               </div>
            </div>
            <div class="col6">
               <div class="image">
                  <img src="assets/img/home-img1.png" alt="Partner with Influencers" title="Partner with Influencers">
               </div>
            </div>
         </div>
      </div>
      <div class="bottom-img">
         <img src="assets/img/home-img2.png" alt="Partner with Influencers" title="Partner with Influencers" width="685"
            height="525">
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
   <section class="home_4">
      <div class="container">
         <div class="heading">
            <h2>How It Works?</h2>

         </div>
         <div class="work-wrap">
            <div class="row">
               <div class="col7">
                  <div class="work-left">
                     <div class="row">
                        <div class="col6">
                           <div class="work-box">
                              <div class="work-img text-center">
                                 <img src="assets/img/user-check.png" alt="Create account" title="Create account"
                                    width="50" height="50">
                              </div>
                              <h3>Create Account</h3>
                              <p>Sign up today to access exclusive content, updates, and personalized offers
                                 andinfluencer opportunities.</p>
                           </div>
                        </div>
                        <div class="col6">
                           <div class="work-box" style="background-color: #FFF9F2;">
                              <div class="work-img text-center">
                                 <img src="assets/img/complete-profile.png" alt="complete profile"
                                    title="complete profile" width="50" height="50">
                              </div>
                              <h3>Complete Profile</h3>
                              <p>Almost there! To get the most out of your experience, please complete your
                                 profile.</p>
                           </div>
                        </div>
                        <div class="col6">
                           <div class="work-box" style="background-color: #FFF9F2;">
                              <div class="work-img text-center">
                                 <img src="assets/img/find-brand.png" alt="complete profile"
                                    title="complete profile" width="50" height="50">
                              </div>
                              <h3>Find Brand</h3>
                              <p>We aim to inspire change, encourage creativity, and make a positive impact.
                              </p>
                           </div>
                        </div>
                        <div class="col6">
                           <div class="work-box">
                              <div class="work-img text-center"> <img src="assets/img/send.png"
                                    alt="complete profile" title="complete profile" width="50" height="50">
                              </div>

                              <h3>Collaborate</h3>
                              <p>we believe in the power of collaboration. Whether you're a fellow brand,
                                 influencer, content creator, or business partner</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col5">
                  <div class="work-right text-center">
                     <div class="work-img ">
                        <img src="assets/img/work-img.png" alt="Influencer Community" title="Influencer Community"
                           width="200" height="200">
                     </div>
                     <h2>How Our <span>Influencer Community</span> Works: Join, Collaborate, Succeed</h2>
                     <p>Joining our influencer community is easy! Connect with top brands, collaborate on
                        exclusive campaigns, and earn rewards while growing your influence. Whether you're a
                        seasoned pro or just starting, we provide the platform and support to succeed.</p>
                     <a class="btn" href="#">Show More</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="home_3">
      <div class="container">
         <div class="insight-heading">
            <h2>We value your thoughts and insights</h2>
            <p>We value your thoughts and insights to help us improve and serve you better. Share today! </p>
         </div>
         <div class="insight-wrap">
            <div class="row">
               <div class="col4">
                  <div class="insight-box">
                     <div class="insight-top">
                        <div class="insight-img">
                           <img src="assets/img/insight-img1.png" alt="thoughts and insights"
                              title="thoughts and insights">
                        </div>
                        <div class="insight-name">
                           <h3>Guy Hawkins</h3>
                           <span>Marketing Executives</span>
                        </div>
                        <div class="insight-icon"><img src="assets/img/like-icon.png" alt=""></div>
                     </div>
                     <p>Working with influencers through this amazing influencer community has been a
                        game-changer for our brand. We saw increased engagement and brand visibility, and the
                        process was seamless from start to finish.
                     </p>
                  </div>
               </div>
               <div class="col4">
                  <div class="insight-box">
                     <div class="insight-top">
                        <div class="insight-img">
                           <img src="assets/img/insight-img2.png" alt="thoughts and insights"
                              title="thoughts and insights">
                        </div>
                        <div class="insight-name">
                           <h3>Jane Cooper</h3>
                           <span>Digital Marketer</span>

                        </div>
                        <div class="insight-icon"><img src="assets/img/icon1.png" alt=""></div>
                     </div>
                     <p>The influencers we partnered with through the community helped us connect authentically
                        with our audience. The results were impressive—more engagement, higher conversions, and
                        a boost in brand awareness.
                     </p>
                  </div>
               </div>
               <div class="col4">
                  <div class="insight-box">
                     <div class="insight-top">
                        <div class="insight-img">
                           <img src="assets/img/insight-img3.png" alt="thoughts and insights"
                              title="thoughts and insights">
                        </div>
                        <div class="insight-name">
                           <h3>Jenny Wilson</h3>
                           <span>Digital Entrepreneur</span>
                        </div>
                        <div class="insight-icon"><img src="assets/img/like-icon.png" alt=""></div>
                     </div>
                     <p>The influencer community has been an invaluable resource for our brand. The partnerships
                        felt authentic, and the results were outstanding—more followers, higher engagement,
                        Highly recommend!
                     </p>
                  </div>
               </div>
            </div>
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