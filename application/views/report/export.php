<?php 
	// header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
	// header("Content-Disposition: attachment;filename=\"reporting.xls\"");
	// header("Cache-Control: max-age=0");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>assets/images/favicon.png">
    <title>Export Report</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url(); ?>assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<table class="table table-bordered">
			<tr>
				<th style="background-color: blue;">No</th>
				<th style="background-color: blue;">Nama</th>
				<th style="background-color: blue;">Qty</th>
				<th style="background-color: blue;">Deskripsi</th>
				<th style="background-color: blue;">Status</th>
				<th style="background-color: blue;">Tanggal Wo</th>
				<th style="background-color: blue;">Tanggal Selesai</th>
			</tr>
			<?php 
				if(!empty($report)) :
					foreach($report as $key => $row):
			?>
			<tr>
				<td><?php echo ($key + 1); ?></td>
				<td><?php echo $row->WorkOrderName; ?></td>
				<td><?php echo $row->WorkOrderQty; ?></td>
				<td><?php echo $row->WorkOrderDescription; ?></td>
				<td><?php 
					if( $row->WorkOrderStatus == 3) {
						echo "Wo Selesai";
					} 
				?></td>
				<td><?php echo date('Y-m-d',strtotime($row->WorkOrderDate)); ?></td>
				<td>
					<?php 
						if($row->WorkOrderStatus == 3) {
							echo $row->WorkOrderUpdated;
						} else {
							echo "-";
						}
					?>
				</td>
			</tr>
			<?php endforeach; ?>
			<?php endif; ?>
		</table>
	</div>
</body>
</html>