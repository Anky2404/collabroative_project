<?php
include_once('function/logout_function.php');
include_once('function/user_function.php');



// Get the current path
$path = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

$Manager = $_SESSION['Manager'] ?? null;
$Influencer = $_SESSION['Influencer'] ?? null;
if($Manager != null){
    $role = 'Manager';
}else if($Influencer != null){
    $role = 'Influencer';
}


?>
<header>
    <div class="container">
        <div class="header-wrap">
            <div class="header-left">
                <div class="logo">
                    <a href="Index"><img src="assets/img/logo.png" alt="logo" title="logo"></a>
                </div>
            </div>
            <div class="header-links">
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
                        <a href="Collabroations">Collabroations</a>
                    </li>
                    <li>
                        <a href="Profile">Profile</a>
                    </li>
                    <?php if ($Manager != null  || $Influencer != null) { ?>
                        <li>
                            <?php if ($Manager) { ?>
                                <a href="?logout=<?=urlencode(base64_encode(true)).'&role='.urlencode(base64_encode($role))  ?>" onclick="return confirm('Are you sure you want to logout?')"><span style="display: flex;width: 150px;"><i class="fa fa-user-tie"></i> <?= $Manager['firstname'] . ' ' . $Manager['lastname'] ?></span></a>
                            <?php } else { ?>
                                <a href="?logout=<?=urlencode(base64_encode(true)).'&role='.urlencode(base64_encode($role))  ?>"><span style="display: flex;width: 150px;"><i class="fa fa-user"></i> <?= $Influencer['firstname'] . ' ' . $Influencer['lastname'] ?></span></a>
                            <?php } ?>
                        </li>
                    <?php } else { ?>
                        <li>
                            <a href="Login">Login</a>
                        </li>
                </ul>
            </div>
            <?php if ($path != 'Login' && $path != 'CompanyRegister' && $path != 'InfluencerRegister') {  ?>
                <div class="header-btn">
                    <a href="InfluencerRegister" class="btn">Join as Influencer</a>
                    <a href="CompanyRegister" class="btn btns">Join as Company</a>
                </div>
        <?php }
                    } ?>
        </div>
    </div>
</header>