<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title><?php echo $tsm->website->getTitle(); ?></title>
		<?php echo $tsm->getHeaderHTML(); ?>
		<link href="templates/admin/css/custom.css.php" rel="stylesheet" type="text/css" media="screen" />
	</head>
	<body>
	   <div id="headerWrapper"></div>
	   <div id="topMenuWrapper">
      <div id="topMenu">
        <?php
        if($tsm->adminUser->isLoggedIn()){
          $tsm->website->generateMenuHTML($tsm->website->getAdminTopMenu());
          ?>
          <a class="logoutButton" href="index.php?logout=1">Logout</a>
          <?php 
        } 
        ?>
      </div>
     </div>
	   <div id="contentWrapper">
	     <div id="contentArea">