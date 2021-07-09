<?php

// Connects to the PROD8 (i.e. database)
//$conn = oci_connect('WSSU', '2wsxcft6', '(DESCRIPTION=(TRANSPORT_CONNECT_TIMEOUT=3)(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=wssuprod-wdc.uncecs.edu)(PORT=15215)(SEND_BUF_SIZE=10485760)(RECV_BUF_SIZE=10485760))(ADDRESS=(PROTOCOL=TCP)(HOST=wssuprod-mcnc.uncecs.edu)(PORT=15215)(SEND_BUF_SIZE=10485760)(RECV_BUF_SIZE=10485760)))(SDU=65535)(CONNECT_DATA=(UR=A)(SERVICE_NAME=WSSUPROD_PRMY.wssu.edu)))');


// Connects to the Test DB (i.e. database)
$connView= oci_connect('WSSU', 'wssu1946', '(DESCRIPTION=(TRANSPORT_CONNECT_TIMEOUT=3)(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=wssutest-mcnc.uncecs.edu)(PORT=15215)(SEND_BUF_SIZE=10485760)(RECV_BUF_SIZE=10485760))(ADDRESS=(PROTOCOL=TCP)(HOST=wssutest-mcnc.uncecs.edu)(PORT=15215)(SEND_BUF_SIZE=10485760)(RECV_BUF_SIZE=10485760)))(SDU=65535)(CONNECT_DATA=(UR=A)(SERVICE_NAME=WSSUTEST_PRMY.wssu.edu)))');



// Connects to the RMS DB (i.e. database)
$conn = oci_connect('Owner50RO ', 'Ow50ro2015_T', '(DESCRIPTION=(TRANSPORT_CONNECT_TIMEOUT=3)(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=wssurmet-wdc.uncecs.edu)(PORT=15215)(SEND_BUF_SIZE=10485760)(RECV_BUF_SIZE=10485760)))(SDU=65535)(CONNECT_DATA=(SERVER=DEDICATED)(SERVICE_NAME=WSSURMET_PRMY.wssu.edu)))');

$result = array();

