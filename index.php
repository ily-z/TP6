<?php
require 'templates/header.php';
include 'functions/function_index.php';
$tabelbarang=getAllBarang();
//var_dump($tabelbarang);

$tabeltransaksi_detail=getAllTransaksiDetail();
?>
<a href="tambah_supplier.php"><button type="button" class="btn btn-primary m-4">tambah data suplieer</button></a>
<a href="tambah_barang.php"><button type="button" class="btn btn-primary m-4">tambah data barang</button></a>

<div class="w-2/3">
<table class="table table-dark table-stripe " >
      <thead>
        <tr>
        <th scope="col">id</th>
          <th scope="col">kode_barang</th>
          <th scope="col">nama_barang</th>
          <th scope="col">harga</th>
          <th scope="col">stok</th>
          <th scope="col">supplier_id</th>
          <th scope="col">action</th>
        </tr>
      </thead>
    
      <tbody class="">
        <?php foreach($tabelbarang as $data){?>
        <tr>
          <th scope="row"><?= $data['id']?></th>
          <!-- <td><?= $data['id']?></td> -->
          <td><?= $data['kode_barang']?></td>
          <td><?= $data['nama_barang']?></td>
          <td><?= $data['harga']?></td>
          <td><?= $data['stok']?></td>
          <td><?= $data['nama']?></td>
          <td> 
              <form method="post" action="" onsubmit="return confirm('hapus data?');">
                <input type="hidden" name="idDelete" value="<?= $data['id']; ?>">
                <button class="btn btn-danger" type="submit" name="delete">Delete</button>
              </form>
          </td>
          
        </tr>
        <?php }?>
      </tbody>
    </table>

    <?php 
    $tabeltransaksi=getAllTransaksi();
    ?>

    <table class="table table-dark table-stripe " >
      <thead>
        <tr>
        <th scope="col">id</th>
          <th scope="col">waktu_transaksi</th>
          <th scope="col">keterangan</th>
          <th scope="col">total</th>
          <th scope="col">nama pelanggan</th>
        </tr>
      </thead>
    
      <tbody class="">
        <?php foreach($tabeltransaksi as $datatransaksi){?>
        <tr>
          <th scope="row"><?= $datatransaksi['id']?></th>
          <td><?= $datatransaksi['waktu_transaksi']?></td>
          <td><?= $datatransaksi['keterangan']?></td>
          <td><?= $datatransaksi['total']?></td>
          <td><?= $datatransaksi['nama']?></td>
          
        </tr>
        <?php }?>
      </tbody>
    </table>
    <a href="tambah_transaksi.php"><button type="button" class="btn btn-primary m-4">tambah transaksi</button></a>
    <?php 
    $tabeltransaksi_detail=getAllTransaksiDetail();
    ?>

    <table class="table table-dark table-stripe " >
      <thead>
        <tr>
        <th scope="col">transaksi id</th>
          <th scope="col">nama barang</th>
          <th scope="col">harga</th>
          <th scope="col">Qty</th>
        </tr>
      </thead>
    
      <tbody class="">
        <?php foreach($tabeltransaksi_detail as $dataTD){?>
        <tr>
          <th scope="row"><?= $dataTD['id']?></th>
          <td><?= $dataTD['nama_barang']?></td>
          <td><?= $dataTD['harga']?></td>
          <td><?= $dataTD['qty']?></td>
          <!-- <td><?= $dataTD['nama']?></td> -->
          
        </tr>
        <?php }?>
      </tbody>
    </table>
    <a href="tambah_detail_transaksi.php"><button type="button" class="btn btn-primary m-4">tambah detail transaksi</button></a>
</div>





<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
  if(!compareId($_POST['idDelete'])){
    if(deleteBarang($_POST['idDelete'])){
      echo "<script>alert('data berhasil di hapus')</script>";
    }
  }else{
    echo "<script>alert('barang tidak bisa di hapus karena ada di transaksi detail')</script>";
  }
}

require 'templates/footer.php';
?>