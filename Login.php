<?php include_once('function/common_function.php');
include_once('function/user_function.php');




?>
<!DOCTYPE html>
<html lang="en">
<?php include_once('partials/head.php')  ?>

<body>
    <?php include_once('partials/login-header.php')  ?>
    <section class="login">
        <div class="container">
            <div class="row">
                <div class="col5">
                    <div class="login-left">
                        <img src="assets/img/login.png" alt="login" title="login" width="600" height="700">
                    </div>
                </div>
                <div class="col7">
                    <div class="form-wrap">
                        <form method="POST">
                            <h2>Login Here</h2>

                            <div class="input-grid">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="Enter your Email here" required>
                            </div>

                            <div class="input-grid">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" placeholder="Enter your Password here" required>
                            </div>

                            <div class="input-grid">
                                <label for="role">Login AS</label>
                                <select id="role" name="role" required>
                                    <option value="" disabled selected>Select Role</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Influencer">Influencer</option>
                                </select>
                            </div>
                            <div class="form-add">
                            <div class="form-btn">
                                <button type="submit" name="user_login" class="btn">Submit</button>
                            </div>
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