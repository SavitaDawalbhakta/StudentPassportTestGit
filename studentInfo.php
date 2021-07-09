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

// To verify Housing and ramdition use Banner Id = 940305979

//$_SESSION['bannerid'] = '940305979';


//ob_start();
if(! empty($_SESSION['bannerid']) )	{


    // sql querry to get the student details
$sql_StudentDetails = "SELECT * FROM UNCGAWSMGR.PASSPORT_STUDENTS WHERE UNCGAWSMGR.PASSPORT_STUDENTS.ID = :BANNERID";
// parsing the querry with the connection string
$query_StudentDetails = oci_parse($conn, $sql_StudentDetails);
// bind the parameter BANNERID
OCIBindByName($query_StudentDetails,":BANNERID",$_SESSION['bannerid']);
// execute the query and generating result
$StudentDetails = oci_execute($query_StudentDetails);
// $row_StudentDetails contains an associative array having key value pairs
$row_StudentDetails = oci_fetch_array($query_StudentDetails, OCI_ASSOC);

//oci_execute($query_StudentDetails);
//oci_fetch_all($query_StudentDetails, $res);
        
$_SESSION['BANNERID'] =  isset($_SESSION['BANNERID']) ?$row_StudentDetails['ID']:"Not Found";
$_SESSION['FirstName'] =str_replace("'", "", $row_StudentDetails['FIRST_NAME']);
$_SESSION['LastName'] = str_replace("'", "", $row_StudentDetails['LAST_NAME'] );
$_SESSION['FullName'] = $_SESSION['FirstName']." ".$_SESSION['LastName'];
//$_SESSION['StudentType'] = isset($_SESSION['StudentType']) ? $row_StudentDetails['STUD_TYPE_DESC'] : "Not Found";

$_SESSION['StudentType'] = $row_StudentDetails['STUD_TYPE_DESC'];


//$_SESSION['StudentType'] =str_replace("'", "", $row_StudentDetails['STUD_TYPE_DESC']);
$_SESSION['TransferredHrs'] = isset($_SESSION['TransferredHrs']) ? $row_StudentDetails['TRANSF_HRS'] : "Not Found";

$_SESSION['Residency'] = isset($_SESSION['Residency']) ? $row_StudentDetails['RESD_DESC'] : "Not Found";
$_SESSION['FinalHST'] = isset($_SESSION['FinalHST']) ? $row_StudentDetails['FHST_RECV'] : "Not Found";

$_SESSION['Immunization'] = isset($_SESSION['Immunization']) ? $row_StudentDetails['IMMU_STAT'] : "Not Found";

//$_SESSION['BedSpace'] = $row_StudentDetails['BedSpace'] ;



$_SESSION['Registered'] = isset($_SESSION['Registered']) ? $row_StudentDetails['REG_IND'] : "Not Found";
$_SESSION['Hours'] = isset($_SESSION['Hours']) ? $row_StudentDetails['REG_HRS'] : "Not Found";
$_SESSION['Bill'] = isset($_SESSION['Bill']) ? $row_StudentDetails['BALANCE'] : "Not Found";
$_SESSION['Validated'] = isset($_SESSION['Validated']) ? $row_StudentDetails['VALIDATED'] : "Not Found";

$_SESSION['Term'] = isset($_SESSION['Term']) ? $row_StudentDetails['TERM_DESC'] : "Not Found";

$_SESSION['TermCode'] = isset($_SESSION['TermCode']) ? $row_StudentDetails['TERM_CODE'] : "Not Found";

//echo $_SESSION['TermCode'] ."  " .gettype($_SESSION['TermCode']) ;
//return;

$_SESSION['FafsaSub'] = isset($_SESSION['FafsaSub']) ? $row_StudentDetails['FAFSA_RECVD'] : "Not Found";
$_SESSION['Verification'] = isset($_SESSION['Verification']) ? $row_StudentDetails['VERIFICATION_STATUS'] : "Not Found";
//$_SESSION['Verification'] = str_replace("'", "", $row_StudentDetails['VERIFICATION_STATUS']);
//$varification = $_SESSION['Verification'];

$_SESSION['MissingItems'] = isset($_SESSION['MissingItems']) ? $row_StudentDetails['MISSING_REQUIREMENT'] : "Not Found";

$_SESSION['Resources'] = isset($_SESSION['Resources']) ? $row_StudentDetails['RESOURCES'] : "Not Found";
$_SESSION['Offered'] = isset($_SESSION['Offered']) ? $row_StudentDetails['TERM_OFFER_AMT'] : "Not Found";
$_SESSION['Accepted'] = isset($_SESSION['Accepted']) ? $row_StudentDetails['TERM_ACCEPT_AMT'] : "Not Found";
$_SESSION['Authorized'] = isset($_SESSION['Authorized']) ? $row_StudentDetails['TERM_MEMO_AUTH'] : "Not Found";

$_SESSION['StudLoansAcc'] = isset($_SESSION['StudLoansAcc']) ? $row_StudentDetails['STUDENT_LOANS_ACCEPTED'] : "Not Found";
$_SESSION['ParentLoansAcc'] = isset($_SESSION['ParentLoansAcc']) ? $row_StudentDetails['PARENT_LOANS_ACCEPTED'] : "Not Found";

$_SESSION['StudPromNote'] = isset($_SESSION['StudPromNote']) ? $row_StudentDetails['STUDENT_PROMISSORY_NOTE_SIGNED'] : "Not Found";
$_SESSION['ParentPromNote'] = isset($_SESSION['ParentPromNote']) ? $row_StudentDetails['PARENT_PROMISSORY_NOTE_SIGNED'] : "Not Found";

$_SESSION['EntrnceIntrView'] = isset($_SESSION['EntrnceIntrView']) ? $row_StudentDetails['STUDENT_LOAN_ENTRANCE_INTERVIEW_STATUS'] : "Not Found";



$sql_StudentDetailsRamdition = "SELECT * from RMSREAL.ACCT_PAYMENTRESULT INNER JOIN RMSREAL.PPLE_T_STUDENT_PROFILE
on RMSREAL.ACCT_PAYMENTRESULT.RMSID = RMSREAL.PPLE_T_STUDENT_PROFILE.PK_RMS_ID 
where RMSREAL.ACCT_PAYMENTRESULT.PAYMENTAMOUNT in ( 165.00 , 300.00 )
and RMSREAL.ACCT_PAYMENTRESULT.PAYMENTTYPE = 'CC'
and IX_STUDENT_NUMBER = :VIEWBANNERID";    

$query_StudentVerifyRemidition= oci_parse($connRMS, $sql_StudentDetailsRamdition);
OCIBindByName($query_StudentVerifyRemidition,":VIEWBANNERID",$_SESSION['BANNERID']);
$StudentVerifyRemidition = oci_execute($query_StudentVerifyRemidition);
$row_StudentVerifyRemidition = oci_fetch_array($query_StudentVerifyRemidition, OCI_ASSOC);

$totalRows_rsuser = oci_num_rows($query_StudentVerifyRemidition) ;

//$termcode = '202020';

if($totalRows_rsuser > 0){
	//$termcode = $row_rsuser['term'];
    //echo $totalRows_rsuser ."<br/>";
    $_SESSION['Ramidition'] = "Yes";
}
else{
    //echo "No records found";
    $_SESSION['Ramidition'] = "No";
}


$sql_StudentHousingExempt = "SELECT * from RMSREAL.PPLE_T_USER_DEFINED INNER JOIN RMSREAL.PPLE_T_STUDENT_PROFILE
    on RMSREAL.PPLE_T_USER_DEFINED.PK_RMS_ID = RMSREAL.PPLE_T_STUDENT_PROFILE.PK_RMS_ID 
    where RMSREAL.PPLE_T_USER_DEFINED.USER_DEF_LOOKUP6 = 'Exempt'
    and IX_STUDENT_NUMBER = :VIEWBANNERID  ";

$query_StudentHousingExempt= oci_parse($connRMS, $sql_StudentHousingExempt);
OCIBindByName($query_StudentHousingExempt,":VIEWBANNERID",$_SESSION['BANNERID']);
$StudentHousingExempt = oci_execute($query_StudentHousingExempt);
$row_StudentHousingExempt = oci_fetch_array($query_StudentHousingExempt, OCI_ASSOC);

//$_SESSION['HousingExempt'] = $row_StudentHousingExempt['USER_DEF_LOOKUP6'] ;


if(isset($row_StudentHousingExempt['USER_DEF_LOOKUP6'])){
    $_SESSION['HousingExempt'] = $row_StudentHousingExempt['USER_DEF_LOOKUP6'];
}else{
	$_SESSION['HousingExempt'] = "NIL";

}


$sql_StudentBedSpace = "SELECT * from RMSREAL.RMGT_T_ROOM_PERSON INNER JOIN RMSREAL.PPLE_T_STUDENT_PROFILE
    on RMSREAL.RMGT_T_ROOM_PERSON.CK_RMS_ID = RMSREAL.PPLE_T_STUDENT_PROFILE.PK_RMS_ID 
    where RMSREAL.PPLE_T_STUDENT_PROFILE.IX_STUDENT_NUMBER = :VIEWBANNERID
    and RMSREAL.RMGT_T_ROOM_PERSON.FK_TERM_ID = :VIEWTERM ";

    
$query_StudentBedSpace= oci_parse($connRMS, $sql_StudentBedSpace);
OCIBindByName($query_StudentBedSpace,":VIEWBANNERID",$_SESSION['BANNERID'] );
OCIBindByName($query_StudentBedSpace,":VIEWTERM", $_SESSION['TermCode'] );
$StudentBedSpace = oci_execute($query_StudentBedSpace);
$row_StudentBedSpace = oci_fetch_array($query_StudentBedSpace, OCI_ASSOC);

//$_SESSION['BedSpace'] = $row_StudentBedSpace['CK_BED_SPACE'] ;


if(isset($row_StudentBedSpace['CK_BED_SPACE'])){
    $_SESSION['BedSpace'] = $row_StudentBedSpace['CK_BED_SPACE'] ;
}else{
	$_SESSION['BedSpace'] = "NIL";

}


/* if (!empty($info_StudentDetails['ID'] )){
    header('Location: noinfo.php');
}
  */

//return;


//header('Location: studentinfo.php');

}
else{

    echo "No Banner ID present";
}

    