<script>
    $(function() {   
        $('.select2').select2()
        var i=0; 
        form(i);

            // Add row in table 
        $('.addRow').click(function(){
            i=i+1;
            form(i);
        });

        // Delete in add order page 
        $("#item").on('click', '#delete', function() {
           var delete_id =  $(this).closest("#delete").val();
            $(this).closest("#table").remove();
            $('#measurement'+delete_id).remove();
            getTotal();
            calculate();
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
    // Add form in order page 
    function form(i) {
            var form = '<table class="table" id="table" > <thead class="bg-dark"> <tr class="item"> <th class="col-md-3">Item</th> <th class="col-md-3">Rate (₹)</th> <th class="col-md-2">Quantity(nos)</th> <th class="col-md-3">Total Amount (₹)</th> <th class="col-md-1">Action</th> </tr> </thead> </thead> <tbody> <tr> <td class="col-md-3"> <select class="form-control select2 itemName " onchange="select('+i+',this.value)" name="itemname[]" required id="selectItem'+ i +'" > <option selected disabled hidden value="Select Customer">Select Item </option> <option value="blowse">Blowse</option> <option value="kurti">Kurti</option> <option value="kurti">Anarkali</option> <option value="kurti">Gaun</option> <option value="pant">Pant</option> <option value="pant">Salwar</option> <option value="pant">Plazo</option> <option value="petticoat">Petticoat</option> </select> </td> <td class="col-md-3"><input type="text" class="form-control form-control-sm price  " aria-label="Small" name="price[]" required placeholder="Rate per unit" aria-describedby="inputGroup-sizing-sm" onkeyup="getTotal()" id="ppu"></td>  <td class="col-md-3 d-none"><input type="text" class="form-control form-control-sm index  " aria-label="Small" name="index[]" required placeholder="Rate per unit" aria-describedby="inputGroup-sizing-sm" value="'+ i +'"  id="ppu"></td> <td class="col-md-2"> <input type="number" class="form-control form-control-sm  qty" aria-label="Small" min="1" max="100" required name="qty[]" onchange="getTotal()" placeholder="Quantity" aria-describedby="inputGroup-sizing-sm" id="quantity"> </td> <td class="col-md-3"> <input type="text" class="form-control form-control-sm  itemTotal" aria-label="Small" required name="item_total[]" readonly placeholder="Item Total" aria-describedby="inputGroup-sizing-sm"> </td> <td class="col-md-1"> <button type="button" value="'+ i +'" class="form-control form-control-sm" id="delete" aria-label="Small" placeholder="Total Amount" aria-describedby="inputGroup-sizing-sm"><i class="fas fa-trash"></i></button> </td> </tr> </tbody> </table> <div class="ml-3" id="measurement'+ i +'"> </div> '
        $("#item").append(form);
        }
     // blowse measurement 
    function blowse(index) {
            var blowse = ' <div id="blowse"><div class="form-row"><div class="col-md-3 mb-3"><label for="name">Shoulder (ખભો)</label><input type="text" class="form-control form-control-sm "    id="Shoulder" name="b_shoulder'+ index +'" placeholder="Enter Shoulder"    value=""></div><div class="col-md-3 mb-3"><label for="name">Length (લંબાઈ)</label><input type="text" class="form-control form-control-sm "    id="length" name="b_length'+ index +'" placeholder="Enter Length"    value=""></div><div class="col-md-3 mb-3"><label for="name">Chest (છાતી)</label><input type="text" class="form-control form-control-sm "    id="chest" name="b_chest'+ index +'" placeholder="Enter Chest"    value=""></div></div><div class="form-row"><div class="col-md-3 mb-3"><label for="name">Waist (કમર)</label><input type="text" class="form-control form-control-sm "    id="chest" name="b_waist'+ index +'" placeholder="Enter Waist"    value=""></div><div class="col-md-3 mb-3"><label for="name">Chest Up (છાતી અપ)</label><input type="text" class="form-control form-control-sm "    id="chest" name="b_chest_up'+ index +'" placeholder="Enter Chest Up"    value=""></div><div class="col-md-3 mb-3"><label for="name">Sleeves (બાંય)</label><input type="text" class="form-control form-control-sm" id="sleeves"    name="b_Sleeves'+ index +'" placeholder="Enter Front" value=""></div></div><div class="form-row"><div class="col-md-3 mb-3"><label for="name">Mori (મોરી)</label><input type="text" class="form-control form-control-sm" id="mori"    name="b_mori'+ index +'" placeholder="Enter Mori" value=""></div><div class="col-md-3 mb-3"><label for="name">Mundo (મુંડો)</label><input type="text" class="form-control form-control-sm" id="mundo"    name="b_mundo'+ index +'" placeholder="Enter Mundo" value=""></div><div class="col-md-3 mb-3"><label for="name">Magismory(મેગીયસમોરી)</label><input type="text" class="form-control form-control-sm "    id="length" name="b_magismory'+ index +'" placeholder="Enter Length"    value=""></div></div><div class="form-row"><div class="col-md-3 mb-3"><label for="name">Front Neck (ગળું આ)</label><input type="text" class="form-control form-control-sm "    id="frontNeck" name="b_front_neck'+ index +'" placeholder="Enter Front"    value=""></div><div class="col-md-3 mb-3"><label for="name">Back Neck (ગળું પા)</label><input type="text" class="form-control form-control-sm "    id="backNeck" name="b_back_neck'+ index +'" placeholder="Enter Back"    value=""></div><div class="col-md-3 mb-3"><label for="name">Other(અન્ય)</label><input type="text" class="form-control form-control-sm "    id="other" name="b_other'+ index +'" placeholder="Enter other measurement"    value=""></div></div><div class="form-row"><div class="col-md-3 mb-3"><label for="name">Huk :</label><div class="form-check form-check-inline">    <input class="form-check-input" type="radio" name="huk'+ index +'"        required id="huk" value="1">    <label class="form-check-label" for="inlineRadio1">Front </label></div><div class="form-check form-check-inline">    <input class="form-check-input" type="radio" required        name="huk'+ index +'" id="huk" value="0">    <label class="form-check-label" for="inlineRadio2">Back</label></div><div class="form-check form-check-inline">    <input class="form-check-input" type="radio" required        name="huk'+ index +'" id="huk" value="3">    <label class="form-check-label" for="inlineRadio2">No</label></div></div><div class="col-md-3 mb-3"><label for="name">Pad :</label><div class="form-check form-check-inline">    <input class="form-check-input" type="radio" required        name="pad'+ index +'" id="pad" value="1">    <label class="form-check-label" for="inlineRadio1">Yes </label></div><div class="form-check form-check-inline">    <input class="form-check-input" type="radio" required        name="pad'+ index +'" id="pad" value="0">    <label class="form-check-label" for="inlineRadio2">No</label></div></div><div class="col-md-3 mb-3"><label for="name">Sample :</label><div class="form-check form-check-inline">    <input class="form-check-input" type="radio" name="sample'+ index +'"        required id="sample" value="1">    <label class="form-check-label" for="inlineRadio1">Yes </label></div><div class="form-check form-check-inline">    <input class="form-check-input" type="radio" name="sample'+ index +'"        required id="sample" value="0">    <label class="form-check-label" for="inlineRadio2">No</label></div></div><div class="col-md-3 mb-3"><label for="name">Design :</label><div class="form-check form-check-inline">    <input class="form-check-input" type="radio" name="design'+ index +'"        required id="design" value="1">    <label class="form-check-label" for="inlineRadio1">Yes </label></div><div class="form-check form-check-inline">    <input class="form-check-input" type="radio" name="design'+ index +'"        required id="design" value="0">    <label class="form-check-label" for="inlineRadio2">No</label></div></div></div></div>'
           
            $('#measurement'+index ).empty();
            $('#measurement'+index ).append(blowse);
        }
        // kurti measurement 
        function kurti(index) {
            var kurti = ' <div id="kurti"> <div class="form-row"> <div class="col-md-3 mb-3"> <label for="name">Shoulder (ખભો)</label> <input type="text" class="form-control form-control-sm " id="k_shoulder" name="k_shoulder'+ index +'" placeholder="Enter Shoulder" value=""> </div> <div class="col-md-3 mb-3"> <label for="name">Length (લંબાઈ)</label> <input type="text" class="form-control form-control-sm " id="k_length" name="k_length'+ index +''+ index +'" placeholder="Enter Length" value=""> </div> <div class="col-md-3 mb-3"> <label for="name">Chest (છાતી)</label> <input type="text" class="form-control form-control-sm " id="k_chest" name="k_chest'+ index +'" placeholder="Enter Chest" value=""> </div> </div> <div class="form-row"> <div class="col-md-3 mb-3"> <label for="name">Waist (કમર)</label> <input type="text" class="form-control form-control-sm" id="k_waist" name="k_waist'+ index +'" placeholder="Enter Waist" value=""> </div> <div class="col-md-3 mb-3"> <label for="name">Chest Up (છાતી અપ)</label> <input type="text" class="form-control form-control-sm" id="k_chest_up" name="k_chest_up'+ index +'" placeholder="Enter Chest Up" value=""> </div> <div class="col-md-3 mb-3"> <label for="name">Sleeves (બાંય)</label> <input type="text" class="form-control form-control-sm " id="k_Sleeves" name="k_Sleeves'+ index +'" placeholder="Enter Front" value=""> </div> </div> <div class="form-row"> <div class="col-md-3 mb-3"> <label for="name">Mori (મોરી)</label> <input type="text" class="form-control form-control-sm " id="k_mori" name="k_mori'+ index +'" placeholder="Enter Mori" value=""> </div> <div class="col-md-3 mb-3"> <label for="name">Mundo (મુંડો)</label> <input type="text" class="form-control form-control-sm " id="k_mundo" name="k_mundo'+ index +'" placeholder="Enter Mundo" value=""> </div> <div class="col-md-3 mb-3"> <label for="name">Magismory(મેગીયસમોરી)</label> <input type="text" class="form-control form-control-sm " id="k_magismory" name="k_magismory'+ index +'" placeholder="Enter Magismory" value=""> </div> </div> <div class="form-row"> <div class="col-md-3 mb-3"> <label for="name">Front Neck (ગળું આ)</label> <input type="text" class="form-control form-control-sm " id="k_front_neck" name="k_front_neck'+ index +'" placeholder="Enter Front" value=""> </div> <div class="col-md-3 mb-3"> <label for="name">Back Neck (ગળું પા)</label> <input type="text" class="form-control form-control-sm " id="k_back_neck" name="k_back_neck'+ index +'" placeholder="Enter Back" value=""> </div> <div class="col-md-3 mb-3"> <label for="name">Full Length(સંપૂર્ણ લંબાઈ)</label> <input type="text" class="form-control form-control-sm " id="k_full_length" name="k_full_length'+ index +'" placeholder="Enter Full Length" value=""> </div> </div> <div class="form-row"> <div class="col-md-3 mb-3"> <label for="name">Kotho (કોઠો)</label> <input type="text" class="form-control form-control-sm " id="k_kotho" name="k_kotho'+ index +'" placeholder="Enter Kotho" value=""> </div> <div class="col-md-3 mb-3"> <label for="name">Other(અન્ય)</label> <input type="text" class="form-control form-control-sm " id="k_other" name="k_other'+ index +'" placeholder="Enter other measurement" value=""> </div> </div> <div class="form-row"> <div class="col-md-3 mb-3"> <label for="name">Huk :</label> <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" name="huk'+ index +'" required id="huk" value="1"> <label class="form-check-label" for="inlineRadio1">Front </label> </div> <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" required name="huk'+ index +'" id="huk" value="0"> <label class="form-check-label" for="inlineRadio2">Back</label> </div> <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" required name="huk'+ index +'" id="huk" value="3"> <label class="form-check-label" for="inlineRadio2">No</label> </div> </div> <div class="col-md-3 mb-3"> <label for="name">Pad :</label> <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" required name="pad'+ index +'" id="pad" value="1"> <label class="form-check-label" for="inlineRadio1">Yes </label> </div> <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" required name="pad'+ index +'" id="pad" value="0"> <label class="form-check-label" for="inlineRadio2">No</label> </div> </div> <div class="col-md-3 mb-3"> <label for="name">Sample :</label> <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" name="sample'+ index +'" required id="sample" value="1"> <label class="form-check-label" for="inlineRadio1">Yes </label> </div> <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" name="sample'+ index +'" required id="sample" value="0"> <label class="form-check-label" for="inlineRadio2">No</label> </div> </div> <div class="col-md-3 mb-3"> <label for="name">Design :</label> <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" name="design'+ index +'" required id="design" value="1"> <label class="form-check-label" for="inlineRadio1">Yes </label> </div> <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" name="design'+ index +'" required id="design" value="0"> <label class="form-check-label" for="inlineRadio2">No</label> </div> </div> </div> </div>'
            $('#measurement'+index ).empty();
            $('#measurement'+index).append(kurti);
        }
        // pant measurement 
        function pant(index){
            var pant = ' <div id="pant"> <div class="form-row"> <div class="col-md-3 mb-3"> <label for="name">Length (લંબાઈ)</label> <input type="text" class="form-control form-control-sm" id="length" name="p_length'+ index +'" placeholder="Enter Length" value=""> </div> <div class="col-md-3 mb-3"> <label for="name">Mori (મોરી)</label> <input type="text" class="form-control form-control-sm " id="mori" name="p_mori'+ index +'" placeholder="Enter Mori" value=""> </div> <div class="col-md-3 mb-3"> <label for="name">Nefo (નેફો)</label> <input type="text" class="form-control form-control-sm " id="nafo" name="p_nefo'+ index +'" placeholder="Enter Nefo" value=""> </div> </div> <div class="form-row"> <div class="col-md-3 mb-3"> <label for="name">seat (સીટ)</label> <input type="text" class="form-control form-control-sm " id="seat" name="p_seat'+ index +'" placeholder="Enter seat" value=""> </div> <div class="col-md-3 mb-3"> <label for="name">Thai (થાઈ)</label> <input type="text" class="form-control form-control-sm" id="thai" name="p_thai'+ index +'" placeholder="Enter thai" value=""> </div> <div class="col-md-3 mb-3"> <label for="name">Knee (ઘૂટણ)</label> <input type="text" class="form-control form-control-sm " id="knee" name="p_knee'+ index +'" placeholder="Enter knee" value=""> </div> </div> <div class="form-row"> <div class="col-md-3 mb-3"> <label for="name">Other(અન્ય)</label> <input type="text" class="form-control form-control-sm " id="other" name="p_other'+ index +'" placeholder="Enter other measurement" value=""> </div> </div> <div class="form-row"> <div class="col-md-3 mb-3"> <label for="name">Huk :</label> <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" name="huk'+ index +'" required id="huk" value="1"> <label class="form-check-label" for="inlineRadio1">Front </label> </div> <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" required name="huk'+ index +'" id="huk" value="0"> <label class="form-check-label" for="inlineRadio2">Back</label> </div> <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" required name="huk'+ index +'" id="huk" value="3"> <label class="form-check-label" for="inlineRadio2">No</label> </div> </div> <div class="col-md-3 mb-3"> <label for="name">Pad :</label> <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" required name="pad'+ index +'" id="pad" value="1"> <label class="form-check-label" for="inlineRadio1">Yes </label> </div> <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" required name="pad'+ index +'" id="pad" value="0"> <label class="form-check-label" for="inlineRadio2">No</label> </div> </div> <div class="col-md-3 mb-3"> <label for="name">Sample :</label> <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" name="sample'+ index +'" required id="sample" value="1"> <label class="form-check-label" for="inlineRadio1">Yes </label> </div> <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" name="sample'+ index +'" required id="sample" value="0"> <label class="form-check-label" for="inlineRadio2">No</label> </div> </div> <div class="col-md-3 mb-3"> <label for="name">Design :</label> <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" name="design'+ index +'" required id="design" value="1"> <label class="form-check-label" for="inlineRadio1">Yes </label> </div> <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" name="design'+ index +'" required id="design" value="0"> <label class="form-check-label" for="inlineRadio2">No</label> </div> </div> </div> </div>'
            $('#measurement'+index ).empty();
            $('#measurement'+index).append(pant);
        }
        // petticoat measurement 
        function petticoat(index){
            var petticoat = ' <div id="Petticoat"> <div class="form-row"> <div class="col-md-3 mb-3"> <label for="name">Length (લંબાઈ)</label> <input type="text" class="form-control form-control-sm" id="length" name="pe_length'+ index +'" placeholder="Enter Length" value=""> </div> <div class="col-md-3 mb-3"> <label for="name">Nefo (નેફો)</label> <input type="text" class="form-control form-control-sm " id="nafo" name="pe_nefo'+ index +'" placeholder="Enter Nefo" value=""> </div> <div class="col-md-3 mb-3"> <label for="name">seat (સીટ)</label> <input type="text" class="form-control form-control-sm " id="seat" name="pe_seat'+ index +'" placeholder="Enter seat" value=""> </div> </div> <div class="form-row"> <div class="col-md-3 mb-3"> <label for="name">Gher (ઘેર)</label> <input type="text" class="form-control form-control-sm " id="gher" name="pe_gher'+ index +'" placeholder="Enter Gher" value=""> </div> <div class="col-md-3 mb-3"> <label for="name">Type of (પ્રકાર)</label> <input type="text" class="form-control form-control-sm " id="kadi" name="pe_typeof'+ index +'" placeholder="Enter Kali" value=""> </div> <div class="col-md-3 mb-3"> <label for="name">other (અન્ય)</label> <input type="text" class="form-control form-control-sm " id="kadi" name="pe_other'+ index +'" placeholder="Enter Oher Measurement" value=""> </div> </div> <div class="form-row"> <div class="col-md-3 mb-3"> <label for="name">Huk :</label> <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" name="huk'+ index +'" required id="huk" value="1"> <label class="form-check-label" for="inlineRadio1">Front </label> </div> <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" required name="huk'+ index +'" id="huk" value="0"> <label class="form-check-label" for="inlineRadio2">Back</label> </div> <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" required name="huk'+ index +'" id="huk" value="3"> <label class="form-check-label" for="inlineRadio2">No</label> </div> </div> <div class="col-md-3 mb-3"> <label for="name">Pad :</label> <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" required name="pad'+ index +'" id="pad" value="1"> <label class="form-check-label" for="inlineRadio1">Yes </label> </div> <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" required name="pad'+ index +'" id="pad" value="0"> <label class="form-check-label" for="inlineRadio2">No</label> </div> </div> <div class="col-md-3 mb-3"> <label for="name">Sample :</label> <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" name="sample'+ index +'" required id="sample" value="1"> <label class="form-check-label" for="inlineRadio1">Yes </label> </div> <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" name="sample'+ index +'" required id="sample" value="0"> <label class="form-check-label" for="inlineRadio2">No</label> </div> </div> <div class="col-md-3 mb-3"> <label for="name">Design :</label> <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" name="design'+ index +'" required id="design" value="1"> <label class="form-check-label" for="inlineRadio1">Yes </label> </div> <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" name="design'+ index +'" required id="design" value="0"> <label class="form-check-label" for="inlineRadio2">No</label> </div> </div> </div> </div>'
            $('#measurement'+index ).empty();
            $('#measurement'+index).append(petticoat);
        }

        function select(index,value) {
            if (value == "blowse") {
                blowse(index);
            }
            if (value == "kurti") {
               kurti(index);
            }
            if (value == "pant") {
               pant(index);
            }
            if (value == "petticoat") {
                petticoat(index);
               
            }
            // alert(index);
            };
            
                    // Update Page 
        $('.addmoreRow').click(function(){
            var form = '  <tr class="dataRow"> <td class="d-none"><input type="text" value="" name="item_id[]"></td> <td class="col-md-3"> <select class="form-control select2 itemName  " name="itemname[]" id="selectItem" required > <option selected hidden disabled value="Select Item">Select Item </option> <option value="blowse">Blowse</option> <option value="kurti">Kurti</option> <option value="Anarkali">Anarkali</option> <option value="Gaun">Gaun</option> <option value="pant">Pant</option> <option value="Salwar">Salwar</option> <option value="Plazo">Plazo</option> <option value="petticoat">Petticoat</option> </select> </td> <td><input type="text" class="form-control form-control-sm price  " aria-label="Small" name="price[]" value="" required placeholder="Rate per unit" aria-describedby="inputGroup-sizing-sm" onkeydown="getTotal() " id="ppu"></td> <td> <input type="number" class="form-control form-control-sm  qty" aria-label="Small" min="1" value="" max="100" required name="qty[]" onload="getTotal()" onchange="getTotal()" onkeydown="getTotal()" placeholder="Quantity" aria-describedby="inputGroup-sizing-sm" id="quantity"> </td> <td> <input type="text" class="form-control form-control-sm  itemTotal" aria-label="Small" required name="item_total[]" readonly placeholder="Item Total" value="" aria-describedby="inputGroup-sizing-sm"> </td> <td> <button type="button" class="form-control form-control-sm" id="deleted" aria-label="Small" placeholder="Total Amount" aria-describedby="inputGroup-sizing-sm"><i class="fas fa-trash"></i></button> </td> </tr>';
            $("#items").append(form);
        });
        $("#items").on('click', '#deleted', function() {
            $(this).closest("tr").remove();
            getTotal();
            calculate();
        });

       

</script>
