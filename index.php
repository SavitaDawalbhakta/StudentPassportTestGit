<?php 
// CSRF Protection class

require_once 'csrfclass.php';
use steveclifton\phpcsrftokens\Csrf;

// include core.php which has database connection strings and session set up
require_once('includes/core.php');

?>

<?php

header('X-Content-Type-Options: nosniff');

?>


<?php
/*

// CSRF Protection code
if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
	
	$_SESSION['myMessage'] = "Valid Form Request";
	
	// Token varification for CSRF Attack
	
	$myToken = Csrf::getInputToken('index');
	 if(!Csrf::verifyToken('index', $myToken)){
		die('Invalid CSRF token Post');
	}
	 else{
		$_SESSION['myMessage'] = "Valid Form Request";
	 }


	 if(isset($_GET['message']) === "UserFailedAuthentication"){
		$myToken = Csrf::getInputToken('index');
	   if(!Csrf::verifyToken('index',$myToken)){
		   die('Invalid CSRF token Get Request');
	   }
	} 

	 // Another method to take care of CSRF attack
	 // If Headers of originated Server and Targeted Server are same

	 if (array_key_exists('HTTP_ORIGIN', $_SERVER)) {
		$origin = $_SERVER['HTTP_ORIGIN'];
	}
	else if (array_key_exists('HTTP_REFERER', $_SERVER)) {
		$origin = 'http://' .$_SERVER['SERVER_NAME'];
	} else {
		$origin = $_SERVER['REMOTE_ADDR'];
	}

	$allowOrigin = $_SERVER['HTTP_HOST'];
	//echo "HTTP_HOST " . $allowOrigin . "<br/>";

if ($origin !== null && isOriginAllowed($origin, $allowOrigin)) {
	$_SESSION['myMessage'] = "Valid Form Request updated";
    //echo "Valid request.." . "<br/>";
} else {
    exit("CSRF protection in POST request: detected invalid Origin header: " . $origin);

} 


} else{

	$myMessage = "Please Login..";
	$_SESSION['myMessage'] = $myMessage;
	
}

*/
?>


<?php

		
// if WT_insert is clicked then access the Oracle database and authenticate the user and start the session and redirect to start.php
// else error messages UserFailed Authentication and redirect to index.php
if(isset($_POST['WT_Insert'])){


	 // Student's authentication in LDAP

	 if (empty($_POST['RamID']) || empty($_POST['Password']) ) {
		header('Location: index.php?message=UserFailedAuthentication');
	  } 
	  
	  else{

		$userid = $_POST['RamID'];
		$ldappass = $_POST['Password'];

		$entry = [];

		define("PROFILE_IMAGE", "profile-181x186.jpg");
		define("LDAP_ENABLED", function_exists("ldap_connect"));
		define("APCU_ENABLED", function_exists("apcu_add"));
		define("MAX_AGE", 600); // in seconds = 10 minutes



		// Connect to LDAP
		$ds = @ldap_connect("ldap://152.12.30.84");

		if (!$ds) {
		
			_error("Connect failure", true);
		
		}else
		{
			echo "connected..";
		}
		
		$ldaprdn = 'wssumits' . "\\". $userid;

		ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
		ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);

	// binding to ldap server

	try{
	$ldapbind = @ldap_bind($ds, $ldaprdn, $ldappass);

	// verify binding
	if ($ldapbind) {
		echo "LDAP bind successful...";

		$filter="(sAMAccountName=$userid)";

		$dn = "DC=wssu,DC=edu";
				$searchResult = ldap_search($ds, $dn, $filter);

				echo "Number of entrees returned : " .ldap_count_entries($ds, $searchResult) ;

				$count = ldap_count_entries($ds, $searchResult);
				//Getting entries

				$hits = @ldap_get_entries($ds, $searchResult);

				$data = [];

				for ($x = 0; $x < $count; $x++) {

					$hit = $hits[$x];
					//$entry = [];

					$entry['bannerID'] = $hit["employeeid"][0];
					
				}

				$_SESSION['bannerid'] = $entry['bannerID'];

			 
				header('Location: start.php');

	} else {
		echo "LDAP bind failed...";
		header('Location: index.php?message=UserFailedAuthentication');
	}

	

		//echo $userid;
		}catch (Exception $e) {

			_error($e->getMessage());
		
		} finally {
		
			// Disconnect
			@ldap_close($ds);
		
		}
		
	
		
	  }


	
	/* $sql_StudentBannerAuthentication = "BEGIN WSSU.p_wssu_auth_web_user ('BANID',:userid,:password,:return_val); End;";
	$query_StudentBannerAuthentication = oci_parse($conn, $sql_StudentBannerAuthentication);
	
	OCIBindByName($query_StudentBannerAuthentication,":userid",$_POST['BannerID']);
	OCIBindByName($query_StudentBannerAuthentication,":password",$_POST['Password']);
	OCIBindByName($query_StudentBannerAuthentication,":return_val",$authorized,120);
	$StudentBannerAuthentication = oci_execute($query_StudentBannerAuthentication); */


