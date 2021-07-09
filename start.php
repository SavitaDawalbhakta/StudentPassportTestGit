<?php 

require_once('studentInfo.php');

?>


<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Info</title>
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
               
                            
                            <!--<p class="lead">ONE-STOP SERVICE CENTER PERSONALIZED INFORMATION </p> -->
                            <div class="jumbotron border border-danger" style="background-color:transparent !important;border-width:3px !important;margin-top:20px;padding-top:20px">
                                    <p> <h3> Name:  <?php echo sprintf($_SESSION['FullName']); ?> </h3></p>
                            <h5>General Information</h5>
                            <br/>

                                    <div class="row font-weight-bold ">

                                                
                                                        <div class="col-sm-3">  

                                                        <p class="text-right">Banner ID:</p>

                                                        </div>

                                                        <div class="col-sm-3">
                                                        <?php echo sprintf($_SESSION['BANNERID']); ?>
                                                        </div>

                                                        <div class="col-sm-3">  

                                                    <p class="text-right">Student Type:</p>

                                                </div>

                                                <div class="col-sm-3">
                                                    <?php echo sprintf($_SESSION['StudentType']); ?>
                                                </div>


                                    </div> <!-- row 1 ends -->

                                    <div class="row font-weight-bold ">

                                                


                                                <div class="col-sm-3">  

                                                        <p class="text-right">Transfer Hrs:</p>

                                                        </div>

                                                        <div class="col-sm-3">
                                                        <?php echo sprintf($_SESSION['TransferredHrs']); ?>
                                                        </div>

                                                        <div class="col-sm-3">  

                                                    <p class="text-right">Residency:</p>

                                                </div>

                                                <div class="col-sm-3">
                                                    <?php echo sprintf($_SESSION['Residency']); ?>
                                                </div>

                                    </div> <!-- row 2 ends -->

                                

                            </div> <!-- Jumbotron 1 ends -->

                            <div class="jumbotron border border-success" style="background-color:transparent !important;border-width:3px !important;margin-top:20px;padding-top:40px">

<h5>Admissions and Student Health (Only Applicable to New Students)</h5>
<br/>

        <div class="row font-weight-bold ">

                    <div class="col-sm-3">  

                        <p class="text-right">Final High School Transcript:</p>

                    </div>

                    <div class="col-sm-3">
                        <?php echo sprintf($_SESSION['FinalHST']); ?>
                    </div>



                    <div class="col-sm-3">  

                            <p class="text-right">Ramidition Fee Paid:</p>

                            </div>

                            <div class="col-sm-3">
                            <?php echo sprintf($_SESSION['Ramidition']); ?>
                            </div>

        </div> <!-- row 1 ends -->

        <div class="row font-weight-bold ">


        <div class="col-sm-3">  

    <p class="text-right">Housing Exempt:</p>

</div>

<div class="col-sm-3">
    <?php echo sprintf($_SESSION['HousingExempt']); ?>
</div>

<div class="col-sm-3">  

    <p class="text-right">Immunization:</p>

</div>

<div class="col-sm-3">
    <?php echo sprintf($_SESSION['Immunization']); ?>
</div>



<div class="col-sm-3">  

        <p class="text-right">Bed Space:</p>

        </div>

        <div class="col-sm-3">
        <?php echo sprintf($_SESSION['BedSpace']); ?>
        </div>

</div> <!-- row 2 ends -->
    

</div> <!-- Jumbotron 2 ends -->


<div class="jumbotron border border-danger" style="background-color:transparent !important;border-width:3px !important;margin-top:20px;">

<h5>Registration and Billings & Receivables</h5>
<br/>

        <div class="row font-weight-bold ">

                    <div class="col-sm-3">  

                        <p class="text-right">Registered:</p>

                    </div>

                    <div class="col-sm-3">
                        <?php echo sprintf($_SESSION['Registered']); ?>
                    </div>



                    <div class="col-sm-3">  
                            <p class="text-right">Hours:</p>
                    </div>

                    <div class="col-sm-3">
                            <?php echo sprintf($_SESSION['Hours']); ?>
                    </div>

        </div> <!-- row 1 ends -->

        <div class="row font-weight-bold ">

                    <div class="col-sm-3">  

                        <p class="text-right">Bill:</p>

                    </div>

                    <div class="col-sm-3">
                        <?php echo sprintf($_SESSION['Bill']); ?>
                    </div>



                    <div class="col-sm-3">  
                            <p class="text-right">Validated:</p>
                    </div>

                    <div class="col-sm-3">
                            <?php echo sprintf($_SESSION['Validated']); ?>
                    </div>

        </div> <!-- row 2 ends -->
