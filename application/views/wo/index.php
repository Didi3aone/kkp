<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php 
                    $level = $this->session->userdata("level"); 

                    if($level == "PPIC" || $level == "Administrator") :
                ?>
                <div class="pull-right"> 
                	<a href="<?= site_url('work_order/create'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add New WO</a>
                </div>
                <?php endif; ?>
                <h4 class="card-title"><?= $title_table; ?></h4>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>No Batch</th>
                                <th>Qty</th>
                                <th>Kadar Persen</th>
                                <th>Date</th>
                                <th>Status WO</th>
                                <?php if( $this->session->userdata("level") != "Manager Produksi") : ?>
                                <th>Action</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
                                $level = $this->session->userdata("level");

                        		if(!empty($data)) {
                        			foreach( $data as $key => $val ):
                        	?>
                            <tr>
                                <td><?= $val['WorkOrderName']; ?></td>
                                <td><?= $val['WorkOrderNoBatch']; ?></td>
                                <td><?= $val['WorkOrderQty']; ?></td>
                                <td><?= $val['WorkOrderKadar']; ?></td>
                                <td><?= date('Y-m-d', strtotime($val['WorkOrderDate'])); ?></td>
                                <td style="width: 100px;">
                                    <!-- leader status -->
                                    <?php 
                                        if( $level == "Leader Produksi" && $val['WorkOrderStatus'] == 1) : ?>
                                            <span class="label label-warning">Menunggu Proses Produksi</span> 
                                        <?php elseif($level == "Leader Produksi" && $val['WorkOrderStatus'] == 2) : ?>
                                            <span class="label label-success">Proses Produksi</span>
                                        <?php elseif($level == "Leader Produksi" && $val['WorkOrderStatus'] == 3) : ?>
                                           <span class="label label-success">Produksi Selesai</span> 
                                    <!-- end leader status -->

                                    <!--   ppPic status -->
                                    <?php 
                                        elseif($val['WorkOrderStatus'] == 0 && $level != "Leader Produksi") : 
                                    ?>
                                        <span class="label label-warning">WO Baru</span> 
                                    <?php elseif($val['WorkOrderStatus'] == 1 && $level == "Leader Produksi" || $level == "Administrator") : ?>
                                        <span class="label label-warning">Belum di Prosess</span>
                                    <?php elseif($val['WorkOrderStatus'] == 1 && $level == "PPIC" || $level == "Administrator") :?>
                                        <span class="label label-primary">Menunggu Proses Produksi</span>
                                    <?php elseif($val['WorkOrderStatus'] == 2 && $level == "PPIC" || $level == "Leader Produksi" || $level == "Administrator") :?>
                                        <span class="label label-info">Prosess Produksi</span>
                                    <?php elseif($val['WorkOrderStatus'] == 3 && $level == "PPIC") : ?>
                                        <span class="label label-success">Produksi Success</span>
                                    <!-- end ppPic -->
                                    
                                    <!-- manager status -->
                                    <?php else :  
                                        if($val['WorkOrderStatus'] == 0) :
                                        ?>
                                            <span class="label label-warning">Belum di Prosess</span> 
                                        <?php elseif($val['WorkOrderStatus'] == 1): ?>
                                            <span class="label label-primary">Menunggu Proses Produksi</span>
                                        <?php elseif($val['WorkOrderStatus'] == 2): ?>
                                            <span class="label label-info">Prosess Produksi</span>
                                        <?php elseif($val['WorkOrderStatus'] == 3): ?>
                                            <span class="label label-success">Produksi Success</span>
                                        <?php else: ?>
                                            <span class="label label-danger">Produksi failed</span>
                                        <?php endif; ?>
                                    <!-- end manager statyus -->
                                    <?php endif; ?>
                                </td>
                                <?php if( $this->session->userdata("level") != "Manager Produksi") : ?>
                                <td>
                                    <?php if( $val['WorkOrderStatus'] == 0 || $level == "Administrator") : ?>
                                        <a href="<?= site_url('work_order/edit/'.$val['WorkOrderId']); ?>" class="btn btn-primary">
                                            <i class="fa fa-pencil"></i> Edit
                                        </a>
                                        <a href="javascript:void(0)" onclick="confirm_send_wo(<?= $val['WorkOrderId']; ?>)" class="btn btn-warning"><i class="fa fa-plane"></i> Send Produksi
                                        </a>
                                    <?php elseif( $val['WorkOrderStatus'] == 1 && $level == "Leader Produksi" || $level == "Administrator") : ?>
                                        <a href="<?= site_url('bpp/create/'.$val['WorkOrderId']); ?>" class="btn btn-primary"><i class="fa fa-plane"></i> Create BPP</a>
                                    <?php endif;?>
                                    <a href="<?= site_url('work_order/print/'.$val['WorkOrderId']); ?>" target="_blank" class="btn btn-success"><i class="fa fa-print"></i> print</a>
                                </td>
                                <?php endif; ?>
                            </tr>
                            <?php 
	                            	endforeach;
	                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
