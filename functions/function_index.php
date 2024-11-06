<?php 
require 'dbconnect.php';

//queries



function getAllSupplierId(){
    $query='SELECT id FROM supplier';
    global $conn;
    $result=mysqli_query($conn,$query);
    return mysqli_fetch_all($result);
}


function getAllBarang(){
    $query="SELECT barang.id,barang.kode_barang,barang.nama_barang,barang.harga,barang.stok,supplier.nama
    FROM barang 
    RIGHT JOIN supplier  ON barang.supplier_id=supplier.id
    WHERE barang.id IS NOT NULL
    ORDER BY barang.id
    "; //buat join untuk ambil nama supplier dengan supploier id
    global $conn;
    $result=mysqli_query($conn,$query);
    return mysqli_fetch_all($result,MYSQLI_ASSOC);
}

function getAllTransaksi(){
    $query="SELECT transaksi.id, transaksi.waktu_transaksi, transaksi.keterangan, transaksi.total,pelanggan.nama
    FROM transaksi
    RIGHT JOIN pelanggan ON transaksi.pelanggan_id=pelanggan.id
    ORDER BY transaksi.id
    ";
    global $conn;
    $result=mysqli_query($conn,$query);
    return mysqli_fetch_all($result,MYSQLI_ASSOC);
}


function getAllTransaksiDetail(){
    $query="SELECT transaksi.id, barang.nama_barang, transaksi_detail.harga, transaksi_detail.qty
    FROM transaksi_detail
    LEFT JOIN transaksi ON transaksi.id=transaksi_detail.transaksi_id
    LEFT JOIN barang ON transaksi_detail.barang_id= barang.id
    ";
    global $conn;
    $result=mysqli_query($conn,$query);
    return mysqli_fetch_all($result,MYSQLI_ASSOC);
}


function deleteBarang($id){
    $query="DELETE FROM barang WHERE id='$id'";
    global $conn;
    mysqli_query($conn,$query);
 
    return true;
}


function getIdBaranginTransaksiDetail(){
    $query="SELECT barang_id FROM transaksi_detail";
    global $conn;
    $result=mysqli_query($conn,$query);
    return mysqli_fetch_all ($result);
}

function compareId($id){
    $array=getIdBaranginTransaksiDetail();
    $arrcomp=[];
    for($i=0;$i<count($array);$i++){
        $arrcomp[$i]=$array[$i][0];
    }

    //var_dump($arrcomp);
    if(in_array($id,$arrcomp)){
        return true;
    }
}

