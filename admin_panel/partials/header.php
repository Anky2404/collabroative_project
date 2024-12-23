<?php //include admin_function
        include_once('../function/logout_function.php');
?>

<header>
    <div class="head-wrap">
        <div class="colleft">
            <div class="logo">
                <a href="dashboard.html"> <img src="img/logo.png"  alt="logo" title="logo"></a>
            </div>
        </div>
        <div class="colright">
            <h3 onclick="return confirm('Are you sure you want to logout?')"><a href="?logout=<?=urlencode(base64_encode(true)).'&role='.urlencode(base64_encode('Admin'))  ?>"
            ><span><i class="fa fa-user" aria-hidden="true"></i></span> Logout</a></h3>
            <div class="menu" style="display: none;">

            </div>
        </div>
    </div>
</header>