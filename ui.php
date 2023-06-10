<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      margin: 0;
      padding: 0;
      font-size: 16px;
    }
    
    .container {
      margin: 20px;
    }

    #tabs {
      width: 100%;
    }

    .tab-content {
      padding: 10px;
    }

    form label {
      display: block;
      margin-top: 10px;
      font-weight: bold;
    }

    form input[type="text"],
    form select {
      width: 100%;
      padding: 5px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
    }

    form button {
      padding: 10px;
      background-color: #2793d2;
      color: white;
      border: none;
      cursor: pointer;
    }

    #ulasan {
      width: 100%;
      margin-top: 20px;
    }
    table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #CD853F;
            color: white;
        }
        h1{color: #8B4513;}
  </style>
</head>
<body>
  <div class="container">
    <div id="tabs">
      <ul>
        <li><a href="#datatableTab">Data Table</a></li>
        <li><a href="#formValidationTab">Form Tambah</a></li>
        <li><a href="#updateTab">Update</a></li>
      </ul>
      <div id="datatableTab" class="tab-content">
        <h1 style= "text-align: center;">Ulasan Produk CibuCraft</h1>
        <table id="ulasan" class="display">
          <thead>
            <tr>
              <th>Username</th>
              <th>Rating</th>
              <th>Komentar</th>
              <th>Tanggal Ulasan</th>
              <th>Nama Produk</th>
            </tr>
          </thead>
          <tbody>
          <?php
          require_once 'koneksi.php';
          $sql = "SELECT * FROM ulasan";
          $result = mysqli_query($db_connect, $sql);
          ?>
          </tbody>
        </table>
      </div>
      <div id="formValidationTab" class="tab-content">
        <form id="addForm" method="post" action="create.php">

          <label for="username">username:</label>
          <input type="text" id="username" name="username" required>

          <label for="rating">Rating:</label>
          <input type="text" id="rating" name="rating" required>

          <label for="komentar">Komentar:</label>
          <input type="text" id="komentar" name="komentar" required>

          <label for="tanggal_ulasan">Tanggal Ulasan:</label>
          <input type="date" id="tanggal_ulasan" name="tanggal_ulasan" required> <br>

          <label for="namaproduk">Nama Produk:</label>
          <input type="text" id="namaproduk" name="namaproduk" required>

          <button type="submit">Submit</button>
        </form>
      </div>
      <div id="updateTab" class="tab-content">
        <form id="updateForm" method="post" action="update.php">
          <label for="updatedid_ulasan">ID Ulasan:</label>
          <input type="text" id="id_ulasan" name="id_ulasan" required>

          <label for="updatedusername">Username:</label>
          <input type="text" id="updatedusername" name="username" required>

          <label for="updatedrating">Rating:</label>
          <input type="text" id="updatedrating" name="rating" required>

          <label for="updatedkomentar">komentar:</label>
          <input type="text" id="updatedkomentar" name="komentar" required>

          <label for="updated">Tanggal Ulasan:</label>
          <input type="date" id="updatedtanggalulasan" name="tanggal_ulasan" required> 

          <label for="namaproduk">Nama Produk:</label>
          <input type="text" id="namaproduk" name="namaproduk" required>

          <button type="submit">Update</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

  <script>
    $(document).ready(function() {
    $("#tabs").tabs();
    $("#ulasan").DataTable();


    $.ajax({
      url: "http://localhost/tubes_api/data.php",
      type: "GET",
      dataType: "json",
      success: function(data) {
        $.each(data, function(i, ulasan) {
          var row = $("<tr>");
          $("<td>").text(ulasan.username).appendTo(row);
          $("<td>").text(ulasan.rating).appendTo(row);
          $("<td>").text(ulasan.komentar).appendTo(row);
          $("<td>").text(ulasan.tanggal_ulasan).appendTo(row);
          $("<td>").text(ulasan.namaproduk).appendTo(row);
          $("#ulasan tbody").append(row);
        });
      }
    });

    $("#tanggal_ulasan").datepicker({
      dateFormat: "yy-mm-dd"
    });
});
  </script>
</body>
</html>