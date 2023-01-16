<script>
    $(function() {

        // DATA TABLE
        $("#vendorDataTable").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#vendorDataTable_wrapper .col-md-6:eq(0)');

        //STATUS SWITCH ON CHANGE EVENT
        $(".vendorStatus").on('change.bootstrapSwitch', function(e) {
            let status = $(this).prop('checked') == true ? 1 : 0;
            let vendor_id = $(this).data('id');
            $.ajax({
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                type: "POST",
                dataType: "json",
                url: '{{ route('status.change.vendor') }}',
                data: {
                    'status': status,
                    'vendor_id': vendor_id
                },
                success: function(data) {
                    if (data.status == "success") {
                        var selector = ".flash-message .messageArea";
                        var message_status = "success";
                        var message_data = "Vendor status has been changed successfully!";
                        alertMessage(selector, message_status, message_data);
                    }
                }
            });
        })

        //DELETE Vendor
        $(".delete").on('click', function(e){
            e.preventDefault();
            let vendor_id = $(this).data('id');
            swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                    type: "POST",
                    dataType: "json",
                    url: '{{route("vendor.delete")}}',
                    data: {'vendor_id': vendor_id},
                    success: function(data){
                        if(data.status=="success"){
                            var selector=".flash-message .messageArea";
                            var message_status="success";
                            var message_data="Vendor has been deleted successfully!";
                            alertMessage(selector,message_status,message_data);
                            $('.dataRow'+vendor_id).hide();
                        }
                    }
                });
            }
          });
        })
    });
</script>
