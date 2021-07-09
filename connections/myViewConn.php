
<?php

// Connects to the PROD8 (i.e. database)
//$conn = oci_connect('WSSU', '2wsxcft6', '(DESCRIPTION=(TRANSPORT_CONNECT_TIMEOUT=3)(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=wssuprod-wdc.uncecs.edu)(PORT=15215)(SEND_BUF_SIZE=10485760)(RECV_BUF_SIZE=10485760))(ADDRESS=(PROTOCOL=TCP)(HOST=wssuprod-mcnc.uncecs.edu)(PORT=15215)(SEND_BUF_SIZE=10485760)(RECV_BUF_SIZE=10485760)))(SDU=65535)(CONNECT_DATA=(UR=A)(SERVICE_NAME=WSSUPROD_PRMY.wssu.edu)))');


// Connects to the Test DB (i.e. database)
$conn = oci_connect('WSSU', 'wssu1946', '(DESCRIPTION=(TRANSPORT_CONNECT_TIMEOUT=3)(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=wssutest-mcnc.uncecs.edu)(PORT=15215)(SEND_BUF_SIZE=10485760)(RECV_BUF_SIZE=10485760))(ADDRESS=(PROTOCOL=TCP)(HOST=wssutest-mcnc.uncecs.edu)(PORT=15215)(SEND_BUF_SIZE=10485760)(RECV_BUF_SIZE=10485760)))(SDU=65535)(CONNECT_DATA=(UR=A)(SERVICE_NAME=WSSUTEST_PRMY.wssu.edu)))');

if (!$conn) {
    $e = oci_error();	
    //trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
else
{
    echo "success";
   
    
  // $sql_StudentDetails = "select * from UNCGAWSMGR.PASSPORT_STUDENTS fetch first 5 rows only";

  /*  $sql_StudentDetails = "select * from UNCGAWSMGR.PASSPORT_STUDENTS 
  where ID in('940240400', '940231247', '940242868','940265741','940257670') "; */

  // $sql_StudentDetails = "select count(*) from UNCGAWSMGR.PASSPORT_STUDENTS where STUDENT_PROMISSORY_NOTE_SIGNED = 'Y' ";

  //$sql_StudentDetails = "select count(*) from UNCGAWSMGR.PASSPORT_STUDENTS";

  //$sql_StudentDetails = "select STUDENT_LOAN_ENTRANCE_INTERVIEW_STATUS from UNCGAWSMGR.PASSPORT_STUDENTS where ID = '940240400'";
// This is jtest120 BannerID = 940282957; No data found
  $sql_StudentDetails = "select * from UNCGAWSMGR.PASSPORT_STUDENTS where ID = '940282957'";


  

  //  $sql_StudentDetails = "SELECT TABLE_NAME FROM all_tables ";
    
    
    $query_StudentDetails = oci_parse($conn, $sql_StudentDetails);
    //OCIBindByName($query_StudentDetails,":BANNERID",$_SESSION['bannerid']);
    
    //OCIBindByName($query_StudentDetails,":BANNERID",$_SESSION['940266947']) ;
    
    
    //$StudentDetails = oci_execute($query_StudentDetails);
    //$row_StudentDetails = oci_fetch_array($query_StudentDetails, OCI_ASSOC);
    
    oci_execute($query_StudentDetails);
    oci_fetch_all($query_StudentDetails, $res);
    echo "<pre>\n";
    
    print_r($res);
    echo "</pre>\n";
    
    

}



/* WSSUTEST =
  (DESCRIPTION =
    (TRANSPORT_CONNECT_TIMEOUT = 3)
    (ADDRESS_LIST =
      (ADDRESS = (PROTOCOL = TCP)(HOST = wssutest-wdc.uncecs.edu)(PORT = 15215)(SEND_BUF_SIZE = 10485760)(RECV_BUF_SIZE = 10485760))
      (ADDRESS = (PROTOCOL = TCP)(HOST = wssutest-mcnc.uncecs.edu)(PORT = 15215)(SEND_BUF_SIZE = 10485760)(RECV_BUF_SIZE = 10485760))
    )
    (SDU = 65535)
    (CONNECT_DATA =
      (UR = A)
      (SERVICE_NAME = WSSUTEST_PRMY.wssu.edu)
    )
  )

  */
?>