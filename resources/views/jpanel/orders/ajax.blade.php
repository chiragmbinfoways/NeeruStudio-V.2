<script>
  
    $(function() {        
        $('.select2').select2()

        // $('.addRow').click(function() {
        //     var add =
        //         '  <div class="tableAppend"><table class="table" id="item"><thead class="bg-dark"><tr class="item"><th scope="col-md-3">Item</th><th scope="col-md-3">Rate (₹)</th><th scope="col-md-2">Quantity(nos)</th><th scope="col-md-3">Total Amount (₹)</th><th scope="col-md-1">Action</th></tr></thead><tbody><div><tr><td class="col-md-3"><select class="form-control select2 itemName " name="itemname[]"id="selectItem"><option selected disable hidden value="Select Customer">Select Item</option><option value="blowse">Blowse</option><option value="kurti">Kurti</option><option value="kurti">Anarkali</option><option value="kurti">Gaun</option><option value="pant">Pant</option><option value="pant">Salwar</option><option value="pant">Plazo</option><option value="petticoat">Petticoat</option></select></td> <td class="col-md-3"><input type="text" class="form-control form-control-sm price  " aria-label="Small" name="price[]" required placeholder="Rate per unit" aria-describedby="inputGroup-sizing-sm" onkeyup="getTotal()" id="ppu"></td> <td class="col-md-2"> <input type="number" class="form-control form-control-sm  qty" aria-label="Small" min="1" max="100" required name="qty[]" onchange="getTotal()" placeholder="Quantity" aria-describedby="inputGroup-sizing-sm" id="quantity"> </td> <td class="col-md-3"><input type="text" class="form-control form-control-sm  itemTotal"aria-label="Small" required name="item_total[]" readonlyplaceholder="Item Total" aria-describedby="inputGroup-sizing-sm"></td><td class="col-md-1"><button type="button" class="form-control form-control-sm"id="delete" aria-label="Small" placeholder="Total Amount"aria-describedby="inputGroup-sizing-sm"><iclass="fas fa-trash"></i></button></td></tr></div></tbody></table><div class="measurement pl-3 mt-3 mb-3"><div id="blowse" class="hideBox" ><div class="form-row"><div class="col-md-3 mb-3"><label for="name">Shoulder (ખભો)</label><input type="text" class="form-control form-control-sm " id="Shoulder"name="b_shoulder" placeholder="Enter Shoulder" value=""></div><div class="col-md-3 mb-3"><label for="name">Length (લંબાઈ)</label><input type="text" class="form-control form-control-sm " id="length"name="b_length" placeholder="Enter Length" value=""></div><div class="col-md-3 mb-3"><label for="name">Chest (છાતી)</label><input type="text" class="form-control form-control-sm " id="chest"name="b_chest" placeholder="Enter Chest" value=""></div></div><div class="form-row"><div class="col-md-3 mb-3"><label for="name">Waist (કમર)</label><input type="text" class="form-control form-control-sm " id="chest"name="b_waist" placeholder="Enter Waist" value=""></div><div class="col-md-3 mb-3"><label for="name">Chest Up (છાતી અપ)</label><input type="text" class="form-control form-control-sm " id="chest"name="b_chest_up" placeholder="Enter Chest Up" value=""></div><div class="col-md-3 mb-3"><label for="name">Sleeves (બાંય)</label><input type="text" class="form-control form-control-sm" id="sleeves"name="b_Sleeves" placeholder="Enter Front" value=""></div></div><div class="form-row"><div class="col-md-3 mb-3"><label for="name">Mori (મોરી)</label><input type="text" class="form-control form-control-sm" id="mori"name="b_mori" placeholder="Enter Mori" value=""></div><div class="col-md-3 mb-3"><label for="name">Mundo (મુંડો)</label><input type="text" class="form-control form-control-sm" id="mundo"name="b_mundo" placeholder="Enter Mundo" value=""></div><div class="col-md-3 mb-3"><label for="name">Magismory(મેગીયસમોરી)</label><input type="text" class="form-control form-control-sm " id="length"name="b_magismory" placeholder="Enter Length" value=""></div></div><div class="form-row"><div class="col-md-3 mb-3"><label for="name">Front Neck (ગળું આ)</label><input type="text" class="form-control form-control-sm " id="frontNeck"name="b_front_neck" placeholder="Enter Front" value=""></div><div class="col-md-3 mb-3"><label for="name">Back Neck (ગળું પા)</label><input type="text" class="form-control form-control-sm " id="backNeck"name="b_back_neck" placeholder="Enter Back" value=""></div><div class="col-md-3 mb-3"><label for="name">Other(અન્ય)</label><input type="text" class="form-control form-control-sm " id="other"name="b_other" placeholder="Enter other measurement" value=""></div></div><div class="form-row"><div class="col-md-3 mb-3"><label for="name">Huk :</label><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="huk" required id="huk" value="1"><label class="form-check-label" for="inlineRadio1">Front </label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" required name="huk" id="huk" value="0"><label class="form-check-label" for="inlineRadio2">Back</label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" required name="huk" id="huk" value="3"><label class="form-check-label" for="inlineRadio2">No</label></div></div><div class="col-md-3 mb-3"><label for="name">Pad :</label><div class="form-check form-check-inline"><input class="form-check-input" type="radio" requiredname="pad" id="pad" value="1"><label class="form-check-label" for="inlineRadio1">Yes </label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" requiredname="pad" id="pad" value="0"><label class="form-check-label" for="inlineRadio2">No</label></div></div><div class="col-md-3 mb-3"><label for="name">Sample :</label><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="sample"required id="sample" value="1"><label class="form-check-label" for="inlineRadio1">Yes </label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="sample"required id="sample" value="0"><label class="form-check-label" for="inlineRadio2">No</label></div></div><div class="col-md-3 mb-3"><label for="name">Design :</label><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="design"required id="design" value="1"><label class="form-check-label" for="inlineRadio1">Yes </label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="design"required id="design" value="0"><label class="form-check-label" for="inlineRadio2">No</label></div></div></div></div><div id="kurti" ><div class="form-row"><div class="col-md-3 mb-3"><label for="name">Shoulder (ખભો)</label><input type="text"class="form-control form-control-sm "id="k_shoulder" name="k_shoulder" placeholder="Enter Shoulder"value=""></div><div class="col-md-3 mb-3"><label for="name">Length (લંબાઈ)</label><input type="text"class="form-control form-control-sm "id="k_length" name="k_length" placeholder="Enter Length"value=""></div><div class="col-md-3 mb-3"><label for="name">Chest (છાતી)</label><input type="text"class="form-control form-control-sm "id="k_chest" name="k_chest" placeholder="Enter Chest"value=""></div></div><div class="form-row"><div class="col-md-3 mb-3"><label for="name">Waist (કમર)</label><input type="text"class="form-control form-control-sm"id="k_waist" name="k_waist" placeholder="Enter Waist"value=""></div><div class="col-md-3 mb-3"><label for="name">Chest Up (છાતી અપ)</label><input type="text"class="form-control form-control-sm"id="k_chest_up" name="k_chest_up" placeholder="Enter Chest Up"value=""></div><div class="col-md-3 mb-3"><label for="name">Sleeves (બાંય)</label><input type="text"class="form-control form-control-sm "id="k_Sleeves" name="k_Sleeves" placeholder="Enter Front"value=""></div></div><div class="form-row"><div class="col-md-3 mb-3"><label for="name">Mori (મોરી)</label><input type="text"class="form-control form-control-sm "id="k_mori" name="k_mori" placeholder="Enter Mori"value=""></div><div class="col-md-3 mb-3"><label for="name">Mundo (મુંડો)</label><input type="text"class="form-control form-control-sm "id="k_mundo" name="k_mundo" placeholder="Enter Mundo"value=""></div><div class="col-md-3 mb-3"><label for="name">Magismory(મેગીયસમોરી)</label><input type="text"class="form-control form-control-sm "id="k_magismory" name="k_magismory" placeholder="Enter Magismory"value=""></div></div><div class="form-row"><div class="col-md-3 mb-3"><label for="name">Front Neck (ગળું આ)</label><input type="text"class="form-control form-control-sm "id="k_front_neck" name="k_front_neck" placeholder="Enter Front"value=""></div><div class="col-md-3 mb-3"><label for="name">Back Neck (ગળું પા)</label><input type="text"class="form-control form-control-sm "id="k_back_neck" name="k_back_neck" placeholder="Enter Back"value=""></div><div class="col-md-3 mb-3"><label for="name">Full Length(સંપૂર્ણ લંબાઈ)</label><input type="text"class="form-control form-control-sm "id="k_full_length" name="k_full_length" placeholder="Enter Full Length"value=""></div></div><div class="form-row"><div class="col-md-3 mb-3"><label for="name">Kotho (કોઠો)</label><input type="text"class="form-control form-control-sm "id="k_kotho" name="k_kotho" placeholder="Enter Kotho"value=""></div><div class="col-md-3 mb-3"><label for="name">Other(અન્ય)</label><input type="text"class="form-control form-control-sm "id="k_other" name="k_other" placeholder="Enter other measurement"value=""></div></div><div class="form-row"><div class="col-md-3 mb-3"><label for="name">Huk :</label><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="huk" required id="huk" value="1"><label class="form-check-label" for="inlineRadio1">Front </label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" required name="huk" id="huk" value="0"><label class="form-check-label" for="inlineRadio2">Back</label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" required name="huk" id="huk" value="3"><label class="form-check-label" for="inlineRadio2">No</label></div></div><div class="col-md-3 mb-3"><label for="name">Pad :</label><div class="form-check form-check-inline"><input class="form-check-input" type="radio" requiredname="pad" id="pad" value="1"><label class="form-check-label" for="inlineRadio1">Yes </label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" requiredname="pad" id="pad" value="0"><label class="form-check-label" for="inlineRadio2">No</label></div></div><div class="col-md-3 mb-3"><label for="name">Sample :</label><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="sample"required id="sample" value="1"><label class="form-check-label" for="inlineRadio1">Yes </label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="sample"required id="sample" value="0"><label class="form-check-label" for="inlineRadio2">No</label></div></div><div class="col-md-3 mb-3"><label for="name">Design :</label><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="design"required id="design" value="1"><label class="form-check-label" for="inlineRadio1">Yes </label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="design"required id="design" value="0"><label class="form-check-label" for="inlineRadio2">No</label></div></div></div></div><div id="pant" ><div class="form-row"><div class="col-md-3 mb-3"><label for="name">Length (લંબાઈ)</label><input type="text"class="form-control form-control-sm"id="length" name="p_length" placeholder="Enter Length"value=""></div><div class="col-md-3 mb-3"><label for="name">Mori (મોરી)</label><input type="text"class="form-control form-control-sm "id="mori" name="p_mori" placeholder="Enter Mori"value=""></div><div class="col-md-3 mb-3"><label for="name">Nefo (નેફો)</label><input type="text"class="form-control form-control-sm "id="nafo" name="p_nefo" placeholder="Enter Nefo"value=""></div></div><div class="form-row"><div class="col-md-3 mb-3"><label for="name">seat (સીટ)</label><input type="text"class="form-control form-control-sm "id="seat" name="p_seat" placeholder="Enter seat"value=""></div><div class="col-md-3 mb-3"><label for="name">Thai (થાઈ)</label><input type="text"class="form-control form-control-sm"id="thai" name="p_thai" placeholder="Enter thai"value=""></div><div class="col-md-3 mb-3"><label for="name">Knee (ઘૂટણ)</label><input type="text"class="form-control form-control-sm "id="knee" name="p_knee" placeholder="Enter knee"value=""></div></div><div class="form-row"><div class="col-md-3 mb-3"><label for="name">Other(અન્ય)</label><input type="text"class="form-control form-control-sm "id="other" name="p_other" placeholder="Enter other measurement"value=""></div></div><div class="form-row"><div class="col-md-3 mb-3"><label for="name">Huk :</label><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="huk" required id="huk" value="1"><label class="form-check-label" for="inlineRadio1">Front </label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" required name="huk" id="huk" value="0"><label class="form-check-label" for="inlineRadio2">Back</label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" required name="huk" id="huk" value="3"><label class="form-check-label" for="inlineRadio2">No</label></div></div><div class="col-md-3 mb-3"><label for="name">Pad :</label><div class="form-check form-check-inline"><input class="form-check-input" type="radio" requiredname="pad" id="pad" value="1"><label class="form-check-label" for="inlineRadio1">Yes </label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" requiredname="pad" id="pad" value="0"><label class="form-check-label" for="inlineRadio2">No</label></div></div><div class="col-md-3 mb-3"><label for="name">Sample :</label><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="sample"required id="sample" value="1"><label class="form-check-label" for="inlineRadio1">Yes </label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="sample"required id="sample" value="0"><label class="form-check-label" for="inlineRadio2">No</label></div></div><div class="col-md-3 mb-3"><label for="name">Design :</label><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="design"required id="design" value="1"><label class="form-check-label" for="inlineRadio1">Yes </label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="design"required id="design" value="0"><label class="form-check-label" for="inlineRadio2">No</label></div></div></div></div><div id="Petticoat" ><div class="form-row"><div class="col-md-3 mb-3"><label for="name">Length (લંબાઈ)</label><input type="text"class="form-control form-control-sm"id="length" name="pe_length" placeholder="Enter Length"value=""></div><div class="col-md-3 mb-3"><label for="name">Nefo (નેફો)</label><input type="text"class="form-control form-control-sm "id="nafo" name="pe_nefo" placeholder="Enter Nefo"value=""></div><div class="col-md-3 mb-3"><label for="name">seat (સીટ)</label><input type="text"class="form-control form-control-sm "id="seat" name="pe_seat" placeholder="Enter seat"value=""></div></div><div class="form-row"><div class="col-md-3 mb-3"><label for="name">Gher (ઘેર)</label><input type="text"class="form-control form-control-sm "id="gher" name="pe_gher" placeholder="Enter Gher"value=""></div><div class="col-md-3 mb-3"><label for="name">Type of (પ્રકાર)</label><input type="text"class="form-control form-control-sm "id="kadi" name="pe_typeof" placeholder="Enter Kali"value=""></div><div class="col-md-3 mb-3"><label for="name">other (અન્ય)</label><input type="text"class="form-control form-control-sm "id="kadi" name="pe_other"placeholder="Enter Oher Measurement"value=""></div></div><div class="form-row"><div class="col-md-3 mb-3"><label for="name">Huk :</label><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="huk" required id="huk" value="1"><label class="form-check-label" for="inlineRadio1">Front </label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" required name="huk" id="huk" value="0"><label class="form-check-label" for="inlineRadio2">Back</label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" required name="huk" id="huk" value="3"><label class="form-check-label" for="inlineRadio2">No</label></div></div><div class="col-md-3 mb-3"><label for="name">Pad :</label><div class="form-check form-check-inline"><input class="form-check-input" type="radio" requiredname="pad" id="pad" value="1"><label class="form-check-label" for="inlineRadio1">Yes </label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" requiredname="pad" id="pad" value="0"><label class="form-check-label" for="inlineRadio2">No</label></div></div><div class="col-md-3 mb-3"><label for="name">Sample :</label><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="sample"required id="sample" value="1"><label class="form-check-label" for="inlineRadio1">Yes </label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="sample"required id="sample" value="0"><label class="form-check-label" for="inlineRadio2">No</label></div></div><div class="col-md-3 mb-3"><label for="name">Design :</label><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="design"required id="design" value="1"><label class="form-check-label" for="inlineRadio1">Yes </label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="design"required id="design" value="0"><label class="form-check-label" for="inlineRadio2">No</label></div></div></div></div></div></div>';
        //     $("#try").append(add);
        // });

        $("#item").on('click', '#delete', function(e) {
            // e.preventDefault();
            $(this).closest("tr").remove();
            getTotal();
            calculate();
        });


            //  Function for select 
            $('#blowse').hide();
            $('#kurti').hide();
            $('#pant').hide();
            $('#Petticoat').hide();
            $('#selectItem').on('change', function() {
            getTotal();
            calculate();
            if (this.value == "blowse") {
                $('#blowse').show();
                $('#kurti').hide();
                $('#pant').hide();
                $('#Petticoat').hide();
            }
            if (this.value == "kurti") {
                $('#kurti').show();
                $('#blowse').hide();
                $('#pant').hide();
                $('#Petticoat').hide();
            }
            if (this.value == "pant") {
                $('#pant').show();
                $('#blowse').hide();
                $('#kurti').hide();
                $('#Petticoat').hide();
            }
            if (this.value == "petticoat") {
                $('#Petticoat').show();
                $('#blowse').hide();
                $('#kurti').hide();
                $('#pant').hide();
            }
            });

        $(document).on('change', "[name='orderByName']", function() {
            var id = $(this).val();
            var url = "{{ route('fetchDetails.order', ':id') }}";
            url = url.replace(':id', id);
            $.get(url, function(data) {
                $("[name='cName']").val(data.customer_name);
                $("[name='phone']").val(data.number);
                $("[name='adress']").val(data.address1 + " " + data.address2 + " " +
                    data.city + " " + data.state + " " + data.country);
                $("[name='pincode']").val(data.zipcode);
                document.getElementById('orderDate').valueAsDate = new Date();
                $('select[id=numberDisable]').attr("disabled", "disabled"); 

            })
        });

        $(document).on('change', "[name='orderBynumber']", function() {
            var id = $(this).val();
            var url = "{{ route('fetchDetails.order', ':id') }}";
            url = url.replace(':id', id);
            $.get(url, function(data) {
                $("[name='cName']").val(data.customer_name);
                $("[name='phone']").val(data.number);
                $("[name='adress']").val(data.address1 + " " + data.address2 + " " +
                    data.city + " " + data.state + " " + data.country);
                $("[name='pincode']").val(data.zipcode);
                document.getElementById('orderDate').valueAsDate = new Date();
                $('select[id=nameDisable]').attr("disabled", "disabled");   
             })
        });
        
        $(".orderStatus").on('change.bootstrapSwitch', function(e) {
            let status = $(this).prop('checked') == true ? 1 : 0;
            let id = $(this).data('id');
            $.ajax({
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                type: "POST",
                dataType: "json",
                url: '{{ route('status.change.order') }}',
                data: {
                    'status': status,
                    'id': id
                },
                success: function(data) {
                    if (data.status == "success") {
                        var selector = ".flash-message .messageArea";
                        var message_status = "success";
                        var message_data = "Payment status has been changed successfully!";
                        alertMessage(selector, message_status, message_data);
                    }
                }
            });
        })

        $(".delivery_Status").on('change.bootstrapSwitch', function(e) {
            let status = $(this).prop('checked') == true ? 1 : 0;
            let id = $(this).data('id');
            $.ajax({
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                type: "POST",
                dataType: "json",
                url: '{{ route('deliverystatus.change.order') }}',
                data: {
                    'delivery_status': status,
                    'id': id
                },
                success: function(data) {
                    if (data.status == "success") {
                        var selector = ".flash-message .messageArea";
                        var message_status = "success";
                        var message_data = "delivery status has been changed successfully!";
                        alertMessage(selector, message_status, message_data);
                    }
                }
            });
        })
        $(".task_Status").on('change.bootstrapSwitch', function(e) {
            let status = $(this).prop('checked') == true ? 1 : 0;
            let id = $(this).data('id');
        
            $.ajax({
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                type: "POST",
                dataType: "json",
                url: '{{ route('taskstatus.change.order') }}',
                data: {
                    'status': status,
                    'id': id,
                    
                },
                success: function(data) {
                    if (data.status == "success") {
                        var selector = ".flash-message .messageArea";
                        var message_status = "success";
                        var message_data = "task status has been changed successfully!";
                        alertMessage(selector, message_status, message_data);
                    }
                }
            });
        })

        $(".itemStatus").on('change', function(e) {
            let status = $(this).val();
            let id = $(this).data('id');
            let user = status;
            alert(user);
            $.ajax({
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                type: "POST",
                dataType: "json",
                url: '{{ route('measurement.item.change') }}',
                data: {
                    'status': status,
                    'id': id,
                    'user_id':user
                },
                success: function(data) {
                    if (data.status == "success") {
                        var selector = ".flash-message .messageArea";
                        var message_status = "success";
                        var message_data = "Product status has been changed successfully!";
                        alertMessage(selector, message_status, message_data);
                    }
                }
            });
        })

        

        $(".delete").on('click', function(e) {
            e.preventDefault();

            let order_id = $(this).data('id');

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
                        url: '{{ route('order.delete') }}',
                        data: {
                            'id': order_id
                        },
                        success: function(data) {
                            if (data.status == "success") {
                                var selector = ".flash-message .messageArea";
                                var message_status = "success";
                                var message_data =
                                    "order has been deleted successfully!";
                                alertMessage(selector, message_status,
                                    message_data);
                                $('.dataRow' + order_id).hide();
                            }
                        }
                    });
                }
            });
        });

        $(document).on('change', "[name='blowseCheck']", function() {
            var id = $(this).val();
            $.ajax({
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                type: "POST",
                dataType: "json",
                url: '{{ route('blowse.measurement') }}',
                data: {
                    'id': id,
                },
                success: function(data) {
                    // console.log(data);
                   $.each(data[0],function(key,value){
                    // console.log(key);
                    $("#"+key).val(value);
                   });
                }
            });
        });

        $("#orderDataTable").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#orderDataTable_wrapper .col-md-6:eq(0)');
    });
//  -------------------------------------------------independent functions-------------------------------------------------

    function getTotal() {
        var gt = 0;
        var quantity = document.getElementsByClassName('qty');
        var rowname = document.getElementsByClassName('itemName');
        var price = document.getElementsByClassName('price');
        var total = document.getElementsByClassName('itemTotal');
        var grandTotal = document.getElementById('grandTotal');
        var advance = document.getElementById('advance');
        var pending = document.getElementById('pending');
        for (i = 0; i < price.length; i++) {
            total[i].value = (price[i].value) * (quantity[i].value);
            gt = gt + (price[i].value) * (quantity[i].value);
        }
        grandTotal.value = gt;
        pending.value = grandTotal.value - advance.value;
    }

    function calculate() {
        var grandTotal = document.getElementById('grandTotal');
        var advance = document.getElementById('advance');
        var pending = document.getElementById('pending');

        if (advance.value > grandTotal.value) {
            pending.value = "0";
        } else {
            var remaining = (grandTotal.value) - (advance.value);
            pending.value = remaining;
        }

    }

</script>
