<?php include_once('database_connection.php');

//check authenticated user
function authenticated_user()
{
        if (!isset($_SESSION['Influencer']) && !isset($_SESSION['Manager'])) {
                echo '<script>alert("Please login to access this page."); window.location="Login";</script>';
        }
}

//unauthenticated user
function unauthenticated_user()
{
        if (isset($_SESSION['Influencer']) || isset($_SESSION['Manager'])) {
                echo '<script>alert("You are already logged in."); window.location="Index";</script>';
        }
}

//Create influencer account
if (isset($_POST['create_inf_account'])) {
        $category_id = $_POST['category'];
        $firstname = trim($_POST['first_name']);
        $lastname = trim($_POST['last_name']);
        $email = trim($_POST['email']);
        $contact = trim($_POST['contact']);
        $password = md5(trim($_POST['password']));
        $is_active = true;
        $role_type = 'Influencer';
        $account_status = 'Pending';

        // Check required fields cannot be empty
        if (empty($firstname) || empty($lastname) || empty($category_id) || empty($email) || empty($contact) || empty($password)) {
                echo '<script>alert("Please fill all required fields.");</script>';
        } else {

                // Check if a new image is uploaded
                if ($_FILES['profile_img']['error'] == 0) {
                        // Image uploadeds
                        $profileImg = $_FILES['profile_img'];
                        $filename = $profileImg["name"];
                        $targetDir = "assets/img/inf_img/";
                        $targetFile = $targetDir . basename($filename);
                        // Move uploaded file to target directory
                        if (move_uploaded_file($profileImg["tmp_name"], $targetFile)) {
                                //Insert data into users
                                $sql = $connection->prepare('INSERT INTO `users`( `firstname`, `lastname`, `email`, `phone`, `role_type`, `is_active`, `password`) VALUES (?,?,?,?,?,?,?)');
                                $sql->bind_param('sssssis', $firstname, $lastname, $email, $contact, $role_type, $is_active, $password);
                                if ($sql->execute()) {
                                        // Get the last inserted user ID
                                        $user_id = $connection->insert_id;
                                        //Insert data into influencer
                                        $sql1 = $connection->prepare('INSERT INTO `influencer`(`user_id`, `category_id`, `profile_img`) VALUES  (?,?,?)');
                                        $sql1->bind_param('iis', $user_id, $category_id, $filename);
                                        if ($sql1->execute()) {
                                                // Get the last inserted influencer ID
                                                $inf_id = $connection->insert_id;
                                                //Insert data into influencer request
                                                $sql2 = $connection->prepare('INSERT INTO `influencer_request`(`requested_by`, `status`) VALUES (?,?)');
                                                $sql2->bind_param('is', $inf_id, $account_status);
                                                if ($sql2->execute()) {
                                                        echo '<script>alert("Your account was created successfully."); window.location="Login";</script>';
                                                }
                                        }
                                }
                        } else {
                                echo '<script>alert("Sorry, there was an error uploading your file.");</script>';
                        }
                }
        }
}

// Handle login form
if (isset($_POST['user_login'])) {
        $email = trim($_POST['email']);
        $role = trim($_POST['role']);
        $password = md5(trim($_POST['password']));

        // Check required fields cannot be empty
        if (empty($email) || empty($role) || empty($password)) {
                echo '<script>alert("Please fill all required fields.");</script>';
        } else {
                // Get user data by email
                if ($role == 'Influencer') {
                        $sql = $connection->prepare('SELECT u.*, i.*, ir.* FROM `users` u INNER JOIN `influencer` i ON i.`user_id` = u.`id` INNER JOIN `influencer_request` ir ON ir.`requested_by` = i.`id` WHERE u.`email` = ?');
                } else {
                        $sql = $connection->prepare('SELECT * FROM `users` WHERE `email` = ?');
                }

                $sql->bind_param('s', $email);
                $sql->execute();
                $result = $sql->get_result();

                if ($result->num_rows > 0) {
                        $data = $result->fetch_assoc();

                        // Check if user is registered as the selected role
                        if ($data['role_type'] != $role) {
                                echo '<script>alert("You are not registered as ' . $role . '.");</script>';
                        } else if (!$data['is_active']) {
                                echo '<script>alert("Your account is inactive. Please contact support.");</script>';
                        } else if ($data['password'] != $password) {
                                echo '<script>alert("Your password does not match.");</script>';
                        } else {
                                // Check if influencer account is approved
                                if ($data['role_type'] == 'Influencer') {
                                        if ($data['status'] != 'Approved') {
                                                echo '<script>alert("Your influencer account is not approved yet.");</script>';
                                        } else {
                                                // Store influencer data in session
                                                $_SESSION['Influencer'] = $data;
                                                // Successful login
                                                echo '<script>alert("You are successfully logged in as ' . $role . '"); window.location="Index";</script>';
                                        }
                                } else {
                                        //Store manager data in session
                                        $_SESSION['Manager'] = $data;
                                        // Successful login
                                        echo '<script>alert("You are successfully logged in as ' . $role . '"); window.location="Index";</script>';
                                }
                        }
                } else {
                        // No account found with this email
                        echo '<script>alert("No account found with this email.");</script>';
                }
        }
}


