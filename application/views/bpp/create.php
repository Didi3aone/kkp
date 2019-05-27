<?php
    //initials
    if(isset($datas)) {
        $bpp_id = isset($datas['bpp_id']) ? $datas['bpp_id'] : 0;
        $bahan  = isset($datas['bpp_bahan']) ? $datas['bpp_bahan'] : "";
        $qty    = isset($datas['bpp_qty']) ? $datas['bpp_qty'] : "";
        $kadar  = isset($datas['bpp_kadar']) ? $datas['bpp_kadar'] : "";
        $desc   = isset($datas['bpp_remark']) ? $datas['bpp_remark'] : "";
    } else {
        $bpp_id = isset($bpp_id) ? $bpp_id : 0;
        $bahan  = isset($bahan) ? $bahan : "";
        $qty    = isset($qty) ? $qty : "";
        $kadar  = isset($kadar) ? $kadar : "";
        $desc   = isset($desc) ? $desc : "";
    }

    if(isset($id_wo)) {
    	$id_wo  = isset($id_wo['WorkOrderId']) ? $id_wo['WorkOrderId'] : 0;
    }

    $class_disabled = "";

    if( $view_type == "view" ) {
        $class_disabled = "disabled='true'";
    } else {
        $class_disabled = "";
    }
    // echo $view_type;
    // print_r($id_wo);
?>
<div class="row">
    <div class="col-12">
        <?php 
            if( $this->session->flashdata('error_message') ) :
        ?>
        <div class="alert alert-danger"> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                <span aria-hidden="true">&times;</span> 
            </button>
            <?= $this->session->flashdata('error_message'); ?>
        </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?= $title_form; ?></h4>
                <form class="form-material m-t-40" action="<?= site_url('bpp/process_form'); ?>" method="POST">
                    <?php if($view_type != "view"): ?>
                    <input type="hidden" name="id_wo" value="<?= $id_wo; ?>">
                    <?php endif; ?>
                    <div class="form-group">
                        <label><span class="help">Bahan</span></label>
                        <input type="text" name="bahan" class="form-control form-control-line" <?= $class_disabled; ?> value="<?= $bahan; ?>" placeholder=""> 
                    </div>

                    <div class="form-group">
                        <label><span class="help">QTY</span></label>
                        <input type="number" name="qty" class="form-control form-control-line" <?= $class_disabled; ?> value="<?= $qty; ?>" placeholder=""> 
                    </div>

                    <div class="form-group">
                        <label><span class="help">Kadar Persen</span></label>
                        <input type="text" name="kadar" class="form-control form-control-line" <?= $class_disabled; ?> value="<?= $kadar; ?>" placeholder=""> 
                    </div>
                    <?php if($this->session->userdata('level') != 'QC'): ?>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control"  name="desc" rows="5" <?= $class_disabled; ?>><?= $desc; ?></textarea>
                    </div>
                    <?php endif; ?>

                    <hr>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <?php if( $view_type == "create" ) : ?>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                            <a class="btn btn-inverse" href="<?= site_url('work_order'); ?>">Cancel</a>
                                        <?php elseif($view_type == "view" && $this->session->userdata('level') == "QC" ): ?>
                                            <a href="javascript:void(0)" onclick="Approved(<?php echo $bpp_id; ?>)" class="btn btn-primary">
                                                <i class="fa fa-check"></i> Approved
                                            </a>
                                            <a href="javascript:void(0)" onclick="Rejected(<?php echo $bpp_id; ?>)" class="btn btn-info">
                                                <i class="fa fa-window-close"></i> Rejected
                                            </a>
                                            <a class="btn btn-inverse" href="<?= site_url('bpp'); ?>"><i class="fa fa-arrow-left"></i> Back</a>
                                        <?php else: ?>
                                            <a class="btn btn-inverse" href="<?= site_url('bpp'); ?>"><i class="fa fa-arrow-left"></i> Back</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"> </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>