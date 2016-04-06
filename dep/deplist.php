<?php
$con = mysql_connect("localhost","root","passw0rd");
mysql_select_db("yoga",$con);
$type = $_GET['type'];
$query = "SELECT * FROM node";
$res = mysql_query($query);
if(mysql_num_rows($res)!=0) {
    $parentarray = array();
    while($rowData = mysql_fetch_assoc($res)) {
     //echo "[$rowData['id']$,rowData['name']]"; 
        $array = array($rowData["id"], $rowData["name"], $rowData["description"],$rowData["type"],$rowData["data"]);
        array_push($parentarray,$array);
    }
  echo json_encode($parentarray);
}


?>
