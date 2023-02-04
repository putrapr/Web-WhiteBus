<?php
  include '../koneksi.php'; 
  $result = mysqli_query($conn, "SELECT * FROM pemesanan ORDER BY id DESC LIMIT 1");
  while( $pesan = mysqli_fetch_assoc($result) ) :
    $nama = $pesan['nama'];
    $nik = $pesan['nik'];
    $no_hp = $pesan['no_hp'];
    $kelas = $pesan['kelas'];
    $jumlah = $pesan['jumlah'];
    $jumlah_lansia = $pesan['jumlah_lansia'];
    $harga = $pesan['harga'];
    $total = $pesan['total'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>WhiteBus Pemesanan Berhasil</title>
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
              <a class="nav-link" href="harga.php">Harga</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pesanan.php">Pesan</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="hasil-isi" style="margin:50px;">
      <p style="font-size:32px; font-weight:bold">Pemesanan Berhasil !</p>
      <form action="">
      <table>
          <tr>
            <td><label for="nama">Nama Lengkap</label></td>
            <td>:</td>
            <td><?php echo $nama;?></td>
          </tr>
          <tr>
            <td><label for="nama">Nomor Identitas</label></td>
            <td>:</td>
            <td><?php echo $nik;?></td>
          </tr>
          <tr>
            <td><label for="nama">No. HP</label></td>
            <td>:</td>
            <td><?php echo $no_hp;?></td>
          </tr>
          <tr>
            <td><label for="nama">Kelas Penumpang</label></td>
            <td>:</td>
            <td><?php echo $kelas;?></td>
          </tr>
          <tr>
            <td><label for="nama">Jumlah Penumpang</label></td>
            <td>:</td>
            <td><?php echo $jumlah;?></td>
          </tr>
          <tr>
            <td><label for="nama">Jumlah Penumpang Lansia</label></td>
            <td>:</td>
            <td><?php echo $jumlah_lansia;?></td>
          </tr>
          <tr>
            <td><label for="nama">Harga Tiket</label></td>
            <td>:</td>
            <td><?php echo "Rp. ".$harga;?></td>
          </tr>
          <tr>
            <td><label for="nama">Total Bayar</label></td>
            <td>:</td>
            <td><?php echo "Rp. ".$total;?></td>
          </tr>
        </table>
      </form>
    </div>
    
  </body>
</html>
<?php
  endwhile;
?>
