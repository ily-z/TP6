<?php
require 'templates/header.php';
include 'functions/function_tambahtransaksi.php';

$getid=getAllPelangganId();
//var_dump($getid);
//var_dump(getNamaPelanggan());

$mindate=date("d/m/y");
//var_dump($mindate);
?>

<?php  //var_dump(getNamaPelangganById(4));?>
<div class="m-4">

<h1>tambah transaksi master</h1>

<div class="m-3">

    <form action="" method="post">
    <div class="mb-3">
        <label for="waktutransaksi" class="form-label">Waktu Transaksi</label>
        <input type="date" class="form-control" placeholder="YYYY-MM-DD" id="waktutransaksi" name="waktutransaksi" aria-describedby="waktutransaksihelp" value="<?php if(isset($_POST['waktutransaksi'])){echo $_POST['waktutransaksi'];}?>">
        <div id="waktutransaksihelp" class="form-text"><?php if(isset($_POST['waktutransaksi'])){echo validateDate($_POST['waktutransaksi'])['pesan'];}?></div>
    </div>
    <div class="mb-3">
        <label for="ktrngbrng" class="form-label">keterangan</label>
        <textarea  rows="3" class="form-control" id="ktrngbrng" name="ktrngbrng" aria-describedby="ktrngbrnghelp" value="<?php if(isset($_POST['ktrngbrng'])){echo $_POST['ktrngbrng'];}?>" placeholder="masukkan keterangan transaksi"></textarea>
        <div id="ktrngbrnghelp" class="form-text"><?php if(isset($_POST['ktrngbrng'])){echo validateKeterangan($_POST['ktrngbrng'])['pesan'];}?></div>
    </div>
    <div class="mb-3">
        <label for="totalbrng" class="form-label">Total</label>
        <input type="text" class="form-control" id="totalbrng" name="totalbrng" aria-describedby="totalbrnghelp" value="0">
        <div id="totalbrnghelp" class="form-text"><?php if(isset($_POST['totalbrng'])){ echo validateTotal($_POST['totalbrng'])['pesan'];}?></div>
    </div>
    <div class="mb-4">
    <label for="pelanggan" class="form-label">pelanggan</label>
        <select class="form-select m2" aria-label="Default select example" name="pelanggan" id="pelanggan">
            <option selected>pilih pelanggan</option>

            <?php for($i=0;$i<count($getid);$i++){?>
            <option value="<?= $getid[$i][0]?>"> <?= getNamaPelangganById($getid[$i][0])['nama']?></option>
            <?php }?>
        </select>
        <div id="pelanggan" class="form-text"><?php if(isset($_POST['pelanggan'])){ echo validatePelanggan($_POST['pelanggan'])['pesan'];}?></div>
    </div>


    
    <a href="index.php"><button type="button" class="btn btn-secondary">kembali</button></a>
    <!-- submit -->
    <button type="submit" class="btn btn-primary">tambah data transaksi</button>
    </form>
</div>
</div>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $waktutransaksi= $_POST['waktutransaksi'];
    $ktrngbrng= $_POST['ktrngbrng'];
    $totalbrng= $_POST['totalbrng'];
    $pelanggan= $_POST['pelanggan'];


    if(validateDate($waktutransaksi)['error']
    and validateKeterangan($ktrngbrng)['error']
    and validateTotal($totalbrng)['error']
    and validatePelanggan($pelanggan)['error']   ){
        if(addTransaksi($waktutransaksi,$ktrngbrng,$totalbrng,$pelanggan)){
            echo "<script>alert('data transaksi berhasil di tambah')</script>";
        };
    }else{
        echo 'data gagal di tambah';
    }
}


require 'templates/footer.php';
?>