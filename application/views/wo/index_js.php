<script type="text/javascript">
	function confirm_send_wo(id) {
	    swal({
	        title: "Konfirmasi ?",
	        text: "Wo akan dikirim pada bagian produksi",
	        type: "warning",
	        showCancelButton: true,
	        confirmButtonColor: "#DD6B55",
	        confirmButtonText: "Yes",
	        closeOnConfirm: false
	    }, function (isConfirm) {
	        if (!isConfirm) return;
	        // alert(id);
	        $.ajax({
	            url: "<?= site_url('work_order/sent_to_produksi'); ?>",
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