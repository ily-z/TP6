<?php 
require_once 'templates/header.php';
include 'functions/function_report_transaksi.php';

?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div>
    <form action="" method="post">
    <div class="d-flex flex-row">
        <div class="m-2">
            <label for="tanggalawal" class="form-label">Waktu Transaksi</label>
            <input type="date" class="form-control" placeholder="YYYY-MM-DD" id="tanggalawal" name="tanggalawal" aria-describedby="tanggalawalhelp" value="<?php if(isset($_POST['tanggalawal'])){echo $_POST['tanggalawal'];}?>">
            <div id="tanggalawalhelp" class="form-text"></div>
        </div>
    
        <div class="m-2">
            <label for="tanggalakhir" class="form-label">Waktu Transaksi</label>
            <input type="date" class="form-control" placeholder="YYYY-MM-DD" id="tanggalakhir" name="tanggalakhir" aria-describedby="tanggalakhirhelp" value="<?php if(isset($_POST['tanggalakhir'])){echo $_POST['tanggalakhir'];}?>">
            <div id="tanggalakhirhelp" class="form-text"></div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary mt-4 m-2">lihat laporan Transaksi</button>
        </div>
    </div>
    </form>
</div>


  </form>

<?php 
$display='none';
$tabel=[];
$totalpelanggan='';
$totalpendapatan='';

if($_SERVER['REQUEST_METHOD']='POST'){
    if(isset($_POST['tanggalawal']) and isset($_POST['tanggalakhir'])){
        $tabel=createTableLaporan($_POST['tanggalawal'],$_POST['tanggalakhir']);
        $totalpelanggan=getTotalPelangganByRange($_POST['tanggalawal'],$_POST['tanggalakhir']);
        $totalpendapatan=array_sum(takeTotalOnly($tabel));
        $display='block';
    }
}
?>

<!-- displaying -->
<div class="display" style="display: <?= $display?>;">

  <div class="d-flex ">
    <button onclick="window.print()" class="no-print btn btn-primary m-2">CETAK</button>
    
    <form action="exel_print.php" method="get">
      <input type="hidden" value="<?= $_POST['tanggalawal']?>" name="tanggalawal" id="tanggalawal">
      <input type="hidden" value="<?= $_POST['tanggalakhir']?>" name="tanggalakhir" id="tanggalakhir">
      <button type="submit" class="no-print btn btn-primary m-2">EXCEL</button>
  </div>
  <!-- graph -->
  <div class="d-flex justify-content-center">
  
      <div class="w-75 p-3 ">
          
          <div>
          <canvas id="myChart"></canvas>
          </div>
      
          <script>
        const ctx = document.getElementById('myChart');
      
        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: <?= json_encode( takeTanggalOnly($tabel))?>,
            datasets: [{
              label: '# of Votes',
              data: <?= json_encode( takeTotalOnly($tabel))?>,
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      </script>
      </div>
  </div>
  
  <!-- tabel -->
  <div class="d-flex justify-content-center ">
      <div class="w-75 p-3">
          <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">NO</th>
            <th scope="col">Total</th>
            <th scope="col">Tanggal</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $i=1;
          foreach($tabel as $data){ 
          ?>
          <tr>
            <th scope="row"><?= $i?></th>
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
    
    <div class="d-flex justify-content-center ">
      <div class="w-75 p-3">
          <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">jumlah Pelanggan</th>   
            <th scope="col">jumlah pendapatan</th>
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

  </div>

<?php 
require_once 'templates/footer.php';
?>