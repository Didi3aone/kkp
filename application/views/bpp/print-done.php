<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Print Document</title>
	<link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url(); ?>assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
	  	<div class="row">
	    	<div class="col-2">
		      	<img src="<?php echo base_url(); ?>assets/images/indaroma_cv.jpg" alt="" width="150">
		    </div>
	    	<div class="col-6">
		     	<center  style="margin-left: 60px;" ><h3>Laporan Produksi</h3></center>
				<center style="margin-left: 60px;" >========================================<center>
				<center style="margin-left: 60px;" > PT INDAROMA</center>
		    </div>
		    <div class="col-2">
		      	<!-- <img src="<?php echo base_url(); ?>assets/images/indaroma_cv.jpg" alt="" width="100"> -->
		    </div>

	  	</div>
	</div>

	<br>
	<!-- <div style="margin-bottom: 80px;"> -->
	<!-- </div> -->
	<div class="container">
		<table border="1" class="table table-bordered">
			<thead>
				<th>No</th>
				<th>Nama Produksi</th>
				<th>No Batch</th>
				<th>Qty</th>
				<th>Kadar Persen</th>
				<th>Status</th>
			</thead>
			<tbody>
				<td>1</td>
				<td><?php echo $print_data->WorkOrderName; ?></td>
				<td><?php echo $print_data->WorkOrderNoBatch; ?></td>
				<td><?php echo $print_data->WorkOrderQty; ?></td>
				<td><?php echo $print_data->WorkOrderKadar; ?></td>
				<td>
					<?php 
						if($print_data->WorkOrderStatus == 3){
							echo "Produksi Selesai";
						} elseif($print_data->WorkOrderStatus == 4) {
							echo "Produk Rejected";
						} else {
							//do stuff
						}
					?>
				</td>
			</tbody>
		</table>
	</div>
	<br>
	<div class="row">
		<div class="col-8"></div>
		<div class="col-4">
			<p>Jakarta ,  <?= hari_ini() . "&nbsp;". dateToIndo(date('Y-m-d')) ?></p>
			<p style="margin-left: 90px;"><?= $this->session->userdata('level'); ?></p> <br><br>
			<p style="margin-left: 90px;"><?php echo $this->session->userdata('fullname'); ?></p>
		</div>
	</div>
</body>
</html>
<script>
	window.print();
</script>