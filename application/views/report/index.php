<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Reporting </h4>
                <form action="<?php echo site_url('report/export'); ?>" method="get" target="_blank">
                    <div class="row form-material">
                        <div class="col-md-4">
                            <label class="m-t-20">Start Date</label>
                            <input type="date" name="start" class="form-control"  id="start">               
                        </div>

                        <div class="col-md-4">
                            <label class="m-t-20">End Date</label>
                            <input type="date" name="end" class="form-control"  id="end">                      
                        </div>
                    </div>
                    <div style="margin-top: 60px;">
                        <button class="btn btn-primary" type="submit" value="submit" id="submit"> Export</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

