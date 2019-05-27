<script type="text/javascript">
	function Approved(id) {
	    swal({
	        title: "Konfirmasi !!",
	        text: "Produk akan di approve",
	        type: "warning",
	        showCancelButton: true,
	        confirmButtonColor: "#DD6B55",
	        confirmButtonText: "Yes",
	        closeOnConfirm: false
	    }, function (isConfirm) {
	        if (!isConfirm) return;
	        // alert(id);
	        $.ajax({
	            url: "<?= site_url('bpp/approved_qc'); ?>",
	            type: "POST",
	            data: {
	                id: id
	            },
	            dataType: "json",
	            success: function (response) {
	            	var message = response['message'];

	                if(response['is_error'] == true) {
	                	swal("Error send!", message, "error");
	                } else {
	                	swal({title: "Good job", text: message, type: "success"},
						   	function(){ 
						       location.href = "<?= site_url('bpp'); ?>";
						   	}
						);
	                }
	            },
	            error: function (xhr, ajaxOptions, thrownError) {
	                swal("Error send!", "Please try again", "error");
	            }
	        });
	    });
	}

	function Rejected(id) {
	    swal({
	        title: "Konfirmasi",
	        text: "Produk akan di reject ?",
	        type: "warning",
	        showCancelButton: true,
	        confirmButtonColor: "#DD6B55",
	        confirmButtonText: "Yes",
	        closeOnConfirm: false
	    }, function (isConfirm) {
	        if (!isConfirm) return;
	        // alert(id);
	        $.ajax({
	            url: "<?= site_url('bpp/rejected_qc'); ?>",
	            type: "POST",
	            data: {
	                id: id
	            },
	            dataType: "json",
	            success: function (response) {
	            	var message = response['message'];

	                if(response['is_error'] == true) {
	                	swal("Error send!", message, "error");
	                } else {
	                	swal({title: "Sukses", text: message, type: "success"},
						   	function(){ 
						       window.location.href = "<?= site_url('bpp'); ?>";
						   	}
						);
	                }
	            },
	            error: function (xhr, ajaxOptions, thrownError) {
	                swal("Error send!", "Please try again", "error");
	            }
	        });
	    });
	}
</script>