<script type="text/javascript">
    $( function() {
        $( ".datepicker" ).datepicker({
            dateFormat: 'yy-mm-dd', 
            orientation: "bottom auto",
            autoclose: true,
            todayHighlight: true
        });
    });

    $('#submit').click(function() {
        var start = $("#start").val();
        var end = $("#end").val();

        if( start == '' && end == '') {
            alert('Silahkan input tanggal terlebih dahulu');
            return false;
        }
    })
</script>