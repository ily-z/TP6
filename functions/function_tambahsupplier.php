<?php 
require 'dbconnect.php';

function addDataSuplier(){
    $nama=$_POST['nama'];
    $telp=$_POST['telp'];
    $alamat=$_POST['alamat'];

    $query= "INSERT INTO supplier (nama, telp, alamat) VALUE ('$nama','$telp','$alamat')";
    global $conn;
    $conn->query($query);
    $conn->close();
    return true;
}

function validateName($nama){
    $res=[];
    $pregmatch='/^[a-zA-Z\s]+$/';
    if(!isset($nama) or $nama==''){
        $res['error']=false;
        $res['pesan']='required!';
        return $res;
    }else{
        if(!preg_match($pregmatch,$nama)){
            $res['error']=false;
            $res['pesan']='nama hanya boleh huruf a-z dan kapital';
            return $res;
        }else{
            $res['error']=true;
            $res['pesan']='data berhasil';
            return $res;
        }
    }
}


function validateNumber($nomer){
    $res=[];
    $pregmatch='/^[0-9]{11}$/';
    if(!isset($nomer)or $nomer==''){
        $res['error']=false;
        $res['pesan']='required!';
        return $res;
    }else{
        if(!preg_match($pregmatch,$nomer)){
            $res['error']=false;
            $res['pesan']='hanya boleh masukkan angka dan harus 11 digit';
            return $res;
        }else{
            $res['error']=true;
            $res['pesan']='data berhasil';
            return $res;
        }
    }
}


function validateAlamat($alamat){
    $res=[];
    $pregmatch='/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d\s]+$/';
    if(!isset($alamat) or $alamat==''){
        $res['error']=false;
        $res['pesan']='required!';
        return $res;
    }else{
        if(!preg_match($pregmatch,$alamat)){
            $res['error']=false;
            $res['pesan']='masukkan alamat dengan nomer';
            return $res;
        }else{
            $res['error']=true;
            $res['pesan']='data berhasil';
            return $res;
        }
    }
}


