<?php
require 'templates/header.php';
include 'function.php';

?>
<div class="m-4">

<h1>tambah data suplier master</h1>

<div class="m-3">

    <form action="" method="post">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" aria-describedby="namahelp" value="<?php if(isset($_POST['nama'])){echo $_POST['nama'];}?>">
        <div id="namahelp" class="form-text"><?php if(isset($_POST['nama'])){echo validateName($_POST['nama'])['pesan'];}?></div>
    </div>
    <div class="mb-3">
        <label for="telp" class="form-label">Telp</label>
        <input type="text" class="form-control" id="telp" name="telp" aria-describedby="telphelp" value="<?php if(isset($_POST['telp'])){echo $_POST['telp'];}?>">
        <div id="telphelp" class="form-text"><?php if(isset($_POST['telp'])){echo validateNumber($_POST['telp'])['pesan'];}?></div>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" aria-describedby="alamathelp" value="<?php if(isset($_POST['alamat'])){echo $_POST['alamat'];}?>">
        <div id="alamathelp" class="form-text"><?php if(isset($_POST['alamat'])){ echo validateAlamat($_POST['alamat'])['pesan'];}?></div>
    </div>

    
    <a href="index.php"><button type="button" class="btn btn-secondary">kembali</button></a>
    <!-- submit -->
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>


<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $nama= $_POST['nama'];
    $telp= $_POST['telp'];
    $alamat= $_POST['alamat'];
    if(validateName($nama)['error'] and validateNumber($telp)['error'] and validateAlamat($alamat)['error']){
        if(addDataSuplier()){
            echo "<script>alert('data berhasil di tambah')</script>";
        };
    }else{
        echo 'data gagal di tambah';
    }
}

require 'templates/footer.php';
?>