<?php
require 'templates/header.php';
include 'function.php';

$option=getAllSupplierId();
var_dump($option);
echo '<br>';
print_r ($option);
?>
<div class="m-4">

<h1>tambah data barang master</h1>

<div class="m-3">

    <form action="" method="post">
    <div class="mb-3">
        <label for="kodbar" class="form-label">Kode barang</label>
        <input type="text" class="form-control" id="kodbar" name="kodbar" aria-describedby="kodbarhelp" value="<?php if(isset($_POST['kodbar'])){echo $_POST['kodbar'];}?>">
        <div id="kodbarhelp" class="form-text"><?php if(isset($_POST['kodbar'])){echo validateKodebarang($_POST['kodbar'])['pesan'];}?></div>
    </div>
    <div class="mb-3">
        <label for="nambar" class="form-label">Nama Barang</label>
        <input type="text" class="form-control" id="nambar" name="nambar" aria-describedby="nambarhelp" value="<?php if(isset($_POST['nambar'])){echo $_POST['nambar'];}?>">
        <div id="nambarhelp" class="form-text"><?php if(isset($_POST['nambar'])){echo validateNamaBarang($_POST['nambar'])['pesan'];}?></div>
    </div>
    <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="text" class="form-control" id="harga" name="harga" aria-describedby="hargahelp" value="<?php if(isset($_POST['harga'])){echo $_POST['harga'];}?>">
        <div id="hargahelp" class="form-text"><?php if(isset($_POST['harga'])){ echo validateHarga($_POST['harga'])['pesan'];}?></div>
    </div>
    <div class="mb-3">
        <label for="stok" class="form-label">Stok</label>
        <input type="text" class="form-control" id="stok" name="stok" aria-describedby="stokhelp" value="<?php if(isset($_POST['stok'])){echo $_POST['stok'];}?>">
        <div id="stokhelp" class="form-text"><?php if(isset($_POST['stok'])){ echo validatestok($_POST['stok'])['pesan'];}?></div>
    </div>
    <div class="mb-4">
    <label for="idsupplier" class="form-label">supplier ID</label>
        <select class="form-select m2" aria-label="Default select example" name="idsupplier" id="idsupplier">
            <option selected>pilih menu id</option>
            <?php for($i=0;$i<count($option);$i++){?>
            <option value="<?= $option[$i][0]?>"><?= $option[$i][0]?></option>
            <?php }?>
        </select>
        <div id="idsupplier" class="form-text"><?php if(isset($_POST['alamat'])){ echo validateSupplierId($_POST['alamat'])['pesan'];}?></div>
    </div>


    
    <a href="index.php"><button type="button" class="btn btn-secondary">kembali</button></a>
    <!-- submit -->
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $kodbar= $_POST['kodbar'];
    $nambar= $_POST['nambar'];
    $harga= $_POST['harga'];
    $stok= $_POST['stok'];
    $idsupplier= $_POST['idsupplier'];

    if(validateKodebarang($kodbar)['error'] 
    and validateNamaBarang($nambar)['error'] 
    and validateHarga($harga)['error'] 
    and validateStok($stok)['error'] 
    and validateSupplierId($idsupplier)['error']){
        if(addDataBarang()){
            echo "<script>alert('data barang berhasil di tambah')</script>";
        };
    }else{
        echo 'data gagal di tambah';
    }
}


require 'templates/footer.php';
?>