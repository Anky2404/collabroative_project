<?php
// Get current path
$path = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
?>
<div class="left-menu">
    <ul>
        <li>
            <a href="Dashboard" class="<?php echo ($path == 'Dashboard') ? 'active' : ''; ?>">
                <i class="fa fa-tachometer-alt"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="InfluencerCategories" class="<?php echo ($path == 'InfluencerCategories') ? 'active' : ''; ?>">
                <i class="fa fa-tags"></i>
                Influencer Categories
            </a>
        </li>
        <li>
            <a href="InfluencerList" class="<?php echo ($path == 'InfluencerList') ? 'active' : ''; ?>">
                <i class="fa fa-users"></i>
                Influencer Lists
            </a>
        </li>
        
        <li>
            <a href="CompanyList" class="<?php echo ($path == 'CompanyList') ? 'active' : ''; ?>">
                <i class="fa fa-building"></i>
                Company Lists
            </a>
        </li>
       
        <li>
            <a href="IndustryList" class="<?php echo ($path == 'IndustryList') ? 'active' : ''; ?>">
                <i class="fa fa-users"></i>
                Industry Lists
            </a>
        </li>
        <li>
            <a href="PlatformList" class="<?php echo ($path == 'PlatformList') ? 'active' : ''; ?>">
                <i class="fa fa-desktop"></i>
                Platform Lists
            </a>
        </li>
        <li>
            <a href="CollabroationList" class="<?php echo ($path == 'CollabroationList') ? 'active' : ''; ?>">
                <i class="fa fa-handshake"></i>
                Collaborations
            </a>
        </li>
        <li>
            <a href="PaymentList" class="<?php echo ($path == 'PaymentList') ? 'active' : ''; ?>">
                <i class="fa fa-credit-card"></i>
                Payment Lists
            </a>
        </li>

    </ul>
</div>
