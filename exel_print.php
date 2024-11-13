<?php 
//require 'templates/header.php';
include "functions/function_report_transaksi.php";

$tabel=createTableLaporan($_GET['tanggalawal'],$_GET['tanggalakhir']);

$totalpelanggan=getTotalPelangganByRange($_GET['tanggalawal'],$_GET['tanggalakhir']);
$totalpendapatan=array_sum(takeTotalOnly($tabel));
?>

<div >
      <div >
          <table border="1">
        <thead>
          <tr>
            <th >NO</th>
            <th >Total</th>
            <th >Tanggal</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $i=1;
          foreach($tabel as $data){ 
          ?>
          <tr>
            <th ><?= $i?></th>
            <td><?= $data['total']?></td>
            <td><?= $data['tanggal']?></td>
          </tr>
          <?php  
          $i++;
          }
          ?>
          
        </tbody>
      </table>
      </div>
    </div>
    
    <div >
      <div>
          <table border="1">
        <thead >
          <tr>
            <th >jumlah Pelanggan</th>   
            <th >jumlah pendapatan</th>
          </tr>
        </thead>
        <tbody>
          
          <tr>
            <td><?= $totalpelanggan?></td>
            <td><?= $totalpendapatan?></td>
          </tr>
        
          
        </tbody>
      </table>
      </div>
    </div>


<?php 
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=reporting.xls");

//require 'templates/header.php';
?>