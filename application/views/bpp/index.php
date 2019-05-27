<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="pull-right"> 
                	<!--<a href="<?php// site_url('work_order/create'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add New WO</a>-->
                </div>
                <h4 class="card-title"><?= $title_table; ?></h4>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Bahan</th>
                                <th>Qty</th>
                                <th>Kadar Persen</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
                                $level = $this->session->userdata("level");

                        		if(!empty($data)) {
                        			foreach( $data as $key => $val ):
                        	?>
                            <tr>
                                <td><?= ucwords($val['bpp_bahan']); ?></td>
                                <td><?= $val['bpp_qty']; ?></td>
                                <td><?= $val['bpp_kadar']; ?></td>
                                <td><?= date('Y-m-d', strtotime($val['bpp_created_date'])); ?></td>
                                <td>
                                    <?php
                                        if($level == "Leader Produksi") :
                                            if($val['bpp_status'] == 1) :
                                        ?>
                                        <span class="label label-warning">Menunggu Proses gudang</span>
                                            <?php elseif($val['bpp_status'] == 2) : ?>
                                            <span class="label label-primary">Barang siap produksi</span>
                                        <?php elseif($val['bpp_status'] == 3) : ?>
                                            <span class="label label-info">Menunggu Approval QC</span>
                                        <?php elseif($val['bpp_status'] == 4) :?>
                                            <span class="label label-success"> Approved</span>
                                        <?php else :?>
                                            <span class="label label-danger">Rejected</span>
                                        <?php 
                                            endif;
                                        else :
                                            if($val['bpp_status'] == 1 && $level == "Staff Gudang") :
                                        ?>
                                            <span class="label label-warning">Menunggu Proses gudang</span>
                                        <?php elseif($val['bpp_status'] == 2 && $level == "Staff Gudang") : ?>
                                            <span class="label label-success">Barang Siap Produksi</span>
                                        <?php elseif($val['bpp_status'] > 3 && $level == "Staff Gudang") : ?>
                                             <span class="label label-success">Produksi Selesai</span>
                                        <?php endif; 
                                            if($val['bpp_status'] == 3 && $level == "QC") :
                                        ?>
                                            <span class="label label-warning">Menunggu Approval QC</span>
                                        <?php elseif($val['bpp_status'] == 4 && $level == "QC") : ?>
                                            <span class="label label-success">Produksi Selesai</span>
                                        <?php elseif($val['bpp_status'] == 5 && $level == "QC") : ?>
                                            <span class="label label-danger">Rejected</span>
                                            <?php endif; 
                                        endif; 
                                    ?>

                                </td>
                                <td style="text-align: center;">
                                    <?php 
                                        if($level == "Staff Gudang" && $val['bpp_status'] == 1) :
                                    ?>
                                	<a href="javascript:void(0)" onclick="confirm_bpp(<?= $val['bpp_id']; ?>)" class="btn btn-primary">
                                        <i class="fa fa-plane"></i> Prosess BPP
                                    </a>
                                    <?php elseif($level == "Leader Produksi" && $val['bpp_status'] == 2) : ?>
                                    <a href="javascript:void(0)" onclick="confirm_send_qc(<?= $val['bpp_id']; ?>)" class="btn btn-primary">
                                        <i class="fa fa-plane"></i> Send Qc
                                    </a>
                                    <?php elseif($val['bpp_status'] == 3 && $level == "QC") :?>
                                        <a href="<?php echo site_url('bpp/view/'.$val['bpp_id']); ?>" class="btn btn-primary">View</a>
                                    <?php else : ?>
                                        <?php if($val['bpp_status'] > 3) : ?>
                                             <a href="<?php echo site_url('bpp/print_report/'.$val['bpp_id']); ?>" target="_blank" class="btn btn-success"><i class="fa fa-print"></i> print</a>
                                        <?php elseif($level != "QC") : ?>
                                            <a href="<?= site_url('bpp/print/'.$val['bpp_id']); ?>" target="_blank" class="btn btn-success"><i class="fa fa-print"></i> print</a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
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