// Granting access if authorized and setting bannerid session
	
//	if($authorized != "NO"){
		//$_SESSION['bannerid'] = $_POST['BannerID'];	

		//$_SESSION['bannerid'] = '940242868';	

		
			
		
		
//	} else {
	//	header('Location: index.php?message=UserFailedAuthentication');
//	}
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Student Passport</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
				integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<link href="css/themes.css" rel="stylesheet" type="text/css" />

		<link href="css/login.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="container">
	<div class="row">
	
		<div class="col-4"
		style="padding-top:150px;padding-right:10px; padding-left:10px; border-right: 1px solid #999;">
                <a href="index.php"><img src="images/wssu-logo.png" class="img-fluid" width="500" height="107"
                        border="0" /></a>
		</div> <!-- col-4 end -->
		<div class="col-8" style="padding-top:20px;padding-right:40px;padding-left:40px;">	
		<h4>Student Passport - One-Stop Service Center Personalized Information </h4>
        
                <!--<?php echo $_SESSION['myMessage']; ?>-->
                
               <div class="jumbotron">
			   		<form id="form1" class="form-group" name="form1" method="post" action="index.php" AUTOCOMPLETE="OFF">
					   <?php echo Csrf::getInputToken('index') ?>
					   <div class="form-group row">
                            <label for="RamID" class="col-sm-2 col-form-label font-weight-bold">Ram ID:</label>
                            <div class="col-sm-10">
                                <input name="RamID" class="form-control" type="text" id="RamID" 
                                    placeholder="Please Enter your RamID" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Password" class="col-sm-2 col-form-label font-weight-bold">Password:</label>
                            <div class="col-sm-10">
                                <input name="Password" class="form-control" type="password" id="Password"
                                    placeholder="Please Enter your Password" />
                            </div>
                        </div>
                        <?php 
						if (isset($_GET['message']) && strip_tags($_GET['message']) == "UserFailedAuthentication") { ?>
					   <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10 text-danger font-weight-bold text-justify">
                                Your Ram ID and Password combination is wrong! Please try again.
                            </div>
                        </div>
                        <?php } ?>

						<?php if (isset($_GET['message']) && strip_tags($_GET['message'])=="LoggedOut") { ?>
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10 text-danger font-weight-bold text-justify">
                                You have successfully logged out of the book voucher application.Please close this
                                browser window to ensure your data's safety.
                            </div>
                        </div>
                        <?php } ?>
                        
                        <br />

						<div class="col-sm-12">
                            <center>
                                <input type="submit" class="btn btn-outline-danger" name="WT_Insert" id="WT_Insert" 
                                    value="Submit" /></center>
                        </div>


					</form>
			   </div> <!-- Jumbotron ends here -->
		
			   <blockquote class="blockquote mb-0">
                        <h4>Support Information</h4>
                        <footer class="blockquote-footer">
                            <p>Contact Student Accounts at 336-750-2812. </p>
                        </footer>
                    <blockquote>	
		</div> <!-- col-8 end -->
	
	</div> <!-- Main row end -->

</div> <!-- Container end -->


</body>

<!-- Responsive structure ended -->

</html>