<?php

    require_once('koneksi.php');

    $username         = $_POST['username'];
    $rating           = $_POST['rating'];
    $komentar         = $_POST['komentar'];
    $tanggal_ulasan   = $_POST['tanggal_ulasan'];
    $namaproduk       = $_POST['namaproduk'];

    $query  = "INSERT INTO ulasan (username, rating, komentar, tanggal_ulasan, namaproduk) VALUES ('$username', '$rating', '$komentar', '$tanggal_ulasan', '$namaproduk')";
    $sql    = mysqli_query($db_connect, $query);

    if ($sql) {
        echo json_encode ( array('message' => 'Data Berhasil dibuat!' ));
    } else {
        echo json_encode ( array('message' => 'Error' ));
    }
    
    echo $sql;
    header("location: http://localhost/tubes_api/ui.php"); 


?>