	</section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url(); ?>assets/material/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url(); ?>assets/material/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url(); ?>assets/material/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url(); ?>assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url(); ?>assets/material/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/sweetalert/sweetalert.min.js"></script>

    <script type="text/javascript">
    	$(document).ready(function() {
			var form = $("#loginform");
				url  = "<?= site_url('auth/proses_login'); ?>";

    		$(".button-login").on("click", function(e) {
				var	username = $("#username").val();
					password = $("#password").val();
    			// alert(username);
    			e.preventDefault();
    			$.ajax({
    				url: url,
    				type: "POST",
    				data: {
    					username: username,
    					password: password
    				},
    				dataType:"json",
    				success: function(response) {
    					var message = response['message'];

    					if( response['is_error'] == true ) {
    						swal("Oops!!",message, "error");
    					} else {
                            // swal({
                            //     title: "Wow!",
                            //     text: message,
                            //     type: "success"
                            // }, function() {
                            // });
                                location.href = response['redirect'];
    					}
    				}
    			});
    		});
    	});
    </script>
</body>
</html>