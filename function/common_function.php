<?php //include database connection page
include_once('database_connection.php');




//fetch all company
function fetch_all_influencer_categories()
{
    global $connection;
    $companies = [];
    $sql = $connection->prepare('SELECT * FROM `categories`');
    $sql->execute();
    $results = $sql->get_result();
    if ($results->num_rows > 0) {
        while ($data = $results->fetch_assoc()) {
            //store data in array
            $companies[] = $data;
        }
    }
    //return companies data
    return $companies;
}

//fetch all industries
function fetch_all_industries(){
    global $connection;
    $industries = [];
    $sql = $connection->prepare('SELECT * FROM `industries`');
    $sql->execute();
    $results = $sql->get_result();
    if ($results->num_rows > 0) {
        while ($data = $results->fetch_assoc()) {
            //store data in array
            $industries[] = $data;
        }
    }
    //return industries data
    return $industries; 
}

//fetch all industries
function get_industry_by_id($indID){
    global $connection;
    $industries = [];
    $sql = $connection->prepare('SELECT * FROM `industries` WHERE `id`=?');
    $sql->bind_param('i',$indID);
    $sql->execute();
    $results = $sql->get_result();
    if ($results->num_rows > 0) {
        while ($data = $results->fetch_assoc()) {
            //store data in array
            $industries = $data;
        }
    }
    //return industries data
    return $industries; 
}

