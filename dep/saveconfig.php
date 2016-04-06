<?php
$con = mysql_connect("localhost","root","passw0rd");


mysql_select_db("yoga",$con);
$inputJSON = file_get_contents('php://input');
$input= json_decode( $inputJSON, TRUE ); //convert JSON into array

$source = $input["source"];
$destination=$input["destination"];


mysql_query("insert into configuration(source,destination) values('$source','$destination')");
mysql_query('commit');

$query = "SELECT * FROM configuration where source='$source'";
$res = mysql_query($query);
if(mysql_num_rows($res)!=0) {
    $parentarray = array();
    while($rowData = mysql_fetch_assoc($res)) {
     //echo "[$rowData['id']$,rowData['name']]"; 
        $array = array($rowData["source"], $rowData["destination"]);
        array_push($parentarray,$array);
    }
  echo json_encode($parentarray);
}



?>
