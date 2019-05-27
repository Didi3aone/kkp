<script type="text/javascript">
	function confirm_send_qc(id) {
	    swal({
	        title: "Kirim barang produksi",
	        text: "Produksi akan dikirim ke QC !!!",
	        type: "warning",
	        showCancelButton: true,
	        confirmButtonColor: "#DD6B55",
	        confirmButtonText: "Yes",
	        closeOnConfirm: false
	    }, function (isConfirm) {
	        if (!isConfirm) return;
	        // alert(id);
	        $.ajax({
	            url: "<?= site_url('bpp/sent_to_qc'); ?>",
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
						       location.reload();
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

	function confirm_bpp(id) {
	    swal({
	        title: "Konfirmasi BPP",
	        text: "Barang siap dikirim ke bagian produksi",
	        type: "warning",
	        showCancelButton: true,
	        confirmButtonColor: "#DD6B55",
	        confirmButtonText: "Yes",
	        closeOnConfirm: false
	    }, function (isConfirm) {
	        if (!isConfirm) return;
	        // alert(id);
	        $.ajax({
	            url: "<?= site_url('bpp/process_bpp'); ?>",
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
						       location.reload();
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