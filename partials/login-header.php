<?php
// Get the current path
$path = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
?>
<header class="login-header">
    <div class="container">
        <div class="header-wrap">
            <div class="header-left">
                <div class="logo">
                    <a href="Index"><img src="assets/img/logo.png" alt="logo" title="logo"></a>
                </div>
            </div>
            <div class="header-links" style="width:100%">
                <ul>
                    <li>
                        <a class="active" href="Index">Home</a>
                    </li>
                    <li>
                        <a href="About">About</a>
                    </li>
                   
                    
                    <li>
                        <a href="Influencers">Influencers</a>
                    </li>
                    <li>
                        <a href="Profile">Profile</a>
                    </li>
                    <li>
                        <a href="Login">Login</a>
                    </li>
                </ul>
            </div>
            <?php if($path != 'Login' && $path != 'CompanyRegister' && $path != 'InfluencerRegister'){  ?>
            <div class="header-btn">
                <a href="InfluencerRegister" class="btn">Join as Influencer</a>
                <a href="CompanyRegister" class="btn btns">Join as Company</a>
            </div>
            <?php }  ?>
        </div>
    </div>
</header>