//fetch all influencer according to category id
function fetch_all_influencers_by_categories($cat_id)
{
    global $connection;
    $influencers = [];
    $sql = $connection->prepare("SELECT i.`id` AS `inf_id`, i.*, u.*, ir.*,c.* 
    FROM `influencer` i 
    JOIN `users` u ON i.`user_id` = u.`id` INNER JOIN `categories`c ON c.`id`=i.`category_id` 
    INNER JOIN `influencer_request` ir ON ir.`requested_by` = i.`id` 
    WHERE i.`category_id` = ? AND ir.`status` = 'Approved'");
    $sql->bind_param("i", $cat_id);
    $sql->execute();
    $results = $sql->get_result();
    if ($results->num_rows > 0) {
        while ($data = $results->fetch_assoc()) {
            //store data in array
            $influencers[] = $data;
        }
    }
    //return influencers data
    return $influencers;
}

//fetch all influencer according to platform id
function fetch_all_influencers_by_platform($pat_id)
{
    global $connection;
    $influencers = [];
    $sql = $connection->prepare("SELECT i.`id` AS `inf_id`, i.*, u.*, ir.*,c.*,isl.*,sp.* 
    FROM `influencer` i 
    JOIN `users` u ON i.`user_id` = u.`id` INNER JOIN `influencer_social_link`isl ON isl.`influencer_id`=i.`id` INNER JOIN `social_platform`sp ON sp.`id`=isl.`platform_id` INNER JOIN `categories`c ON c.`id`=i.`category_id` 
    INNER JOIN `influencer_request` ir ON ir.`requested_by` = i.`id` 
    WHERE isl.`platform_id` = ? AND ir.`status` = 'Approved'");
    $sql->bind_param("i", $pat_id);
    $sql->execute();
    $results = $sql->get_result();
    if ($results->num_rows > 0) {
        while ($data = $results->fetch_assoc()) {
            //store data in array
            $influencers[] = $data;
        }
    }
    //return influencers data
    return $influencers;
}

//get category details by id
function get_category_by_id($catID){
    global $connection;
    $category = [];
    $sql = $connection->prepare('SELECT * FROM `categories` WHERE `id`=?');
    $sql->bind_param("i", $catID);
    $sql->execute();
    $results = $sql->get_result();
    if ($results->num_rows > 0) {
        while ($data = $results->fetch_assoc()) {
            //store data in array
            $category = $data;
        }
    }
    //return categories data
    return $category;
}

//get influencer details by id
function get_influencer_details_by_id($infID)
{
    global $connection;
    $details = [];
    $sql = $connection->prepare('SELECT i.`id` AS `inf_id`, i.*, u.*, c.* FROM `influencer`i 
    INNER JOIN `users`u ON i.`user_id`=u.`id` 
    JOIN `categories`c ON c.`id`=i.`category_id`  WHERE i.id=?');
    $sql->bind_param("i", $infID);
    $sql->execute();
    $results = $sql->get_result();
    if ($results->num_rows > 0) {
        while ($data = $results->fetch_assoc()) {
            //store data in array
            $details = $data;
        }
    }
    //return influencers data
    return $details;
}


//get request details by id
function get_request_details_by_id($reqID)
{
    global $connection;
    $req_details = [];
    $sql = $connection->prepare("SELECT * FROM `influencer_request`ir 
    INNER JOIN `influencer`i ON i.id=ir.`requested_by` JOIN `users`u 
    ON u.`id`=i.`user_id` JOIN `categories`c ON c.`id`=i.`category_id` WHERE ir.`id`=?");
    $sql->bind_param("i", $reqID);
    $sql->execute();
    $results = $sql->get_result();
    if ($results->num_rows > 0) {
        while ($data = $results->fetch_assoc()) {
            //store data in array
            $req_details = $data;
        }
    }
    //return request details data
    return $req_details;
}

//get company by industry id
function get_companies_by_ind_id($indID){
    global $connection;
    $companies = [];
    $sql = $connection->prepare('SELECT * FROM `company` WHERE `industry_id`=?');
    $sql->bind_param("i", $indID);
    $sql->execute();
    $results = $sql->get_result();
    if ($results->num_rows > 0) {
        while ($data = $results->fetch_assoc()) {
            //store data in array
            $companies[] = $data;
        }
    }
    //return company details data
    return $companies;
}

// get influencer social links 
function get_influencer_social_links($infID)
{
    global $connection;
    $links = [];
    $sql = $connection->prepare("SELECT * FROM `influencer_social_link`isl  
    INNER JOIN `social_platform`sp ON sp.`id`=isl.`platform_id`WHERE `influencer_id`=?");
    $sql->bind_param("i", $infID);
    $sql->execute();
    $results = $sql->get_result();
    if ($results->num_rows > 0) {
        while ($data = $results->fetch_assoc()) {
            //store data in array
            $links[] = $data;
        }
    }
    //return influencer social links data
    return $links;
}

//fetch all platform details
function fetch_all_platforms(){
    global $connection;
    $platforms = [];
    $sql = $connection->prepare('SELECT * FROM `social_platform`');
    $sql->execute();
    $results = $sql->get_result();
    if ($results->num_rows > 0) {
        while ($data = $results->fetch_assoc()) {
            //store data in array
            $platforms[] = $data;
        }
    }
    //return platform data
    return $platforms;
}


//get platform details by id
function get_platform_by_id($patID){
    global $connection;
    $platform = [];
    $sql = $connection->prepare('SELECT * FROM `social_platform` WHERE `id`=?');
    $sql->bind_param("i", $patID);
    $sql->execute();
    $results = $sql->get_result();
    if ($results->num_rows > 0) {
        while ($data = $results->fetch_assoc()) {
            //store data in array
            $platform = $data;
        }
    }
    //return platforms data
    return $platform;
}



//get total user
function fetch_all_users($role = null)
{
    global $connection;
    $users = [];
    if ($role == 'Manager') {
        $sql = $connection->prepare("SELECT * FROM `users`u INNER JOIN `company`c 
        ON u.`company_id`=c.`id` WHERE `role_type`='Manager'");
    } else if ($role == 'Influencer') {
        $sql = $connection->prepare(
            "SELECT u.`id` AS `user_id`, 
                    i.`id` AS `inf_id`,
                    i.*,
                    u.*,
                    u.*, 
                    ir.* ,
                    c.*
             FROM `users` u 
             INNER JOIN `influencer` i ON u.`id` = i.`user_id` INNER JOIN `categories`c ON c.`id`=i.`category_id` 
             INNER JOIN `influencer_request` ir ON ir.`requested_by` = i.`id` 
             WHERE u.`role_type` = 'Influencer' 
             AND ir.`status` = 'Approved'"
        );
    }
    $sql->execute();
    $results = $sql->get_result();
    if ($results->num_rows > 0) {
        while ($data = $results->fetch_assoc()) {
            //store data in array
            $users[] = $data;
        }
    }
    //return users data
    return $users;
}

//get users details by id
function get_user_by_id($user_id)
{
    global $connection;
    $usrDetails = [];
        $sql = $connection->prepare('SELECT * FROM `users` WHERE `id`=?');
        $sql->bind_param('i',$user_id);
    $sql->execute();
    $results = $sql->get_result();
    if ($results->num_rows > 0) {
        while ($data = $results->fetch_assoc()) {
            //store data in array
            $usrDetails = $data;
        }
    }
    //return users details data
    return $usrDetails;
}

//fetch all company
function fetch_all_companies($indID=null)
{
    global $connection;
    $companies = [];
    if($indID!=null){
        $sql = $connection->prepare('SELECT c.`id` AS `com_id`,c.*,i.* FROM `company`c 
    JOIN `industries`i ON c.industry_id=i.id WHERE c.industry_id=?');  
    $sql->bind_param('i',$indID);
    }else{
        $sql = $connection->prepare('SELECT c.`id` AS `com_id`,c.*,i.* FROM `company`c 
    JOIN `industries`i ON c.industry_id=i.id ');
    }
   
    $sql->execute();
    $results = $sql->get_result();
    if ($results->num_rows > 0) {
        while ($data = $results->fetch_assoc()) {
            //store data in array
            $companies[] = $data;
        }
    }
    //return companies data
    return $companies;
}

//get company details by id
function get_company_details_by_id($comID){
    global $connection;
    $comDetails = [];
    $sql = $connection->prepare('SELECT c.`id` AS `com_id`,u.`id` AS `user_id`,c.*,i.*,u.* FROM `company`c 
    JOIN `industries`i ON c.industry_id=i.id INNER JOIN `users`u ON c.`id`=u.`company_id` WHERE c.`id`=?');
    $sql->bind_param('i',$comID);
    $sql->execute();
    $results = $sql->get_result();
    if ($results->num_rows > 0) {
        while ($data = $results->fetch_assoc()) {
            //store data in array
            $comDetails = $data;
        }
    }
    //return company details data
    return $comDetails;
}

//fetch collabroation requestion
function fetch_all_collabroation_request($manID = null, $infID = null)
{
    global $connection;
    $collabroations = [];
    if ($manID != null) {
        $sql = $connection->prepare('SELECT u.`firstname` AS `user_firstname`,u.`lastname` AS `user_lastname`,
        iu.`firstname` AS `inf_firstname`,iu.`lastname` AS `inf_lastname`,cr.id AS `collab_id`,cr.*,sp.* FROM `collaboration_requests`cr
        INNER JOIN `social_platform` sp ON sp.`id`=cr.`platform_id`
         INNER JOIN `users`u ON cr.`user_id`=u.`id` JOIN `influencer`i ON cr.`influencer_id`=i.`id` 
         JOIN `users`iu ON i.`user_id`=iu.`id` WHERE cr.`user_id`=?');
         $sql->bind_param('i',$manID);
    } else if ($infID != null) {
        $sql = $connection->prepare('SELECT u.`firstname` AS `user_firstname`,u.`lastname` AS `user_lastname`,
        iu.`firstname` AS `inf_firstname`,iu.`lastname` AS `inf_lastname`,cr.id AS `collab_id`,cr.*,sp.* FROM `collaboration_requests`cr 
        INNER JOIN `social_platform` sp ON sp.`id`=cr.`platform_id`
        INNER JOIN `users`u ON cr.`user_id`=u.`id` JOIN `influencer`i ON cr.`influencer_id`=i.`id` 
        JOIN `users`iu ON i.`user_id`=iu.`id` WHERE `influencer_id`=?');
        $sql->bind_param('i',$infID);
    } else {
        $sql = $connection->prepare('SELECT u.`firstname` AS `user_firstname`,u.`lastname` AS `user_lastname`,
        iu.`firstname` AS `inf_firstname`,iu.`lastname` AS `inf_lastname`,cr.id AS `collab_id`,cr.*,sp.* FROM `collaboration_requests`cr
        INNER JOIN `social_platform` sp ON sp.`id`=cr.`platform_id` 
        INNER JOIN `users`u ON cr.`user_id`=u.`id` JOIN `influencer`i ON cr.`influencer_id`=i.`id` 
        JOIN `users`iu ON i.`user_id`=iu.`id`');
    }
    $sql->execute();
    $results = $sql->get_result();
    if ($results->num_rows > 0) {
        while ($data = $results->fetch_assoc()) {
            //store data in array
            $collabroations[] = $data;
        }
    }
    //return companies data
    return $collabroations;
}

//fetch payment details 
function fetch_payment_list(){
    global $connection;
    $payments = [];
    $sql = $connection->prepare('SELECT * FROM `payments`');
    $sql->execute();
    $results = $sql->get_result();
    if ($results->num_rows > 0) {
        while ($data = $results->fetch_assoc()) {
            //store data in array
            $payments[] = $data;
        }
    }
    //return payments data
    return $payments;
}


//fetch payment details 
function get_payment_details_by_id($pmtID){
    global $connection;
    $pmtDetails = [];
    $sql = $connection->prepare('SELECT * FROM `payments`p INNER JOIN `invoices`i ON p.`invoice_id`=i.`id` INNER JOIN `collaboration_requests`cr ON cr.`id`=i.`collab_id` WHERE p.`id`=?');
    $sql->bind_param('i',$pmtID);
    $sql->execute();
    $results = $sql->get_result();
    if ($results->num_rows > 0) {
        while ($data = $results->fetch_assoc()) {
            //store data in array
            $pmtDetails = $data;
        }
    }
    //return payments details data
    return $pmtDetails;
}

//fetch all influencer account request
function fetch_all_influencer_request()
{
    global $connection;
    $requests = [];
    $sql = $connection->prepare('SELECT ir.`id` AS `req_id`,ir.`status` AS `req_status`, ir.*,i.*,u.* FROM `influencer_request`ir INNER JOIN `influencer`I ON ir.`requested_by`=i.`id` INNER JOIN `users`u ON u.`id`=i.`user_id`');
    $sql->execute();
    $results = $sql->get_result();
    if ($results->num_rows > 0) {
        while ($data = $results->fetch_assoc()) {
            //store data in array
            $requests[] = $data;
        }
    }
    //return requests data
    return $requests;
}

//update requested status
if (isset($_POST['req_id']) && isset($_POST['action'])) {
    // Get company id and status
    $reqID = $_POST['req_id'];
    $action = trim($_POST['action']);
    // prepated sql query to update
    $sql = $connection->prepare('UPDATE `influencer_request` SET `status`= ? WHERE `id`= ?');
    $sql->bind_param("si", $action, $reqID);
    if ($sql->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}

//filter influencer accroding to category
if (isset($_POST['filter_inf'])) {
    // Retrieve the category ID or platform ID 
    $catID = $_POST['catID'] ?? null;
    $platID = $_POST['plat_id'] ?? null;
    $influencers = [];

    // Check if category ID is provided
    if ($catID !== null) {
        // Fetch influencers by category ID
        $influencers = fetch_all_influencers_by_categories($catID);
        
        // Get their social links
        foreach ($influencers as &$influencer) {
            //Get the influencer ID
            $inf_id = $influencer['inf_id'];
            
            $social_links = get_influencer_social_links($inf_id);
            
            // Add influencer social links
            $influencer['social_links'] = $social_links;
        }
    } else if ($platID !== null) {
        // Fetch influencers by platform ID
        $influencers = fetch_all_influencers_by_platform($platID);
        
        // Get their social links
        foreach ($influencers as &$influencer) {
            //Get the influencer ID
            $inf_id = $influencer['inf_id'];
            
            $social_links = get_influencer_social_links($inf_id);
            
            // Add influencer social links
            $influencer['social_links'] = $social_links;
        }
    } else {
        // If Influencer not found
        $influencers = ['message' => 'No category or platform ID provided'];
    }

    // Output the influencers data as JSON
    echo json_encode($influencers);
}



