<?php
require_once '../../conn.php';

$id = $_GET['id'];
$sql = "DELETE FROM rute WHERE id_rute= $id";

$stmt = sqlsrv_query( $conn, $sql );
echo '<script type="text/javascript">'; 
echo 'alert("Data sudah dihapus");'; 
echo 'window.location.href = "index.php";';
echo '</script>';

if( $stmt === false ) {
    if( ($errors = sqlsrv_errors() ) != null) {
        echo $errors[0]['message'];
        exit;
    }
}