<br/>
    <p>*Your bill reflects charges for the <b> <?php echo  sprintf( $_SESSION['Term'] ) ?> </b>  only - for any past due charges please see Billings.</p>

</div> <!-- Jumbotron 3 ends -->

<div class="jumbotron border border-success" style="background-color:transparent !important;border-width:3px !important;margin-top:20px;">

    <h5>Financial Aid</h5>
    <br/>

    <div class="row font-weight-bold ">

                    <div class="col-sm-3">  

                        <p class="text-right">FAFSA Submitted:</p>

                    </div>

                    <div class="col-sm-3">
                        <?php echo sprintf($_SESSION['FafsaSub']); ?>
                    </div>



                    <div class="col-sm-3">  
                            <p class="text-right">Selected for Verification:</p>
                    </div>

                    <div class="col-sm-3">
                            <?php echo sprintf($_SESSION['Verification']); ?>
                    </div>

        </div> <!-- row 1 ends -->

</div> <!-- Jumbotron 4 ends -->

<div class="jumbotron border border-danger" style="background-color:transparent !important;border-width:3px !important;margin-top:20px;">

    <h5>Missing Items</h5>
    <br/>

    <div class="row font-weight-bold ">

                    <div class="col-sm-3">  

                        <p class="text-right">Missing Items:</p>

                    </div>

                    <div class="col-sm-3">
                        <?php echo sprintf($_SESSION['MissingItems']); ?>
                    </div>

              
        </div> <!-- row 1 ends -->

</div> <!-- Jumbotron 5 ends -->

<div class="jumbotron border border-success" style="background-color:transparent !important;border-width:3px !important;margin-top:20px;">

    <h5>Award Information for Term</h5>
    <br/>

        <div class="row font-weight-bold ">

                    <div class="col-sm-3">  

                        <p class="text-right">Resources:</p>

                    </div>

                    <div class="col-sm-3">
                        <?php echo sprintf($_SESSION['Resources']); ?>
                    </div>

                    <div class="col-sm-3">  

                        <p class="text-right">Offered:</p>

                    </div>

                    <div class="col-sm-3">
                        <?php echo sprintf($_SESSION['Offered']); ?>
                    </div>


              
        </div> <!-- row 1 ends -->

        <div class="row font-weight-bold ">

                    
                    <div class="col-sm-3">  

                        <p class="text-right">Accepted:</p>

                    </div>

                    <div class="col-sm-3">
                        <?php echo sprintf($_SESSION['Accepted']); ?>
                    </div>

                    <div class="col-sm-3">  

                        <p class="text-right">Authorized:</p>

                    </div>

                    <div class="col-sm-3">
                        <?php echo sprintf($_SESSION['Authorized']); ?>
                    </div>

              
        </div> <!-- row 2 ends -->

        <div class="row font-weight-bold ">

                    <div class="col-sm-3">  

                        <p class="text-right">Student Loans Accepted:</p>

                    </div>

                    <div class="col-sm-3">
                        <?php echo sprintf($_SESSION['StudLoansAcc']); ?>
                    </div>

                    <div class="col-sm-3">  

                        <p class="text-right">Parent Loans Accepted:</p>

                    </div>

                    <div class="col-sm-3">
                        <?php echo sprintf($_SESSION['ParentLoansAcc']); ?>
                    </div>

                    
              
        </div> <!-- row 3 ends -->

        <div class="row font-weight-bold ">

                    <div class="col-sm-3">  

                    <p class="text-right">Student Promissory Note Signed:</p>
                       
                    </div>

                    <div class="col-sm-3">
                        <?php echo sprintf($_SESSION['StudPromNote']); ?>
                    </div>

                    <div class="col-sm-3">  

                        <p class="text-right">Parent Promissory Note Signed:</p>

                    </div>

                    <div class="col-sm-3">
                        <?php echo sprintf($_SESSION['ParentPromNote']); ?>
                    </div>

                    

        </div> <!-- row 4 ends -->
        <div class="row font-weight-bold ">

                    <div class="col-sm-3>  

                         <p class="text-right">Entrance Interview:</p>

                     </div>

                    <div class="col-sm-3">
                    <?php echo sprintf($_SESSION['EntrnceIntrView']); ?>
                    </div>


        </div> <!-- row 5 ends -->


</div> <!-- Jumbotron 6 ends -->


<div>

<p><input name="logout" type="button" id="logout" class="btn btn-outline-danger"  value="Logout" onclick="window.location='index.php';"/>
                              </p>
</div>

                                        
                        </div>
                    
            
            </div>
    
    
    
    </div>
      
    </body>
    </html>