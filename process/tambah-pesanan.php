<?php
include'../koneksi.php';
$nama=$_POST['nama'];
$nik=$_POST['no_id'];
$no_hp=$_POST['no_hp'];
$kelas=$_POST['kelas'];
$jadwal=$_POST['jadwal'];
$jumlah=$_POST['jumlah'];
$jumlah_lansia=$_POST['jumlah_lansia'];
$harga_tiket=$_POST['harga_tiket'];
$total_bayar=$_POST['total_bayar'];

if(isset($_POST['ceklis'])&& $nama != "" && $nik != "" && $no_hp != "" && $jadwal != "" 
                          && $jumlah != "" && $jumlah_lansia != "" && $total_bayar != "0"){
  $sql =  "INSERT INTO pemesanan VALUES 
          ('','$nama','$nik','$no_hp','$kelas','$jadwal','$jumlah','$jumlah_lansia','$harga_tiket','$total_bayar')";
  mysqli_query($conn, $sql);
  echo $sql;
  header("location:../pages/hasil.php");
} else { ?>
    <form action="../pages/pesanan.php" method="post">
      <?php 
        if(!isset($_POST['ceklis'])):
      ?>
          <input type="hidden" name = "p" value = "p">
      <?php
        endif;
      ?>
      
      <input type="hidden" name = "nama" value = "<?= $nama;?>">
      <input type="hidden" name = "no_id" value = "<?= $nik;?>">
      <input type="hidden" name = "no_hp" value = "<?= $no_hp;?>">
      <input type="hidden" name = "kelas" value = "<?= $kelas;?>">
      <input type="hidden" name = "jadwal" value = "<?= $jadwal;?>">
      <input type="hidden" name = "jumlah" value = "<?= $jumlah;?>">
      <input type="hidden" name = "jumlah_lansia" value = "<?= $jumlah_lansia;?>">
      <input type="hidden" name = "total_bayar" value = "<?= $total_bayar;?>">
      <button type="submit" style="font-size: 72px; margin: 200px 500px;">Verifikasi</button>        
    </form>
    <?php
}
?>