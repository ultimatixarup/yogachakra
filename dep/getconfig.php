<?php
$con = mysql_connect("localhost","root","passw0rd");


mysql_select_db("yoga",$con);

$source = $_GET["source"];
$parentarray = array();


$query = "SELECT * FROM configuration where source='$source'";
$res = mysql_query($query);

if(mysql_num_rows($res)!=0) {
    while($rowData = mysql_fetch_assoc($res)) {
     //echo "[$rowData['id']$,rowData['name']]"; 
        $array = array($rowData["source"], $rowData["destination"]);
        array_push($parentarray,$array);
    }
}
 echo json_encode($parentarray);


?>
