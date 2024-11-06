<?php 
require 'dbconnect.php';

//get data
function getAllPelangganId(){
    $query='SELECT id FROM pelanggan';
    global $conn;
    $result=mysqli_query($conn,$query);
    return mysqli_fetch_all ($result);
}

function getNamaPelanggan(){
    $query="SELECT nama FROM pelanggan ";
    global $conn;
    $result=mysqli_query($conn,$query);
    return mysqli_fetch_all( $result);
}

function getNamaPelangganById($id){
    $idp=(int)$id;
    $query="SELECT nama FROM pelanggan WHERE id='$idp'";
    global $conn;
    $result=mysqli_query($conn,$query);
    return mysqli_fetch_assoc($result);
}

//validasi
function validateDate($date){
    $res=[];
    $nowdate=  date("Y-m-d");
    if(!isset($date) or $date=''){
        $res['error']=false;
        $res['pesan']='tanggal kosong!, masukkan tanggal';
        return $res;
    }else{
        if($date <= $nowdate){
            $res['error']=true;
            $res['pesan']='success';
            return $res;
        }else{
            $res['error']=false;
            $res['pesan']='tanggal yang di input kan tidak boleh kurang dari sekarang';
            return $res;
        }
    }
}

function validateKeterangan($keterangan){
    $res=[];
    $pattern = '/[\s\S]{3,}/';
    if(!isset($keterangan)){
        $res['error']=false;
        $res['pesan']='keterangan kosong!, masukkan ketarangan';
        return $res;
    }else{
        if(preg_match($pattern,$keterangan)){
            $res['error']=true;
            $res['pesan']='success';
            return $res;
        }else{
            $res['error']=false;
            $res['pesan']='minimal 3 huruf atau angka di keterangan';
            return $res;
        }
    }

}

function validateTotal($total){
    $res=[];
    $pattern = '/[0-9]+/';
    if(!isset($total)){
        $res['error']=false;
        $res['pesan']='total kosong!, masukkan total';
        return $res;
    }else{
        if(preg_match($pattern,$total)){
            $res['error']=true;
            $res['pesan']='success';
            return $res;
        }else{
            $res['error']=false;
            $res['pesan']='minimal 3 huruf atau angka di keterangan';
            return $res;
        }
    }  
}

function validatePelanggan($pelanggan){
    $array=getAllPelangganId();
    $arpel=[];
    for($i=0;$i<count($array);$i++){
        $arpel[$i]=$array[$i][0];
    }
    $res=[];
    if(!isset($pelanggan) or $pelanggan==''){
        $res['error']=false;
        $res['pesan']='pelanggan kosong!, masukkan pelanggan';
        return $res;
    }else{
        if(in_array($pelanggan, $arpel)){
            $res['error']=true;
            $res['pesan']='success';
            return $res;
        }else{
            $res['error']=false;
            $res['pesan']='pelanggan tidak ada di data';
            return $res;
        }
    }  
    
}

//masukkna data

function addTransaksi($waktu,$keterangan,$total,$pelanggan){
    $queries="INSERT INTO transaksi (waktu_transaksi, keterangan, total, pelanggan_id) 
    VALUE ('$waktu','$keterangan','$total','$pelanggan')";
    global $conn;
    mysqli_query($conn,$queries);
    return true;
}