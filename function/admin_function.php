<?php //include database connection page
        include_once('database_connection.php');

//check admin login activity
function authenticated_admin(){
    if(empty($_SESSION['AdminData'])){
        echo'<script>alert("You need to log in as admin to access this page."); window.location="Login";</script>';
    }
}

//check admin login activity
function unauthenticated_admin(){
    if(isset($_SESSION['AdminData'])){
        echo'<script>alert("You are already logged in."); window.location="Dashboard";</script>';
    }
}

//admin authentication
if(isset($_POST['admin_authentication'])){
    $admin_email=trim($_POST['email']);
    $admin_pass=md5(trim($_POST['password']));

    //get user details by email
    $query=$connection->prepare("SELECT * FROM `users` WHERE `email`='$admin_email'");
    $query->execute();
    $result=$query->get_result();
     // Check if user exists
     if ($result->num_rows > 0) {
        // Fetch user data
        $user = $result->fetch_assoc();

        //check user role
        if($user['role_type']!='Admin'){
            echo'<script>alert("You do not have admin privileges."); </script>';
        }else if(!$user['is_active']){
            echo '<script>alert("Your account is inactive. Please contact support."); </script>';
        }else if($user['password']!=$admin_pass){
            echo '<script>alert("Incorrect password. Please try again."); </script>';
        }else{
            //save admin data in session
            $_SESSION['AdminData']=$user;
            echo '<script>alert("Authentication successful!"); window.location="Dashboard";</script>';
        }
     }else{
        echo'<script>alert("No user found with this email address."); window.location="Login";</script>';
     }
}

//add new category
if(isset($_POST['add_category'])){
    $catName=trim($_POST['categoryName']);
    $catDescription=trim($_POST['categoryDescription']);
    $isActive=true;

    if(empty($catName) || empty($catDescription)){
        echo '<script>alert("Please fill all required fields.");</script>';
    }else{
        $sql=$connection->prepare('INSERT INTO `categories`(`category_name`, `description`, `is_active`) VALUES (?,?,?)');
        $sql->bind_param('sss',$catName,$catDescription,$isActive);
        if($sql->execute()){
            echo'<script>alert("New category added successfully."); window.location="InfluencerCategories";</script>';
        }
    }
}

//update exist category detais
if(isset($_POST['edit_category'])){
    $catName=trim($_POST['categoryName']);
    $catDescription=trim($_POST['categoryDescription']);
    $catID=$_POST['catID'];

    if(empty($catName) || empty($catDescription)){
        echo '<script>alert("Please fill all required fields.");</script>';
    }else{
        $sql=$connection->prepare('UPDATE `categories` SET `category_name`=?,`description`=? WHERE `id`=?');
        $sql->bind_param('ssi',$catName,$catDescription,$catID);
        if($sql->execute()){
            echo'<script>alert("Category details updated successfully."); window.location="InfluencerCategories";</script>';
        }
    }
}


//add new industry
if(isset($_POST['add_industry'])){
    $indName=trim($_POST['industryName']);
    $indDescription=trim($_POST['industryDescription']);
    $isActive=true;

    if(empty($indName) || empty($indDescription)){
        echo '<script>alert("Please fill all required fields.");</script>';
    }else{
        $sql=$connection->prepare('INSERT INTO `industries`( `industry_name`, `description`) VALUES (?,?)');
        $sql->bind_param('ss',$indName,$indDescription);
        if($sql->execute()){
            echo'<script>alert("New industry added successfully."); window.location="IndustryList";</script>';
        }
    }
}

//update exist industry detais
if(isset($_POST['edit_industry'])){
    $indName=trim($_POST['industryName']);
    $indDescription=trim($_POST['industryDescription']);
    $indID=$_POST['indID'];

    if(empty($indName) || empty($indDescription)){
        echo '<script>alert("Please fill all required fields.");</script>';
    }else{
        $sql=$connection->prepare('UPDATE `industries` SET `industry_name`=?,`description`=? WHERE `id`=?');
        $sql->bind_param('ssi',$indName,$indDescription,$indID);
        if($sql->execute()){
            echo'<script>alert("industry details updated successfully."); window.location="IndustryList";</script>';
        }
    }
}



if (isset($_POST['edit_platform'])) {
    // Get form data
    $platformName = $_POST['platformName'];
    $platformStatus = $_POST['platformStatus'];
    $patID = $_POST['patID'];

    // Check if a new image is uploaded
    if ($_FILES['platformLogo']['error'] == 0) {
        // Image uploaded
        $platformLogo = $_FILES['platformLogo'];
        $filename=$platformLogo["name"];
        $targetDir = "assets/img/";
        $targetFile = $targetDir . basename($filename);
        // Move uploaded file to target directory
        if (move_uploaded_file($platformLogo["tmp_name"], $targetFile)) {
            // Update all data including image
            $sql = $connection->prepare('UPDATE `social_platform` SET `platform_name`= ?,`platform_image`= ?,`is_active`= ? WHERE `id`=?');
            $sql->bind_param("sssi", $platformName, $filename, $platformStatus, $patID);
        } else {
            echo '<script>alert("Sorry, there was an error uploading your file.");</script>'; 
        }
    } else {
        // Update data without image
        $sql = $connection->prepare('UPDATE `social_platform` SET `platform_name`= ?,`is_active`= ? WHERE `id`=?');
        $sql->bind_param("ssi", $platformName, $platformStatus, $patID);
    }

    if ($sql->execute()) {
        echo '<script>alert("Platform updated successfully.");window.location="PlatformList";</script>'; 
    } else {
        echo '<script>alert("Error: ".' . $sql->error.');</script>'; 
    }
} 


if (isset($_POST['add_platform'])) {
    // New platform, handle all fields including image
    $platformName = $_POST['platformName'];
    $platformStatus = $_POST['platformStatus'];
    $platformLogo = $_FILES['platformLogo'];
    $targetDir = "../assets/img/";
    $targetFile = $targetDir . basename($platformLogo["name"]);
    
    // Move uploaded file to target directory
    if (move_uploaded_file($platformLogo["tmp_name"], $targetFile)) {
        // Insert new platform data
        $sql = $connection->prepare('INSERT INTO `social_platform`( `platform_name`, `platform_image`, `is_active`) VALUES (? , ?, ?)');
        $sql->bind_param("sss", $platformName, $platformLogo["name"], $platformStatus);
        
        if ($sql->execute()) {
            echo '<script>alert("New platform added successfully.");window.location="PlatformList";</script>'; 
           
        } else {
            echo '<script>alert("Error: ".' . $sql->error.');</script>'; 
        }
    } else {
        echo '<script>alert("Sorry, there was an error uploading your file.");</script>'; 
    }
}
?>


