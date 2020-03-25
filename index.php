<?php
include '../koneksi.php';
$sql="SELECT * FROM peminjaman INNER JOIN anggota
ON peminjaman.id_anggota = anggota.id_anggota
INNER JOIN petugas ON peminjaman.id_petugas = petugas.id_petugas
ORDER BY peminjaman.tgl_pinjam";

$res = mysqli_query($kon,$sql);

$pinjam = array();

while ($data = mysqli_fetch_assoc($res)) {
$pinjam[] =$data;
}

include '../Assets/Header.php';
 ?>
 <div class="container">
   <div class="row mt-4">
     <div class="col-md">
     </div>
   </div>
 </div>
 <div class="card">
  <div class="card-header">
    <h5 class="card-title"> <i class="fas fa-edit"></i>Data peminjaman</h5>
  </div>
  <div class="card-body">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Peminjam</th>
      <th scope="col">Tanggal Pinjam</th>
      <th scope="col">Tanggal Jatuh Tempo</th>
      <th scope="col">Petugas</th>
      <th scope="col">Status</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <?php
  $no=1;
  foreach ($pinjam as $p) {?>
    <tr>
      <th scope="row"><?=$no ?></th>
      <td><?=$pinjam['nama']?></td>
      <td><?=date('d F Y',strtotime($pinjam["tgl_pinjam"]))?></td>
      <td><?=date('d F Y',strtotime($pinjam["tgl_jatuhTemp"]))?></td>
      <td><?=$pinjam["nama_petugas"]?></td>
      <td>
        <?php
        if ($pinjam['Status'] == "Dipinjam") {
        echo "<h5><span class='badge badge-info'>Dipinjam</span></h5>";  // code...
      }else {
      echo "<h5><span class='badge badge-secondary'>Kembali</span></h5>";  // code...
      }
         ?>
      </td>
      <td>

      </td>
    </tr>
  </table>
    <?php
    $no++;

  }
     ?>
 <?php
include '../Assets/Footer.php';
  ?>
