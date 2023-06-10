<?php

    require_once('koneksi.php');
    parse_str(file_get_contents('php://input'), $value);

    $id_ulasan         = $value['id_ulasan'];
    $username          = $value['username'];
    $rating            = $value['rating'];
    $komentar          = $value['komentar'];
    $tanggal_ulasan    = $value['tanggal_ulasan'];
    $namaproduk        = $value['namaproduk'];


    $query  =   "UPDATE ulasan SET username='$username',
                                    rating='$rating',
                                    komentar='$komentar',
                                    tanggal_ulasan='$tanggal_ulasan',
                                    namaproduk='$namaproduk'
                WHERE id_ulasan='$id_ulasan' "; 
    $sql    = mysqli_query($db_connect, $query);

    if ($sql) {
        echo json_encode ( array('message' => 'berhasil memperbarui data!' ));
    } else {
        echo json_encode ( array('message' => 'Error' ));
    }
    
    echo $sql;
    header("location: http://localhost/tubes_api/ui.php");


?>