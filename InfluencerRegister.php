<?php include_once('function/common_function.php');
include_once('function/user_function.php');

//get influencer categories
$categories = fetch_all_influencer_categories();


?>
<!DOCTYPE html>
<html lang="en">
<?php include_once('partials/head.php')  ?>

<body>
<?php include_once('partials/login-header.php')  ?>
    <section class="login register">
        <div class="container">
            <div class="row">
                <div class="col5">
                    <div class="login-left">
                        <img src="assets/img/login.png" alt="login" title="login" width="600" height="700">
                    </div>
                </div>
                <div class="col7">
                    <div class="form-wrap">
                        <form method="POST" enctype="multipart/form-data">
                            <h2>Create Influencer Account</h2>

                            
                            <div class="form-grid">
                            <div class="input-grid">
                                <label for="first-name">First Name</label>
                                <input type="text" id="first-name" placeholder="Enter your First Name here" name="first_name" required>
                            </div>

                            <div class="input-grid">
                                <label for="last-name">Last Name</label>
                                <input type="text" id="last-name" placeholder="Enter your Last Name here" name="last_name" required>
                            </div>
                            </div>


                            <div class="form-grid">
                            <div class="input-grid">
                                <label for="email">Email</label>
                                <input type="email" id="email" placeholder="Enter your Email here" name="email" required>
                            </div>

                            <div class="input-grid">
                                <label for="contact">Contact</label>
                                <input type="text" id="contact" placeholder="Enter your Contact Number here" name="contact" required>
                            </div>
                                    </div>


                                    <div class="form-grid">
                            <div class="input-grid">
                                <label for="Password">Password</label>
                                <input type="password" id="password" placeholder="Enter your Password here" name="password" required>
                            </div>
                            <div class="input-grid">
                                <label for="Category">Category</label>
                                <select id="Category" name="category" required>
                                    <option value="" disabled selected>Select a Category</option>
                                    <?php foreach ($categories as $category) {  ?>
                                        <option value="<?= $category['id'] ?>"><?= $category['category_name'] ?></option>
                                    <?php }  ?>
                                </select>
                            </div>

                            </div>
                            <div class="input-grid">
                                <label for="Profile">Profile Image</label>
                                <input type="file" name="profile_img" id="profile_img" placeholder="Upload Profile Pic" accept="image/*" required>
                            </div>
                            

                            <div class="form-btn">
                                <button type="submit" name="create_inf_account" class="btn">Create Account</button>
                            </div>

                            <div class="text">
                                <p>Already have an account?
                                    <a href="Login">Login</a>
                                </p>
                                <div class="or"><span>OR</span></div>
                            </div>

                            <div class="other-login">
                                <a href="#"><img src="assets/img/google.png" alt="Google icon" title="Google icon" width="30" height="30">
                                    <span>Sign up with Google</span></a>
                                <a href="#"><img src="assets/img/github.png" alt="Github icon" title="Github icon" width="30" height="30">
                                    <span>Sign up with Github</span></a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </section>
    <?php include_once('partials/footer.php')  ?>
</body>

</html>