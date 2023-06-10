<?php

    require_once('koneksi.php');
    parse_str(file_get_contents('php://input'), $value);

    $id_ulasan    = $value['id_ulasan'];

    $query  = "DELETE FROM ulasan WHERE id_ulasan='$id_ulasan' ";
    $sql    = mysqli_query($db_connect, $query);

    if ($sql) {
        echo json_encode ( array('message' => 'Data Berhasil Dihapus!' ));
    } else {
        echo json_encode ( array('message' => 'Error' ));
    }
    
  


?>