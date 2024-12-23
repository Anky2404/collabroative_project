<?php include_once('function/common_function.php');
include_once('function/user_function.php');

$industries = fetch_all_industries();
?>

<!DOCTYPE html>
<html lang="en">
<?php include_once('partials/head.php') ?>

<body>
    <?php include_once('partials/login-header.php') ?>
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
                        <form id="registrationForm" method="POST">
                            <!-- Step 1 -->
                            <div class="form-section" id="step1">
                                <h2>Register Your Company</h2>
                                <div class="form-grid">
                                    <div class="input-grid">
                                        <label for="Industry">Industry</label>
                                        <select id="industry" name="industry">
                                            <option value="">Select Industry</option>
                                            <?php foreach ($industries as $industry) { ?>
                                                <option value="<?= $industry['id'] ?>"><?= $industry['industry_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="input-grid">
                                        <label for="CompanyName">Company Name</label>
                                        <input type="text" id="company_name" name="company_name" placeholder="Enter your company name here">
                                    </div>
                                </div>
                                <div class="form-grid">
                                    <div class="input-grid">
                                        <label for="CompanySize">Company Size</label>
                                        <select id="company_size" name="company_size">
                                            <option value="">Select Company Size</option>
                                            <option value="Small">1-50 employees</option>
                                            <option value="Medium">51-200 employees</option>
                                            <option value="Large">200+ employees</option>
                                        </select>
                                    </div>

                                    <div class="input-grid">
                                        <label for="Location">Location</label>
                                        <input type="text" id="location" name="location" placeholder="Enter your company location here">
                                    </div>
                                </div>
                                <div class="form-grid">
                                    <div class="input-grid">
                                        <label for="Website">Website</label>
                                        <input type="text" id="website" name="website" placeholder="Enter your company website here">
                                    </div>

                                    <div class="input-grid">
                                        <label for="ContactInfo">Contact Info</label>
                                        <input type="text" id="contact_info" name="contact_info" placeholder="Enter your contact info here">
                                    </div>
                                </div>

                                <div class="next">
                                    <a href="javascript:void(0);" class="btn" id="nextStep1">Next</a>
                                </div>
                            </div>

                            <!-- Step 2 -->
                            <div class="form-section" id="step2" style="display: none;">
                                <h2>Register Your Manager</h2>
                                <div class="form-grid">
                                    <div class="input-grid">
                                        <label for="FirstName">First Name</label>
                                        <input type="text" id="first_name" name="first_name" placeholder="Enter your first name here">
                                    </div>

                                    <div class="input-grid">
                                        <label for="LastName">Last Name</label>
                                        <input type="text" id="last_name" name="last_name" placeholder="Enter your last name here">
                                    </div>
                                </div>
                                <div class="form-grid">
                                    <div class="input-grid">
                                        <label for="Email">Email</label>
                                        <input type="email" id="email" name="email" placeholder="Enter your email here">
                                    </div>

                                    <div class="input-grid">
                                        <label for="Phone">Phone</label>
                                        <input type="text" id="phone" name="phone" placeholder="Enter your phone number here">
                                    </div>
                                </div>

                                <div class="input-grid">
                                    <label for="Password">Password</label>
                                    <input type="password" id="password" name="password" placeholder="Enter your password here">
                                </div>

                                <div class="form-btn">
                                    <button type="submit" class="btn" name="create_company_account">Create Account</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include_once('partials/footer.php') ?>

   
    
    <script>
        $(document).ready(function () {
            $('#nextStep1').click(function () {
                // Check if all fields in step1 are filled
                if ($('#industry').val() === '' || $('#company_name').val() === '' || $('#company_size').val() === '' || $('#location').val() === '' || $('#website').val() === '' || $('#contact_info').val() === '') {
                    alert("Please fill in all fields.");
                } else {
                    // Hide step1 and show step2
                    $('#step1').hide();
                    $('#step2').show();
                }
            });

            $('#previousStep2').click(function () {
                // Hide step2 and show step1
                $('#step2').hide();
                $('#step1').show();
            });
        });
    </script>
</body>

</html>
