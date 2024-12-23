<?php //include admin_function
        include_once('../function/admin_function.php');
    //check authenticated admin
    unauthenticated_admin();



?>
<!DOCTYPE html>
<html lang="en">
<?php include_once('partials/head.php');  ?>

<body>
    <?php include_once('partials/header.php');  ?>
    <div class="backend login">
        <form method="POST">
            <h2>Login</h2>
            <div class="input-box">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter registered email address" required>
            </div>
            <div class="input-box">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter registered password" required>
            </div>
            <div class="form-add">
            <button class="btn" type="submit" name="admin_authentication"> Login</button>
</div>
          
        </form>

        <footer>
            <p>@Copyright All Right Reserved | 2023</p>
        </footer>
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