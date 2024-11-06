<?php
require 'templates/header.php';
include 'functions/funtion_tambahdetailtransaksi.php';

$idbarang=getAllBarangID();
//var_dump($idbarang);
$idtransaksi=getAllTransaksiID();
echo"<br>";
//var_dump($idtransaksi);

?>
<div class="m-4">

<h1>tambah detail transaksi</h1>

<div class="m-3">

    <form action="" method="post">

    <div class="mb-4">
    <label for="barangid" class="form-label">pilih barang</label>
        <select class="form-select m2" aria-label="Default select example" name="barangid" id="barangid">
            <option selected>pilih barang</option>

            <?php for($i=0;$i<count($idbarang);$i++){?>
            <option value="<?= $idbarang[$i][0]?>"><?= getNamaBarangByID( $idbarang[$i][0])['nama_barang']?></option>
            <?php }?>
        </select>
        <div id="barangid" class="form-text"><?php if(isset($_POST['barangid'])){ echo validateBarang($_POST['barangid'])['pesan'];}?></div>
    </div>

    <div class="mb-4">
    <label for="transaksiid" class="form-label">transaksi id</label>
        <select class="form-select m2" aria-label="Default select example" name="transaksiid" id="transaksiid">
            <option selected>pilih ID Transaksi</option>
            <?php for($i=0;$i<count($idtransaksi);$i++){?>
            <option value="<?= $idtransaksi[$i][0]?>"><?= $idtransaksi[$i][0]?></option>
            <?php }?>
        </select>
        <div id="transaksiid" class="form-text"><?php if(isset($_POST['transaksiid'])){ echo validateTransaksiID($_POST['transaksiid'])['pesan'];}?></div>
    </div>

    <div class="mb-3">
        <label for="qty" class="form-label">Quantity</label>
        <input type="text" class="form-control" id="qty" name="qty" aria-describedby="qtyhelp" value="<?php if(isset($_POST['qty'])){echo $_POST['qty'];}?>">
        <div id="qtyhelp" class="form-text"><?php if(isset($_POST['qty'])){echo validateQuantity($_POST['qty'])['pesan'];}?></div>
    </div>
   
    
    <a href="index.php"><button type="button" class="btn btn-secondary">kembali</button></a>
    <!-- submit -->
    <button type="submit" class="btn btn-primary">Tambah Detail Transaksi</button>
    </form>
</div>
</div>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $barangid= $_POST['barangid'];
    $transaksiid= $_POST['transaksiid'];
    $qty= $_POST['qty'];
    if(validateBarang($barangid)['error'] 
    and validateTransaksiID($transaksiid)['error'] 
    and validateQuantity($qty)['error'] 
    ){
        if(addDetailTransaksi($transaksiid,$barangid,$qty)){
            echo "<script>alert('data barang berhasil di tambah')</script>";
        };
    }else{
        echo 'data gagal di tambah';
    }
}


require 'templates/footer.php';
?>