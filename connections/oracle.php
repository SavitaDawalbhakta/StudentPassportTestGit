<?php

// Connects to the PROD8 (i.e. database)
//$conn = oci_connect('WSSU', '2wsxcft6', '(DESCRIPTION=(TRANSPORT_CONNECT_TIMEOUT=3)(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=wssuprod-wdc.uncecs.edu)(PORT=15215)(SEND_BUF_SIZE=10485760)(RECV_BUF_SIZE=10485760))(ADDRESS=(PROTOCOL=TCP)(HOST=wssuprod-mcnc.uncecs.edu)(PORT=15215)(SEND_BUF_SIZE=10485760)(RECV_BUF_SIZE=10485760)))(SDU=65535)(CONNECT_DATA=(UR=A)(SERVICE_NAME=WSSUPROD_PRMY.wssu.edu)))');


//Test Database
$conn = oci_connect('WSSU', 'wssu1946', '(DESCRIPTION=(TRANSPORT_CONNECT_TIMEOUT=3)(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=wssutest-mcnc.uncecs.edu)(PORT=15215)(SEND_BUF_SIZE=10485760)(RECV_BUF_SIZE=10485760))(ADDRESS=(PROTOCOL=TCP)(HOST=wssutest-mcnc.uncecs.edu)(PORT=15215)(SEND_BUF_SIZE=10485760)(RECV_BUF_SIZE=10485760)))(SDU=65535)(CONNECT_DATA=(UR=A)(SERVICE_NAME=WSSUTEST_PRMY.wssu.edu)))');
//$e = "";


//Test Database
//$conn = oci_connect('WSSU', 'wssu1946', '(DESCRIPTION=(TRANSPORT_CONNECT_TIMEOUT=3)(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=wssutest-mcnc.uncecs.edu)(PORT=15215)(SEND_BUF_SIZE=10485760)(RECV_BUF_SIZE=10485760))(ADDRESS=(PROTOCOL=TCP)(HOST=wssutest-mcnc.uncecs.edu)(PORT=15215)(SEND_BUF_SIZE=10485760)(RECV_BUF_SIZE=10485760)))(SDU=65535)(CONNECT_DATA=(UR=A)(SERVICE_NAME=WSSUTEST_PRMY.wssu.edu)))');
$e = "";



if (!$conn) {
    $e = oci_error();	
    //trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

?>