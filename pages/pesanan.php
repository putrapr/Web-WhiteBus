<?php
  include '../koneksi.php';  
  if (isset($_POST["btn_hitung"])) {    
    $result = mysqli_query($conn, "SELECT * FROM bus");
    
    while( $bus = mysqli_fetch_assoc($result) ) {
      $kelas = $bus["kelas_bus"];
      $harga = $bus["harga_bus"];
      if ($_POST["kelas"] == $kelas) {
        $hasil = (int) $harga * (int) $_POST["jumlah"];
        break;
      }
    }    
  }  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>WhiteBus Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <link rel="stylesheet" href="../style.css" />
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <div class="pembungkus">
      <div class="navigasi">
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
                  <a class="nav-link" href="#">Pesan</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>

      <div class="form-pesan">
        <div class="form-pesan-dalam">
          <p style="font-size:46px;">Form Pemesanan</p>
            <form action="../process/tambah-pesanan.php" method="post">
              <table>
                <tr>
                  <td><label for="nama">Nama Lengkap</label></td>
                  <td><input type="text" name="nama" id="nama" class="form-control masukan" 
                    value= "<?php if (isset($_POST["nama"])) echo $_POST["nama"]; ?>">                 
                  </td>
                </tr>
                <?php if(isset($_POST['nama'])){
						      if($_POST['nama'] == ""){ ?>
                    <tr>
                      <td></td>
                      <td> <p style = "color:red; text-align:right;">Nama Belum Dimasukkan</p></td>
                    </tr>
                  <?php
						      }
					      }?>

                <tr>
                  <td><label for="no_id">No. Identitas</label></td>
                  <td><input type="number" name="no_id" id="no_id" class="form-control masukan"
                    value= "<?php if (isset($_POST["no_id"])) echo $_POST["no_id"]; ?>">                    
                  </td>
                </tr>
                <?php if(isset($_POST['no_id'])){
						      if($_POST['no_id'] == ""){ ?>
                    <tr>
                      <td></td>
                      <td> <p style = "color:red; text-align:right;">No. Identitas Belum Dimasukkan</p></td>
                    </tr>
                  <?php
						      }
					      }?>

                <tr>
                  <td><label for="no_hp">No. HP</label></td>
                  <td><input type="number" name="no_hp" id="no_hp" class="form-control masukan"
                    value= "<?php if (isset($_POST["no_hp"])) echo $_POST["no_hp"]; ?>">
                  </td>
                </tr>
                <?php if(isset($_POST['no_hp'])){
						      if($_POST['no_hp'] == ""){ ?>
                    <tr>
                      <td></td>
                      <td> <p style = "color:red; text-align:right;">No. HP Belum Dimasukkan</p></td>
                    </tr>
                  <?php
						      }
					      }?>

                <tr>
                  <td><label for="kelas">Kelas Penumpang</label></td>
                  <td>
                    <select name="kelas" id="kelas" class="form-control masukan">
                      <option value="Ekonomi" 
                        <?php 
                          if (isset($_POST["kelas"])){
                          echo $_POST["kelas"] == 'Ekonomi' ? 'selected = "selected"' : '';
                        }?>
                        >Ekonomi</option>
                      <option value="Bisnis" 
                        <?php 
                          if (isset($_POST["kelas"])){
                            echo $_POST["kelas"] == 'Bisnis' ? 'selected = "selected"' : '';
                        }?>
                      >Bisnis</option>
                      <option value="Eksekutif" 
                        <?php 
                          if (isset($_POST["kelas"])){
                            echo $_POST["kelas"] == 'Eksekutif' ? 'selected = "selected"' : '';
                        }?>
                      >Eksekutif</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td><label for="jadwal">Jadwal Keberangkatan</label></td>
                  <td><input type="date" name="jadwal" id="jadwal" class="form-control masukan"
                    value= "<?php 
                      if (isset($_POST["jadwal"])) {
                        if ($_POST["jadwal"] == ""){
                          $_POST["jadwal"] = date("Y-m-d", strtotime("-1 days"));
                          echo $_POST["jadwal"];
                        } else {
                          echo date('Y-m-d',strtotime($_POST["jadwal"])); 
                        }
                      }
                      ?>">                    
                  </td>
                </tr>
                <?php 
                  if(isset($_POST['jadwal'])){
                    $yesterday = date("Y-m-d", strtotime("-1 days"));
                    if($_POST['jadwal'] == $yesterday){ 
                ?>
                      <tr>
                        <td></td>
                        <td> <p style = "color:red; text-align:right;">Jadwal Keberangkatan Belum Dimasukkan</p></td>
                      </tr>
                <?php
                    }
					        }
                ?>

                <tr>
                  <td><label for="jumlah">Jumlah Penumpang <br><p style="font-size: 12px;">Bukan Lansia (Usia < 60)</p></label></td>
                  <td><input type="text" name="jumlah" id="jumlah" class="form-control masukan"
                    value= "<?php if (isset($_POST["jumlah"])) echo $_POST["jumlah"]; ?>">                    
                  </td>
                </tr>
                <?php if(isset($_POST['jumlah'])){
						      if($_POST['jumlah'] == ""){ ?>
                    <tr>
                      <td></td>
                      <td> <p style = "color:red; text-align:right;">Jumlah Penumpang Belum Dimasukkan</p></td>
                    </tr>
                  <?php
						      }
					      }?>
                <tr>
                  <td><label for="jumlah_lansia">Jumlah Penumpang Lansia <br><p style="font-size: 12px;">Usia 60 tahun ke atas</p></label></td>
                  <td><input type="text" name="jumlah_lansia" id="jumlah_lansia" class="form-control masukan"
                    value= "<?php if (isset($_POST["jumlah_lansia"])) echo $_POST["jumlah_lansia"]; ?>">
                  </td>
                </tr>
                <?php if(isset($_POST['jumlah_lansia'])){
						      if($_POST['jumlah_lansia'] == ""){ ?>
                    <tr>
                      <td></td>
                      <td> <p style = "color:red; text-align:right;">Jumlah Penumpang Lansia Belum Dimasukkan</p></td>
                    </tr>
                  <?php
						      }
					      }?>

                <tr>
                  <td><label for="harga_tiket">Harga Tiket</label></td>
                  <td> <input type="hidden" id="harga_tiket" name = "harga_tiket"
                    value = "<?php if (isset($harga)) echo $harga; else echo 0;?>">
                    <p class = "masukan"><?php if (isset($harga)) echo "Rp. ".$harga; else echo "0";?></p>
                  </td>
                </tr>

                <tr>
                  <td><label for="total_bayar">Total Bayar</label></td>
                  <td> <input type="hidden" id="total_bayar" name = "total_bayar" class = "masukan" 
                    value = "<?php if (isset($hasil)) echo $hasil; else echo 0;?>">
                    <p class = "masukan"><?php if (isset($hasil)) echo "Rp. ".$hasil; else echo "0";?></p>
                  </td>
                </tr>
                <?php 
                  if (isset($hasil)) {} 
                  else if(isset($_POST['total_bayar'])){
                    if($_POST['total_bayar'] == "0"){ ?>
                      <tr>
                        <td></td>
                        <td> <p style = "color:red; text-align:right;">Klik tombol "Hitung Total. Bayar" terlebih dahulu</p></td>
                      </tr>
                    <?php
                    }
                  }
                ?>
              </table>
              <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="ceklis" name="ceklis" 
                  <?= (!isset($_POST['p']) ? 'checked' : '');?>
                  >
                  <label class="form-check-label" for="ceklis">Saya dan/atau rombongan
                    telah membaca, memahami, dan setuju berdasarkan syarat dan ketentuan yang
                    telah ditetapkan </label>
              </div>
              <?php                  
                if (isset($_POST['p'])) { ?>
                    <p style="color:red">Ceklis ketentuan di atas terlebih dahulu</p>                  
                <?php 
                } ?> 
              
              <button type="submit" class="btn btn-dark tombol" name="btn_hitung" formaction="#" style="margin-left:200px">
                Hitung Total. Bayar</button>
              <button type="submit" class="btn btn-dark tombol">Pesan Tiket</button>
              <button type="submit" class="btn btn-dark tombol" name="btn_cancel" formaction="../index.php">
                Cancel</button>
                
              
            </form>
          </div>
        </div>
      </div>











  </body>
</html>