if (!$conn || !$connView) {
    $e = oci_error();	
    //trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
else
{
    echo "success";

    

    /*  $sql_StudentDetails = "SELECT * FROM RMSREAL.ACCT_PAYMENTRESULT JOIN RMSREAL.PPLE_T_STUDENT_PROFILE 
    on RMSREAL.ACCT_PAYMENTRESULT.RMSID = RMSREAL.PPLE_T_STUDENT_PROFILE.PK_RMS_ID 
    WHERE RMSREAL.PPLE_T_STUDENT_PROFILE.IX_STUDENT_NUMBER = my_temp_table.VIEWBANNERID
    and RMSREAL.ACCT_PAYMENTRESULT.PAYMENTTYPE = 'CC' 
    and (RMSREAL.ACCT_PAYMENTRESULT.PAYMENTAMOUNT =  165.00 OR RMSREAL.ACCT_PAYMENTRESULT.PAYMENTAMOUNT = 300.00 )
    
    fetch first 5 rows only";  */
 
      /*    $sql_StudentDetails = "SELECT * FROM  RMSREAL.ACCT_PAYMENTRESULT INNER JOIN  RMSREAL.PPLE_T_STUDENT_PROFILE 
        on RMSREAL.ACCT_PAYMENTRESULT.RMSID = RMSREAL.PPLE_T_STUDENT_PROFILE.PK_RMS_ID 
        WHERE IX_STUDENT_NUMBER in (select viewbannerid from my_temp_table) 
        and RMSREAL.ACCT_PAYMENTRESULT.PAYMENTTYPE = 'CC'
        and RMSREAL.ACCT_PAYMENTRESULT.PAYMENTAMOUNT in ( 165.00 , 300.00 )";  */

  
     /*  $sql_StudentDetails = "SELECT IX_STUDENT_NUMBER,VIEWBANNERID from RMSREAL.PPLE_T_STUDENT_PROFILE,my_temp_table 
     where RMSREAL.PPLE_T_STUDENT_PROFILE.IX_STUDENT_NUMBER = my_temp_table.VIEWBANNERID";    */
   /* 
     $sql_StudentDetails = "SELECT * from RMSREAL.ACCT_PAYMENTRESULT INNER JOIN RMSREAL.PPLE_T_STUDENT_PROFILE
     on RMSREAL.ACCT_PAYMENTRESULT.RMSID = RMSREAL.PPLE_T_STUDENT_PROFILE.PK_RMS_ID 
     where RMSREAL.ACCT_PAYMENTRESULT.PAYMENTAMOUNT in ( 165.00 , 300.00 )
     and RMSREAL.ACCT_PAYMENTRESULT.PAYMENTTYPE = 'CC'
     and IX_STUDENT_NUMBER = '940240400'
     ";   */
  /*    
     $sql_StudentDetails = "SELECT * from RMSREAL.PPLE_T_USER_DEFINED INNER JOIN RMSREAL.PPLE_T_STUDENT_PROFILE
    on RMSREAL.PPLE_T_USER_DEFINED.PK_RMS_ID = RMSREAL.PPLE_T_STUDENT_PROFILE.PK_RMS_ID 
    where RMSREAL.PPLE_T_USER_DEFINED.USER_DEF_LOOKUP6 = 'Exempt'
  fetch first 5 rows only"; */

    /* $sql_StudentDetails = "SELECT * from RMSREAL.PPLE_T_USER_DEFINED INNER JOIN RMSREAL.PPLE_T_STUDENT_PROFILE
    on RMSREAL.PPLE_T_USER_DEFINED.PK_RMS_ID = RMSREAL.PPLE_T_STUDENT_PROFILE.PK_RMS_ID 
    where RMSREAL.PPLE_T_USER_DEFINED.USER_DEF_LOOKUP6 = 'Exempt'
    and IX_STUDENT_NUMBER = '940305979'  "; */

    /* $sql_StudentDetails = "SELECT CK_BED_SPACE from RMSREAL.RMGT_T_ROOM_PERSON INNER JOIN RMSREAL.PPLE_T_STUDENT_PROFILE
    on RMSREAL.RMGT_T_ROOM_PERSON.CK_RMS_ID = RMSREAL.PPLE_T_STUDENT_PROFILE.PK_RMS_ID 
    where RMSREAL.RMGT_T_ROOM_PERSON.FK_TERM_ID = '202180'
    and RMSREAL.PPLE_T_STUDENT_PROFILE.IX_STUDENT_NUMBER = '940282957'  "; */

    /* $sql_StudentDetails = "SELECT * from RMSREAL.RMGT_T_ROOM_PERSON INNER JOIN RMSREAL.PPLE_T_STUDENT_PROFILE
    on RMSREAL.RMGT_T_ROOM_PERSON.CK_RMS_ID = RMSREAL.PPLE_T_STUDENT_PROFILE.PK_RMS_ID 
    where RMSREAL.RMGT_T_ROOM_PERSON.FK_TERM_ID = '202180'
    and RMSREAL.PPLE_T_STUDENT_PROFILE.IX_STUDENT_NUMBER = '940282957'
    fetch first 5 rows only "; */

    $sql_StudentDetails = "SELECT * from RMSREAL.RMGT_T_ROOM_PERSON INNER JOIN RMSREAL.PPLE_T_STUDENT_PROFILE
    on RMSREAL.RMGT_T_ROOM_PERSON.CK_RMS_ID = RMSREAL.PPLE_T_STUDENT_PROFILE.PK_RMS_ID 
    
    fetch first 5 rows only ";



                $query_StudentDetailsRamdition = oci_parse($conn, $sql_StudentDetails); 

                oci_execute($query_StudentDetailsRamdition);


                //return;
                //oci_fetch_array($query_StudentDetails, OCI_ASSOC);

                oci_fetch_all($query_StudentDetailsRamdition, $res);

               // $totalRows_rsuser = oci_num_rows($query_StudentDetailsRamdition) ;

                //$termcode = '202020';
                
               /*  if($totalRows_rsuser > 0){
                  //$termcode = $row_rsuser['term'];
                  echo "Records found " . $totalRows_rsuser ."<br/>";
                }
                else{
                    echo "No records found " ."<br/>";
                    echo $totalRows_rsuser ."<br/>";
                } */

                echo "<pre>\n";
                    
                print_r($res);
                echo "</pre>\n";
              
              


    //$sql_StudentDetails = "SELECT * FROM all_tables where table_name = 'ACCT_PAYMENTRESULT'    ";

    //$sql_StudentDetails = "SELECT * FROM all_tables where owner <> 'SYS'     ";

    //$sql_StudentDetails =  "select * from all_tables where table_name in ('STMT_AUDIT_OPTION_MAP','ACCT_PAYMENTRESULT') " ;

   // $sql_StudentDetails = "SELECT * FROM  RMSREAL.PPLE_T_STUDENT_PROFILE fetch first 5 rows only";

    //$sql_StudentDetails = "SELECT * FROM  RMSREAL.ACCT_PAYMENTRESULT fetch first 5 rows only";

   // $sql_StudentDetails = "SELECT ID FROM UNCGAWSMGR.PASSPORT_STUDENTS fetch first 5 rows only";

    

        
   /*  $sql_StudentDetails = "SELECT * FROM RMSREAL.ACCT_PAYMENTRESULT JOIN RMSREAL.PPLE_T_STUDENT_PROFILE 
    on RMSREAL.ACCT_PAYMENTRESULT.RMSID = RMSREAL.PPLE_T_STUDENT_PROFILE.PK_RMS_ID 
    WHERE [WSSURMET_PRMY.wssu.edu].[dbo].REMREAL.PPLE_T_STUDENT_PROFILE.IX_STUDENT_NUMBER = [WSSUTEST_PRMY.wssu.edu].[dbo].UNCGAWSMGR.PASSPORT_STUDENTS.ID
    and RMSREAL.ACCT_PAYMENTRESULT.PAYMENTTYPE = 'CC' 
    and (RMSREAL.ACCT_PAYMENTRESULT.PAYMENTAMOUNT =  165.00 OR RMSREAL.ACCT_PAYMENTRESULT.PAYMENTAMOUNT = 300.00 )
    
    fetch first 5 rows only";
 */

       /*  $sql_StudentDetails = "SELECT * FROM [WSSURMET_PRMY.wssu.edu].[dbo].REMREAL.PPLE_T_STUDENT_PROFILE 
        UNION
        select * from [WSSUTEST_PRMY.wssu.edu].[dbo].UNCGAWSMGR.PASSPORT_STUDENTS

        fetch first 5 rows only"; */

          /*   $sql_StudentDetails = "SELECT * FROM  RMSREAL.ACCT_PAYMENTRESULT INNER JOIN  RMSREAL.PPLE_T_STUDENT_PROFILE 
        on RMSREAL.ACCT_PAYMENTRESULT.RMSID = RMSREAL.PPLE_T_STUDENT_PROFILE.PK_RMS_ID 
        WHERE RMSREAL.ACCT_PAYMENTRESULT.PAYMENTTYPE = 'CC' 
        and RMSREAL.ACCT_PAYMENTRESULT.PAYMENTAMOUNT in ( 165.00 , 300.00 )
        
        and IX_STUDENT_NUMBER in (select id from UNCGAWSMGR.PASSPORT_STUDENTS)
            


        fetch first 5 rows only";
  */
        

    /*
        Join ACCT_PAYMENTRESULT.RMSID and PPLE_T_STUDENT_PROFILE.PK_RMS_ID where ACCT_PAYMENTRESULT.PAYMENTTYPE EQ 'CC'
         and ACCT_PAYMENTRESULT.PAYMENTAMOUNT EQ 165.00 OR 300.00 and PPLE_T_STUDENT_PROFILE.IX_STUDENT_NUMBER equals

    */
    //$StudentDetails = oci_execute($query_StudentDetails);
    //$row_StudentDetails = oci_fetch_array($query_StudentDetails, OCI_ASSOC);
 
 /* 
     $sql_StudentDetails = "CREATE TABLE my_temp_table (viewbannerid varchar(10) ) " ;
    $query_StudentDetails = oci_parse($connView, $sql_StudentDetails);
    oci_execute($query_StudentDetails); 
    
     $sql_StudentDetails2 = "Insert into my_temp_table values ('123')" ;
    $query_StudentDetails2 = oci_parse($connView, $sql_StudentDetails2);
    oci_execute($query_StudentDetails2); 

  $sql_StudentDetails2 = "Insert into my_temp_table values ('456')" ;
    $query_StudentDetails2 = oci_parse($connView, $sql_StudentDetails2);
    oci_execute($query_StudentDetails2); 


    
    $sql_StudentDetails3 = "select * from my_temp_table " ; */
    /* $query_StudentDetails = oci_parse($connView, $sql_StudentDetails); 

    oci_execute($query_StudentDetails);
    
    oci_fetch_all($query_StudentDetails, $res);
   echo "<pre>\n";
    
$result = $res;

    //print_r($res);
    echo "</pre>\n"; */

  /*   $sql_StudentDetails3 = "drop table my_temp_table " ;
    $query_StudentDetails3 = oci_parse($connView, $sql_StudentDetails3);
    oci_execute($query_StudentDetails3); 
     */
 
    /* $sql_StudentDetails3 = "select * from my_temp_table " ;
    $query_StudentDetails3 = oci_parse($conn, $sql_StudentDetails3);
    oci_execute($query_StudentDetails3);
    
    
    oci_fetch_all($query_StudentDetails3, $res);
    echo "<pre>\n";
    
    print_r($res);
    echo "</pre>\n";


 */

  

}

/* oci_close($connView);


$sql_StudentDetails = "CREATE TABLE my_temp_table (viewbannerid varchar(10) ) " ;
$query_StudentDetails = oci_parse($conn, $sql_StudentDetails);
oci_execute($query_StudentDetails);  */

           /*  $i=0; $col=''; $value='';
            foreach ($result as $key => $value) {
                if($i==0){
                    $col .= $key;
                    $value .= ':'.$value;
                }
                else{
                $col .= ', '.$key;
                $value .= ', :'.$value;
                }
                echo $key[$value];

                $i++;
            }
            
            echo '<pre>'; var_dump($result); */



            // Printing all the keys and values one by one
/* $keys = array_keys($result);
for($i = 0; $i < count($result); $i++) {
    echo $keys[$i] . "{<br>";
    foreach($result[$keys[$i]] as $key => $value) {
        echo $key . " : " . $value . "<br>";
        $sql_StudentDetails = "Insert into my_temp_table VALUES ('940301944') " ;
        
$query_StudentDetails = oci_parse($conn, $sql_StudentDetails);
oci_execute($query_StudentDetails); 

$sql_StudentDetails = "select * from my_temp_table " ; 
$query_StudentDetails = oci_parse($conn, $sql_StudentDetails); 

oci_execute($query_StudentDetails);

oci_fetch_all($query_StudentDetails, $res);

echo $sql_StudentDetails;

echo "<pre>\n";
    
print_r($res);
echo "</pre>\n";
    }
    echo "}<br>";
}
   */
//return;

       

              

        // foreach($result as $item)
        //     {
        //         $sql_StudentDetails = "Insert into my_temp_table (viewbannerid) VALUES (ORDER_LINE_SQ.nextval,".$item.") " ;

        //         echo $sql_StudentDetails;

        //     }


 //echo $result[0] ;






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

/*

Data Source=(DESCRIPTION = 
                (ADDRESS = (PROTOCOL=TCP)(HOST=wssurmet-wdc.uncecs.edu)(PORT=15215))
                 (CONNECT_DATA = 
                    (SERVER=DEDICATED)
                    (SERVICE_NAME=WSSURMET_PRMY.wssu.edu)
                  )
            );


*/


?>