//handle create company account form
if (isset($_POST['create_company_account'])) {
        // Retrieve form data
        $industry = $_POST['industry'];
        $company_name = trim($_POST['company_name']);
        $company_size = trim($_POST['company_size']);
        $location = trim($_POST['location']);
        $website = trim($_POST['website']);
        $contact_info = trim($_POST['contact_info']);
        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $password = md5(trim($_POST['password']));
        $role = 'Manager';
        $status = true;
        // Check required fields cannot be empty
        if (empty($industry) || empty($company_name) || empty($company_size) || empty($location) || empty($website) || empty($contact_info) || empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($password)) {
                echo '<script>alert("Please fill all required fields.");</script>';
        } else {
                //Insert company data
                $sql = $connection->prepare('INSERT INTO `company`( `industry_id`, `company_name`, `company_size`, `location`, `website`, `contact_info`) VALUES (?,?,?,?,?,?)');
                $sql->bind_param('isssss', $industry, $company_name, $company_size, $location, $website, $contact_info);

                if ($sql->execute()) {
                        // Retrieve the last inserted conpany id
                        $company = $connection->insert_id;
                        $sql1 = $connection->prepare('INSERT INTO `users`( `company_id`, `firstname`, `lastname`, `email`, `phone`, `role_type`, `is_active`, `password`) VALUES (?,?,?,?,?,?,?,?)');
                        $sql1->bind_param('isssssss', $company, $first_name, $last_name, $email, $phone, $role, $status, $password);
                        if ($sql1->execute()) {
                                echo '<script>alert("Your company registered successfully."); window.location="Login";</script>';
                        }
                }
        }
}


//handle sent collaboration request
if(isset($_POST['collab_request'])){
        $influencer_id = $_POST['influencer_id'];
        $manager_id = $_POST['manager_id'];
        $platform_id = $_POST['platform_id'];
        $campaign_details = trim($_POST['campaign_details']);
        $status = 'Pending';

        // Check required fields cannot be empty
        if (empty($campaign_details) || $influencer_id == null || $manager_id == null || $platform_id == null) {
                echo '<script>alert("Please fill all required fields.");</script>';
        } else {
                //Insert collaboration request
                $sql = $connection->prepare('INSERT INTO `collaboration_requests`(`user_id`, `platform_id`, `influencer_id`, `campaign_details`, `status`) VALUES  (?,?,?,?,?)');
                $sql->bind_param('iiiss', $manager_id, $platform_id, $influencer_id, $campaign_details, $status);
                if ($sql->execute()) {
                        echo '<script>alert("Your request was sent successfully."); window.location="Collabroations";</script>';
                }
        }
}

//handle collaboration request action
if(isset($_POST['action'])){
        $collab_id = $_POST['collab_id'];
        $action = $_POST['action'];
        if($action == 'accept-btn'){
                $action = 'Accepted';
        }else{
                $action = 'Rejected';
        }

        //Update collaboration request status
        $sql = $connection->prepare('UPDATE `collaboration_requests` SET `status`= ? WHERE `id`= ?');
        $sql->bind_param('si', $action, $collab_id);
        if ($sql->execute()) {
                echo 'success';
        }else{
                echo 'error';
        }
}
