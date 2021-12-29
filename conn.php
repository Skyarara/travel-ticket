<?php
$serverName = "LAPTOP-TAG7N02B"; //serverName\instanceName

$connectionInfo = ["Database"=>"travel"]; //nama db
$conn = sqlsrv_connect( $serverName, $connectionInfo);

?>