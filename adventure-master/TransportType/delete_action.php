<?php
require_once '../../conn.php';

$id = $_GET['id_type'];
$sql = "DELETE FROM type_transportasi WHERE id_type_transportasi= $id";

$stmt = sqlsrv_query( $conn, $sql );

if( $stmt === false ) {
    if( ($errors = sqlsrv_errors() ) != null) {
        echo $errors[0]['message'];
        exit;
    }
}
header('Location: index.php');