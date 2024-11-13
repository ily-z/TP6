<?php 

include 'dbconnect.php';


function getTanggalDanHargaByTanggal($tanggalawal,$tanggalakhir){
    $query="SELECT tanggal, harga FROM transaksi
    WHERE tanggal BETWEEN '$tanggalawal' AND '$tanggalakhir'
    ";

    global $conn;
    $result=mysqli_query($conn,$query);
    return mysqli_fetch_all($result,MYSQLI_ASSOC);
}


function getJumlahPendapatan(){

}


function getTanggalTrimmed(){
    $query="SELECT waktu_transaksi FROM transaksi";
    global $conn;
    $result=mysqli_query($conn,$query);
    $resulted=mysqli_fetch_all($result);
    //var_dump($resulted);
    $datacatch=[];
    foreach($resulted as $data){
        if(!in_array($data[0],$datacatch)){
            // $datacatch[]=$data[0];
            array_push($datacatch,$data[0]);
        }
    }
    return $datacatch ;
}

function getIdTransaksiByTanggal($tanggal){
    $query="SELECT ";
}

function getAllTotalByTanggal($tanggal){
    $query="SELECT total FROM transaksi WHERE waktu_transaksi='$tanggal'";
    global $conn;
    $result=mysqli_query($conn,$query);
    $counting= mysqli_fetch_array($result);
    return array_sum($counting);
}

function createTableLaporan($tanggalawal,$tanggalakhir){
    $resultdate=[];
    $i=0;
    //$tanggal=getTanggalTrimmed();
    $tanggal=getAllTanggalByRangeTrimmed($tanggalawal,$tanggalakhir);
    foreach($tanggal as $date){
        $resultdate[$i]['total']=getAllTotalByTanggal($date);
        $resultdate[$i]['tanggal']=$date;
        $i++;
    }

    return $resultdate;
}

function getAllTanggalByRangeTrimmed($tanggalawal,$tanggalakhir){
    $query="SELECT waktu_transaksi FROM transaksi 
    WHERE waktu_transaksi BETWEEN '$tanggalawal' AND '$tanggalakhir'
    ";

    global $conn;
    $result=mysqli_query($conn,$query);
    $resulted=mysqli_fetch_all($result);
    //var_dump($resulted);
    $datacatch=[];
    foreach($resulted as $data){
        if(!in_array($data[0],$datacatch)){
            // $datacatch[]=$data[0];
            array_push($datacatch,$data[0]);
        }
    }
    return $datacatch ;
}


function takeTanggalOnly($data){
    $result=[];
    foreach($data as $dat){
        $result[]=$dat['tanggal'];
    }

    return $result;
}

function takeTotalOnly($data){
    $result=[];
    foreach($data as $dat){
        $result[]=$dat['total'];
    }

    return $result;

}


function getTotalPelangganByRange($tanggalawal,$tanggalakhir){
    $data=getPelangganIdByRange($tanggalawal,$tanggalakhir);
    //var_dump($data);

    $result=[];
    foreach($data as $dat){
        if(!in_array($dat[0],$result)){
            $result[]=$dat[0];
        }
    }

    return count($result);
}

function getPelangganIdByRange($tanggalawal,$tanggalakhir){
    $query="SELECT pelanggan_id FROM transaksi
    WHERE waktu_transaksi BETWEEN '$tanggalawal' AND '$tanggalakhir'
    ";

     global $conn;
     $result=mysqli_query($conn,$query);
     return  mysqli_fetch_all($result);
}