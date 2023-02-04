<?php
  include '../koneksi.php'; 
  $result = mysqli_query($conn, "SELECT * FROM bus");
  $i = 0;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>WhiteBus Harga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">WhiteBus</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Bus
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="bus-ekonomi.php">Ekonomi</a></li>
                <li><a class="dropdown-item" href="bus-bisnis.php">Bisnis</a></li>
                <li><a class="dropdown-item" href="bus-eksekutif.php">Eksekutif</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Harga</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pesanan.php">Pesan</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <form action="" class = "form-pesan">
        <table cellpadding=10px style="margin:50px;">
          <thead>
            <tr style="border: 1px solid #ccc;">
              <th>No.</th>
              <th>Kelas</th>
              <th>Harga</thstyle=>
            </tr>
          </thead>
          <tbody >
            <?php
              while( $bus = mysqli_fetch_assoc($result) ) :
                $kelas = $bus["kelas_bus"];
                $harga = $bus["harga_bus"];
                $i++;
            ?>
            <tr style="border: 1px solid #ccc;">
              <td><?= $i."."?></td>
              <td><?= $kelas?></td>
              <td><?= $harga?></td>
            </tr>
            <?php
              endwhile;
            ?>
            <!-- <tr>
              <td> 1.</td>
              <td>Ekonomi</td>
              <td>180000</td>
            </tr>

            <tr>
              <td> 2.</td>
              <td>Bisnis</td>
              <td>250000</td>
            </tr>

            <tr>
              <td> 3.</td>
              <td>Eksekutif</td>
              <td>300000</td>
            </tr> -->
          </tbody>
        </table>
    </form>
  </body>
</html>