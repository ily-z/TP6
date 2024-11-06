<?php 
require 'dbconnect.php';


function addDataBarang(){
    $kodbar= $_POST['kodbar'];
    $nambar= $_POST['nambar'];
    $harga= $_POST['harga'];
    $stok= $_POST['stok'];
    $idsupplier= $_POST['idsupplier'];

    $query= "INSERT INTO barang (kode_barang, nama_barang, harga, stok,supplier_id) 
    VALUE ('$kodbar','$nambar','$harga','$stok'.'$idsupplier')";
    global $conn;
    $conn->query($query);
    $conn->close();
    return true;
}

function getAllSupplierId(){
    $query='SELECT id FROM supplier';
    global $conn;
    $result=mysqli_query($conn,$query);
    return mysqli_fetch_all($result);
}



//validasi buat input barang
function validateKodebarang($kodebarang){
    $res=[];
    $pregmatch='/^[0-9]{4}$/';
    if(!isset($kodebarang) or $kodebarang==''){
        $res['error']=false;
        $res['pesan']='required!';
        return $res;
    }else{
        if(!preg_match($pregmatch,$kodebarang)){
            $res['error']=false;
            $res['pesan']='kode hanya bisa angka';
            return $res;
        }else{
            $res['error']=true;
            $res['pesan']='data berhasil';
            return $res;
        }
    }
}

function validateNamaBarang($namabarang){
    $res=[];
    $pregmatch='/^(?=.*[A-Za-z])+$/';
    if(!isset($namabarang) or $namabarang==''){
        $res['error']=false;
        $res['pesan']='required!';
        return $res;
    }else{
        if(!preg_match($pregmatch,$namabarang)){
            $res['error']=false;
            $res['pesan']='masukkan nama barang tidak ada angka';
            return $res;
        }else{
            $res['error']=true;
            $res['pesan']='data berhasil';
            return $res;
        }
    }
}

function validateHarga($harga){
    $res=[];
    $pregmatch='/^[0-9]+$/';
    if(!isset($harga) or $harga==''){
        $res['error']=false;
        $res['pesan']='required!';
        return $res;
    }else{
        if(!preg_match($pregmatch,$harga)){
            $res['error']=false;
            $res['pesan']='harga hanya boleh berupa angka saja';
            return $res;
        }else{
            $res['error']=true;
            $res['pesan']='data berhasil';
            return $res;
        }
    }
}

function validateStok($stok){
    $res=[];
    $pregmatch='/^[0-9]+$/';
    if(!isset($stok) or $stok==''){
        $res['error']=false;
        $res['pesan']='required!';
        return $res;
    }else{
        if(!preg_match($pregmatch,$stok)){
            $res['error']=false;
            $res['pesan']='stok hanya boleh berupa angka saja';
            return $res;
        }else{
            $res['error']=true;
            $res['pesan']='data berhasil';
            return $res;
        }
    }
}

function validateSupplierId($supplierid){
    $res=[];
    $pregmatch='/^[0-9]{1}$/';;
    if(!isset($supplierid) or $supplierid==''){
        $res['error']=false;
        $res['pesan']='required!';
        return $res;
    }else{
        if(!preg_match($pregmatch,$supplierid)){
            $res['error']=false;
            $res['pesan']='id belum di masukkan';
            return $res;
        }else{
            $res['error']=true;
            $res['pesan']='data berhasil';
            return $res;
        }
    }
}

