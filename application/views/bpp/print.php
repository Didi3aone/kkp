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
				<th>BPP Bahan</th>
				<th>BPP Qty</th>
				<th>BPP Kadar Persen</th>
				<th>BPP Tanggal</th>
			</thead>
			<tbody>
				<td>1</td>
				<td><?php echo $print_data->bpp_bahan; ?></td>
				<td><?php echo $print_data->bpp_qty; ?></td>
				<td><?php echo $print_data->bpp_kadar; ?></td>
				<td><?php echo $print_data->bpp_created_date; ?></td>
			</tbody>
		</table>
	</div>
	<br>
	<div class="row">
		<div class="col-8"></div>
		<div class="col-4">
			<p>Jakarta ,  <?= hari_ini() . "&nbsp;". dateToIndo(date('Y-m-d')) ?></p>
			<p style="margin-left: 60px;"><?= $this->session->userdata('level'); ?></p> <br><br>
			<p style="margin-left: 80px;"><?php echo $this->session->userdata('fullname'); ?></p>
		</div>
	</div>
</body>
</html>
<script>
	window.print();
</script>