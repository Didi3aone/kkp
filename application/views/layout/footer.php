
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © 2019 PT.INDAROMA</footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url(); ?>assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?= base_url(); ?>assets/material/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url(); ?>assets/material/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url(); ?>assets/material/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?= base_url(); ?>assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    
    <!--Custom JavaScript -->
    <script src="<?= base_url(); ?>assets/material/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="<?= base_url(); ?>assets/plugins/moment/moment.js"></script>
    <!--c3 JavaScript -->
    <script src="<?= base_url(); ?>assets/plugins/d3/d3.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/c3-master/c3.min.js"></script>
     <!-- Date Picker Plugin JavaScript -->
    <script src="<?= base_url(); ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Chart JS -->
    <script src="<?= base_url(); ?>assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- add other plugins -->
    <?php 
        if(isset($script)) {
            if( is_array($script) ) {

                foreach($script as $val)
                {
                    echo "<script src=".base_url($val)."></script>";
                }
            } else {
                echo "<script src=".base_url($script)."></script>";
            }
        }
    ?>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?= base_url(); ?>assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script type="text/javascript">
        <?php 
            $error   = $this->session->flashdata("error_message");
            $success = $this->session->flashdata("success_message");

            if( $this->session->flashdata("error_message") ) { ?>
                var error = "<?= $this->session->flashdata("error_message"); ?>";
                swal("Error !!!", error ,"error"); <?php
            }

            if( $success ) { ?>
                var success = "<?= $this->session->flashdata("success_message"); ?>";
                swal("Sukses !!!", success ,"success"); <?php
            }
        ?>
    </script>
    <?php 
        if(isset($script_bottom)) {
            foreach ($script_bottom as $value) {
                // print_r($value);
                $this->load->view($value);
            }
            // $this->load->view($script_bottom);
        }
    ?>
</body>

</html>