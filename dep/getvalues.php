<?php
$con = mysql_connect("localhost","root","passw0rd");
mysql_select_db("yoga",$con);
$type = $_GET['type'];
$query = "select distinct  name from node where type='$type'";
$res = mysql_query($query);
if(mysql_num_rows($res)!=0) {
    $parentarray = array();
    while($rowData = mysql_fetch_assoc($res)) {
     //echo "[$rowData['id']$,rowData['name']]"; 
        array_push($parentarray,$rowData['name']);
    }
  echo json_encode($parentarray);
}
?>
