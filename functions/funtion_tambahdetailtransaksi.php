<?php 

include 'dbconnect.php';

//ambil data
function getAllBarang(){

}

function getAllBarangID(){
    $query="SELECT id FROM barang";
    global $conn;
    $result=mysqli_query($conn,$query);
    return mysqli_fetch_all ($result);
}

function getNamaBarangByID($id){
    $query="SELECT nama_barang FROM barang WHERE id='$id'";
    global $conn;
    $result=mysqli_query($conn,$query);
    return mysqli_fetch_assoc($result);
}
function  getAllTransaksiID(){
    $query="SELECT id  FROM transaksi";
    global $conn;
    $result=mysqli_query($conn,$query);
    return mysqli_fetch_all ($result);
}

function getHargaBarangById($id){
    $query="SELECT harga FROM barang WHERE id='$id'";
    global $conn;
    $result=mysqli_query($conn,$query);
    return mysqli_fetch_assoc($result);
}

//validasi
function validateBarang($barang){
    $res=[];
    if(!isset($barang)){
        $res['error']=false;
        $res['pesan']='masukkan barang';
        return $res;
    }else{
        $res['error']=true;
        $res['pesan']='success';
        return $res;
    }
}

function validateTransaksiID($trid){
    $res=[];
    if(!isset($trid)){
        $res['error']=false;
        $res['pesan']='masukkan id transaksi';
        return $res;
    }else{
        $res['error']=true;
        $res['pesan']='success';
        return $res;
    }
}

function validateQuantity($qty){
    $res=[];
    $pattern = '/[0-9]+/';
    if(!isset($qty)){
        $res['error']=false;
        $res['pesan']='masukkan quantity';
        return $res;
    }else{
        if(preg_match($pattern,$qty)){
            $res['error']=true;
            $res['pesan']='success';
            return $res;
        }else{
            $res['error']=false;
            $res['pesan']='hanya boleh angka';
            return $res;
        }
    }  
}

//inserrt database

function addDetailTransaksi($transaksi_id,$barang_id,$qty){
    $harga=getHargaBarangById($barang_id)['harga'];
    $harga=$harga*$qty;
    $query="INSERT INTO transaksi_detail (transaksi_id,barang_id,harga,qty)
    VALUE ('$transaksi_id','$barang_id','$harga','$qty')";
    global $conn;
    mysqli_query($conn,$query);
    return true;
}