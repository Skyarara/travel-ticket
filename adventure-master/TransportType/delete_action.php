<?php
require_once '../../conn.php';


$sql = "DELETE FROM type_transportasi WHERE id_type_transportasi = delete_action";

$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false ) {
    if( ($errors = sqlsrv_errors() ) != null) {
        echo $errors[0]['message'];
        exit;
    }
}
header('Location: index.php');