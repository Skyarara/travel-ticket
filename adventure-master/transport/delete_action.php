<?php
require_once '../../conn.php';

$id = $_GET['id'];
$sql = "DELETE FROM transportasi WHERE id_trasportasi= $id";

$stmt = sqlsrv_query( $conn, $sql );

if( $stmt === false ) {
    if( ($errors = sqlsrv_errors() ) != null) {
        echo $errors[0]['message'];
        exit;
    }
}
header('Location: index.php');