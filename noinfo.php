
<?php 
require_once('includes/core.php'); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link href="css/login.css" rel="stylesheet" type="text/css" /> 
    <title>WSSU: Parking Voucher</title>
</head>

<body>
    <div class="container">
        <div class="row">
                    <div class="col-sm-4" style="padding-top:150px;padding-right: 10px; border-right: 1px solid #999;">

                        <a href="index.php"><img src="images/wssu-logo.png" class="img-fluid" width="300" height="107" border="0" /></a>

                    </div> <!-- Logo column finished -->

                    <div class="col-sm-8" style="padding-top:20px;padding-right:40px;padding-left:40px;">
                    
                                <h1>Student Passport - One-Stop Service Center Personalized Information</h1>

                                <p>Hello <?php echo $_SESSION['FirstName']; ?>,</p>
            
                                <p>Your Information is not available in the Banner currently!   
                                Please click 'Log Out' for now, and close your browser window.</p>

                                <br/>

                                

                                <p><input name="logout" type="button" class="btn btn-outline-danger" id="logout" value="Log Out" onclick="window.location='index.php';" /></p>

                    </div> <!-- Main Data column finished -->
        
        
        </div> <!-- Main Row finished -->
    
    </div> <!-- Main Container Finished -->
</body>
</html>