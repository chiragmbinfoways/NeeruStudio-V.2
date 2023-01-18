{{-- @extends('jpanel.layouts.app')
@section('title')
    Edit Order
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Order: 556</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('list.order') }}">View Order</a></li>
                        <li class="breadcrumb-item active">Edit Order</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row flash-message">
                <div class="col-12">
                    @include('jpanel/flash-message')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <!-- Profile Update box -->
                    <form action="{{ route('add.order') }}" method="post" enctype="multipart/form-data" id="order">
                        @csrf

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit Order Details</h3>
                                <div class="card-tools">
                                    <a href="{{ route('list.order') }}" class="btn btn-sm btn-secondary">
                                        <i class="fas fa-eye"></i> View All Orders
                                    </a>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    {{-- <h5 for="name" class="text-center font-weight-bold">Order Details</h5> --}}
{{-- </div>
                                <div class="form-row">
                                    <div class="col-md-9"> 
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label for="name">Order No</label>
                                                <input type="text" readonly
                                                    class="form-control form-control-sm @error('vendorName') is-invalid @enderror"
                                                    id="uname" name="customerName" placeholder="Enter Invoice no" value= "{{$order_id->order_no}}">
                                                @if ($errors->has('customerName'))
                                                    <div class="text-danger">{{ $errors->first('customerName') }}</div>
                                                @endif
                                            </div>    
                                            <div class="col-md-4 mb-3">
                                                <label for="name">Order Date</label>
                                                <input type="date"
                                                    class="form-control form-control-sm @error('adress') is-invalid @enderror"
                                                    id="oDate" name="adress" placeholder="Enter adress" value={{ old('adress') }}>
                                                @if ($errors->has('adress'))
                                                    <div class="text-danger">{{ $errors->first('adress') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="name">Delivery Date</label>
                                                <input type="date"
                                                    class="form-control form-control-sm @error('adress') is-invalid @enderror"
                                                    id="dDate" name="adress" placeholder="Enter adress" value={{ old('adress') }}>
                                                @if ($errors->has('adress'))
                                                    <div class="text-danger">{{ $errors->first('adress') }}</div>
                                                @endif
                                            </div>
                                        </div>   
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3 card-body bg-light form-group">
                                                <label for="name"> Order By:</label>
                                                <select class="form-control" readonly  id="exampleFormControlSelect1">
                                                  <option selected >Chirag pariyani</option>
                                                </select>
                                                <div class=" mt-4">
                                                    <a href="{{ route('create.customers') }}"  class="btn btn-sm btn-secondary "> Add Customer</a>

                                                </div>
                                            </div>    
                                            <div class="col-md-8  mb-3 card-body bg-light form-group pl-5">
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="name">Full Name : </label>
                                                        Chirag Pariyani
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="name">Phone : </label>
                                                        7016637926
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="country">Adress : </label>
                                                         B/6 Mahipal Nagar Opp chandkheda Rly station near Ioc chandkheda,Ahmedabad
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="country">Pincode</label>
                                                       382470
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="col-md-12 mb-3"></div>
                                        <div class="col-md-12 mb-3">
                                            <img class="rounded float-right mt-4 mr-4" style="width:200px; height:200px;" src="{{asset('dist/img/neeru.jpg')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                
                                <table class="table" id="item">
                                    <thead class="bg-dark">
                                        <tr class="item">
                                            <th scope="col">Item</th>
                                            <th scope="col">Rate (₹)</th>
                                            <th scope="col">Quantity(nos)</th>
                                            <th scope="col">Total Amount (₹)</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <tbody>
                                        <div>
                                            <tr>
                                                <td> <input type="text" class="form-control form-control-sm"
                                                        aria-label="Small" placeholder="Item name"
                                                        aria-describedby="inputGroup-sizing-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm price "
                                                         aria-label="Small" placeholder="Rate per unit"
                                                        aria-describedby="inputGroup-sizing-sm" onkeyup="getTotal()"></td>
                                                <td> <input type="number" class="form-control form-control-sm qty"
                                                         aria-label="Small" min="1" max="100" onchange="getTotal()" onckeyup="getTotal()"
                                                        placeholder="Quantity" aria-describedby="inputGroup-sizing-sm">
                                                </td>
                                                
                                                <td>
                                                    <h4 class="itemTotal form-control form-control-sm"></h4>
                                                </td>
                                                <td>
                                                <button type="button" class="form-control form-control-sm" id="delete"  aria-label="Small" placeholder="Total Amount" aria-describedby="inputGroup-sizing-sm"><i class="fas fa-trash"></i></button>
                                            </td>
                                            </tr>
                                        </div>
                                    </tbody>
                                </table>

                                <div class="form-row ">
                                    <div class="btn btn-secondary bt-lg mb-3 ml-3 addRow"> Add Item</div>
                                </div>
                                <div class="form-row mt-3">
                                    <div class="col-md-9">
                                        <div class="mb-3 col-md-5">
                                            <div class="btn btn-secoundary add"><i class="fas fa-paperclip"></i> Add
                                                Attachments</div>
                                            <input type="file" class="open d-none" id="uploadFile" multiple
                                                name="upload_file[]" onchange="imageSelect();">
                                        </div>
                                        {{-- image --}}
{{-- <div class="d-flex flex-wrap " id="imgContainer">
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <hr>
                                        <h4>Total<span class="small">(INR)</span>:&nbsp;<b id="grandTotal"></b>₹</h4>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><strong>Terms & Conditions:</strong></label>
                                    <textarea class="ckeditor form-control form-control-sm card" name="termsAndConditions">1.Product sold shall not be refunded <br>2.The Colour Dullness is not covered Under Warrenty <br> 3. The Trial of clothes should be done at store at the time of Delivery.
                                    </textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-secondary btn-block">Create Order  <i
                                        class="fas fa-angle-double-right"></i></button>
                            </div>
                            <!-- /.card-footer-->

                        </div>
                        <!-- /.card -->
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    @include('jpanel.orders.ajax')
@endsection  --}}


{{-- -------------------------------------------------- new edit form--------------------------------------------------- --}}


@extends('jpanel.layouts.app')
@section('title')
    Edit Order
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Order : {{ $order_id->order_no }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('list.order') }}">View Order</a></li>
                        <li class="breadcrumb-item active">Edit Order</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row flash-message">
                <div class="col-12">
                    @include('jpanel/flash-message')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <!-- Profile Update box -->
                    <form action="{{ route('order.update', $order_id->id) }}" method="post" enctype="multipart/form-data"
                        id="order">
                        @csrf

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit Order Form</h3>
                                <div class="card-tools">
                                    <a href="{{ route('list.order') }}" class="btn btn-sm btn-secondary">
                                        <i class="fas fa-eye"></i> View All Orders
                                    </a>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    {{-- <h5 for="name" class="text-center font-weight-bold">Order Details</h5> --}}
                                </div>
                                <div class="form-row">
                                    <div class="col-md-9">
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <input type="text" class="d-none" value="" id="orderHide">
                                                <label for="name">Order No</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('orderNo') is-invalid @enderror"
                                                    value="{{ $order_id->order_no }}" id="" readonly name="orderNo"
                                                    placeholder="Enter Order no" value={{ old('orderNo') }}>
                                                @if ($errors->has('orderNo'))
                                                    <div class="text-danger">{{ $errors->first('orderNo') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="name">Order Date</label>
                                                <input type="date"
                                                    class="form-control form-control-sm @error('adress') is-invalid @enderror"
                                                    name="oDate" value="{{ $order_id->order_date }}"
                                                    placeholder="Enter adress">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="name">Delivery Date</label>
                                                <input type="date"
                                                    class="form-control form-control-sm @error('dDate') is-invalid @enderror"
                                                    id="dDate" name="dDate" placeholder="Enter date"
                                                    value={{ $order_id->delivery_date }}>
                                                @if ($errors->has('dDate'))
                                                    <div class="text-danger">{{ $errors->first('dDate') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3 card-body bg-light form-group">
                                                <label for="name"> Order By:</label>
                                                <input type="text" readonly
                                                    value="{{ $order_id->customers->customer_name }}"
                                                    class="border-0 form-control form-control-sm" name="cName">
                                                <label for="name" class="mt-3"> Order By:</label>
                                                <input type="text" readonly value="{{ $order_id->customers->number }}"
                                                    class="border-0 form-control form-control-sm" name="cName">
                                                <div class=" mt-4">
                                                    <a href="{{ route('create.customers') }}"
                                                        class="btn btn-sm btn-secondary "> Add Customer</a>
                                                </div>

                                            </div>
                                            <div class="col-md-8  mb-3 card-body bg-light form-group pl-5">
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="name">Full Name : </label>
                                                        <input type="text" readonly
                                                            value="{{ $order_id->customer_name }}"
                                                            class="border-0 form-control form-control-sm" name="cName">
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="name">Phone : </label>
                                                        <input type="text" value="{{ $order_id->customers->number }}"
                                                            readonly class="border-0 form-control form-control-sm"
                                                            name="phone">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="country">Adress : </label>
                                                        <textarea readonly class="border-0 form-control form-control-sm" name="adress">{{ $order_id->customers->address1 . ' ' . $order_id->customers->address2 . ' ' . $order_id->customers->city . ' ' . $order_id->customers->state . ' ' . $order_id->customers->country }}</textarea>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="country">Pincode</label>
                                                        <input type="text" value="{{ $order_id->customers->zipcode }}"
                                                            readonly class="border-0 form-control form-control-sm"
                                                            name="pincode">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="col-md-12 mb-3"></div>
                                        <div class="col-md-12 mb-3">
                                            <img class="rounded float-right mt-4 mr-4" style="width:200px; height:200px;"
                                                src="{{ asset('dist/img/neeru.jpg') }}" alt="">
                                        </div>
                                    </div>
                                </div>

                                <table class="table" id="items">
                                    <thead class="bg-dark">
                                        <tr class="item">
                                            <th scope="col">Item</th>
                                            <th scope="col">Rate (₹)</th>
                                            <th scope="col">Quantity(nos)</th>
                                            <th scope="col">Total Amount (₹)</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <tbody>
                                        <div>
                                            @foreach ($item as $key => $item)
                                                <tr class="dataRow{{ $item->id }}">
                                                    <td class="d-none"><input type="text" value="{{ $item->id }}"
                                                            name="item_id[]"></td>
                                                    <td class="col-md-3">
                                                        <select class="form-control  itemName  " name="itemname[]"
                                                            id="selectItem">
                                                            <option selected value="{{ $item->product_name }}">{{ $item->product_name }} </option>
                                                            <option value="blowse">Blowse</option>
                                                            <option value="kurti">Kurti</option>
                                                            <option value="kurti">Anarkali</option>
                                                            <option value="kurti">Gaun</option>
                                                            <option value="pant">Pant</option>
                                                            <option value="pant">Salwar</option>
                                                            <option value="pant">Plazo</option>
                                                            <option value="petticoat">Petticoat</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="text" class="form-control form-control-sm price  "
                                                            aria-label="Small" name="price[]"
                                                            value="{{ $item->rate }}" required
                                                            placeholder="Rate per unit"
                                                            aria-describedby="inputGroup-sizing-sm"
                                                            onkeydown="getTotal() " id="ppu"></td>
                                                    <td> <input type="number" class="form-control form-control-sm  qty"
                                                            aria-label="Small" min="1"
                                                            value="{{ $item->quantity }}" max="100" required
                                                            name="qty[]" onload="getTotal()" onkeydown="getTotal()"
                                                            placeholder="Quantity" aria-describedby="inputGroup-sizing-sm"
                                                            id="quantity">
                                                    </td>

                                                    <td>
                                                        <input type="text"
                                                            class="form-control form-control-sm  itemTotal"
                                                            aria-label="Small" required name="item_total[]" readonly
                                                            placeholder="Item Total" value="{{ $item->item_total }}"
                                                            aria-describedby="inputGroup-sizing-sm">
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('product.delete', $item->id) }}"><button
                                                                type="button" class="form-control form-control-sm"
                                                                id="delete" aria-label="Small"
                                                                placeholder="Total Amount"
                                                                aria-describedby="inputGroup-sizing-sm"><i
                                                                    class="fas fa-trash"></i></button></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </div>
                                    </tbody>
                                </table>

                                <div class="form-row ">
                                    <div class="btn btn-secondary bt-lg mb-3 ml-3 addmoreRow"> Add Item</div>
                                </div>
                                <div class="form-row mt-3">
                                    <div class="col-md-9">
                                        {{-- <div class="mb-3 col-md-5">
                                             {{-- <div class="btn btn-secoundary add"><i class="fas fa-paperclip"></i> Add
                                                Attachments</div>
                                            <input type="file" class="open d-none" id="uploadFile" multiple
                                                name="upload_file[]" onchange="imageSelect();"> 
                                        </div> 
                                        
                                         {{-- @foreach ($images as $key => $image) 
                                        <div class="d-flex flex-wrap " id="imgContainer">
                                            <img src="{{asset('/storage/images/order/images/'.$image->image)}}" alt="image" >
                                        </div>
                                         @endforeach  --}}

                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <hr>
                                        <h5>Total Amt :&nbsp;₹<b><input class="border-0" type="text" id="grandTotal"
                                                    readonly name="grandTotal" value="" style="width: 100px;"></b>
                                        </h5>

                                        <h5>Advance &nbsp; :&nbsp;₹<b><input class="border-0" type="text"
                                                    id="advance" class="@error('advanceAmt') is-invalid @enderror"
                                                    value="{{ $order_id->advance_amt }}" onkeyup="calculate()"
                                                    name="advanceAmt" style="width:90px;">
                                                @if ($errors->has('advanceAmt'))
                                                    <div class="text-danger">{{ $errors->first('advanceAmt') }}</div>
                                                @endif
                                            </b></h5>

                                        <h5>Pending &nbsp; :&nbsp;₹<b><input class="border-0" type="text"
                                                    id="pending" readonly value="{{ $pending }}" name="pending"
                                                    style="width:100px;"></b></h5>

                                        {{-- <h5>Pending &nbsp; &nbsp; :&nbsp;<b id="pending"> </b></h5> --}}

                                    </div>

                                </div>
                                <div class="form-row ">
                                    <div class="col-md-9"></div>
                                    <div class="col-md-3 mb-3">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><strong>Terms & Conditions:</strong></label>
                                    <textarea class="ckeditor form-control form-control-sm card" name="termsAndConditions">{{ $order_id->comment }}</textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-secondary btn-block">Edit Order <i
                                        class="fas fa-angle-double-right"></i></button>
                            </div>
                            <!-- /.card-footer-->

                        </div>
                        <!-- /.card -->
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(function() {
            getTotal();
        });
    </script>
    @include('jpanel.orders.ajax')
@endsection
