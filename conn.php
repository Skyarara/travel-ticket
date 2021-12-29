<?php
$serverName = "DESKTOP-65NA9HQ"; //serverName\instanceName

$connectionInfo = ["Database"=>"travel"]; //nama db
$conn = sqlsrv_connect( $serverName, $connectionInfo);

?>