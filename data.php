<?php
require_once('koneksi.php');

header('Content-Type: application/json');

$query  = "SELECT * FROM ulasan ORDER BY id_ulasan ASC";
$sql    = mysqli_query($db_connect, $query);

if ($sql) {
    $result = array();
    while ($row = mysqli_fetch_array($sql)) {
        array_push($result, array(
            'id_ulasan'      => $row['id_ulasan'],
            'username'       => $row['username'],
            'rating'         => $row['rating'],
            'komentar'       => $row['komentar'],
            'tanggal_ulasan' => $row['tanggal_ulasan'],
            'namaproduk'     => $row['namaproduk'],
        ));
    }

    echo json_encode($result);
}
?>
