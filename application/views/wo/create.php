<?php
    //initials
    if(isset($datas)) {
        $id     = isset($datas['WorkOrderId']) ? $datas['WorkOrderId'] : "";
        $name   = isset($datas['WorkOrderName']) ? $datas['WorkOrderName'] : "";
        $batch   = isset($datas['WorkOrderNoBatch']) ? $datas['WorkOrderNoBatch'] : "";
        $qty    = isset($datas['WorkOrderQty']) ? $datas['WorkOrderQty'] : "";
        $kadar  = isset($datas['WorkOrderKadar']) ? $datas['WorkOrderKadar'] : "";
        $desc   = isset($datas['WorkOrderDescription']) ? $datas['WorkOrderDescription'] : "";
    } else {
        $id     = isset($id) ? $id : "";
        $name   = isset($name) ? $name : "";
        $batch   = isset($batch) ? $batch : "";
        $qty    = isset($qty) ? $qty : "";
        $kadar  = isset($kadar) ? $kadar : "";
        $desc   = isset($desc) ? $desc : "";
    }
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
                <form class="form-material m-t-40" action="<?= site_url('work_order/process_form'); ?>" method="POST">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <div class="form-group">
                        <label><span class="help">Nama WO</span></label>
                        <input type="text" name="nama" class="form-control form-control-line" value="<?= $name; ?>" placeholder=""> 
                    </div>

                    <div class="form-group">
                        <label><span class="help">No Batch</span></label>
                        <input type="text" name="batch" class="form-control form-control-line" value="<?= $batch; ?>" placeholder=""> 
                    </div>

                    <div class="form-group">
                        <label><span class="help">QTY</span></label>
                        <input type="number" name="qty" class="form-control form-control-line" value="<?= $qty; ?>" placeholder=""> 
                    </div>

                    <div class="form-group">
                        <label><span class="help">Kadar Persen</span></label>
                        <input type="text" name="kadar" class="form-control form-control-line" value="<?= $kadar; ?>" placeholder=""> 
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control"  name="desc" rows="5"><?= $desc; ?></textarea>
                    </div>
                    
                    <hr>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <a class="btn btn-inverse" href="<?= site_url('work_order'); ?>">Cancel</a>
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