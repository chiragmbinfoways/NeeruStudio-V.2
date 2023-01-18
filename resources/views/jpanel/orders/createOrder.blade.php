@extends('jpanel.layouts.app')
@section('title')
    Add New Order
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Order</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('list.order') }}">View Order</a></li>
                        <li class="breadcrumb-item active">Add Order</li>
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
                                <h3 class="card-title">New Order Form</h3>
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
                                                <input type="text" class="d-none" value="{{ $last }}"
                                                    id="orderHide">
                                                <label for="name">Order No</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('orderNo') is-invalid @enderror"
                                                    value="{{ $last }}" id="orderNo"  name="orderNo"
                                                    placeholder="Enter Order no" value={{ old('orderNo') }}>
                                                @if ($errors->has('orderNo'))
                                                    <div class="text-danger">{{ $errors->first('orderNo') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="name">Order Date</label>
                                                <input type="date"
                                                    class="form-control form-control-sm @error('adress') is-invalid @enderror"
                                                    id="orderDate" name="oDate" placeholder="Enter adress">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="name">Delivery Date</label>
                                                <input type="date"
                                                    class="form-control form-control-sm @error('dDate') is-invalid @enderror"
                                                    id="dDate" name="dDate" placeholder="Enter date"
                                                    value={{ old('dDate') }}>
                                                @if ($errors->has('dDate'))
                                                    <div class="text-danger">{{ $errors->first('dDate') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3 card-body bg-light form-group">
                                                <label for="name">By Name:</label>
                                                <select class="form-control select2 @error('orderBy') is-invalid @enderror"
                                                    name="orderByName" id="nameDisable">
                                                    <option selected disable hidden value="Select Customer">Select Customer
                                                    </option>
                                                    @foreach ($customers as $customerData)
                                                        <option value="{{ $customerData->id }}">
                                                            {{ $customerData->customer_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('orderByName'))
                                                    <div class="text-danger">{{ $errors->first('orderByName') }}</div>
                                                @endif

                                                <label for="number " class="mt-3">By Number:</label>
                                                <select
                                                    class="form-control select2 @error('orderBynumber') is-invalid @enderror"
                                                    name="orderBynumber" id="numberDisable">
                                                    <option selected disable hidden value="Select Customer">Select Customer
                                                    </option>
                                                    @foreach ($customers as $customerData)
                                                        <option value="{{ $customerData->id }}">
                                                            {{ $customerData->number }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('orderBynumber'))
                                                    <div class="text-danger">{{ $errors->first('orderBynumber') }}</div>
                                                @endif
                                                <div class=" mt-4">
                                                    <a href="{{ route('create.customers') }}"
                                                        class="btn btn-sm btn-secondary "> Add Customer</a>
                                                </div>
                                            </div>
                                            <div class="col-md-8  mb-3 card-body bg-light form-group pl-5">
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="name">Full Name : </label>
                                                        <input type="text" readonly value="{{ old('cName') }}"
                                                            class="border-0 form-control form-control-sm" name="cName">
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="name">Phone : </label>
                                                        <input type="text" value="{{ old('phone') }}" readonly
                                                            class="border-0 form-control form-control-sm" name="phone">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="country">Adress : </label>
                                                        <textarea readonly class="border-0 form-control form-control-sm" name="adress">{{ old('adress') }}</textarea>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="country">Pincode</label>
                                                        <input type="text" value="{{ old('pincode') }}" readonly
                                                            class="border-0 form-control form-control-sm" name="pincode">
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
                                {{-- Append table Area  --}}
                                <div id="item"></div>
                                {{-- Append table Area  --}}

                                {{-- <table class="table" id="item">
                                    <thead class="bg-dark">
                                        <tr class="item">
                                        <th class="col-md-3">Item</th>
                                        <th class="col-md-3">Rate (₹)</th>
                                        <th class="col-md-2">Quantity(nos)</th>
                                        <th class="col-md-3">Total Amount (₹)</th>
                                        <th class="col-md-1">Action</th>
                                        </tr>
                                    </thead>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="col-md-3">
                                                <select class="form-control select2 itemName " name="itemname[]"
                                                    id="selectItem">
                                                    <option selected disable hidden value="Select Customer">Select Item
                                                    </option>
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
                                            <td class="col-md-3"><input type="text"
                                                    class="form-control form-control-sm price  " aria-label="Small"
                                                    name="price[]" required placeholder="Rate per unit"
                                                    aria-describedby="inputGroup-sizing-sm" onkeyup="getTotal()"
                                                    id="ppu"></td>
                                            <td class="col-md-2"> <input type="number"
                                                    class="form-control form-control-sm  qty" aria-label="Small"
                                                    min="1" max="100" required name="qty[]"
                                                    onchange="getTotal()" placeholder="Quantity"
                                                    aria-describedby="inputGroup-sizing-sm" id="quantity">
                                            </td>

                                            <td class="col-md-3">
                                                <input type="text" class="form-control form-control-sm  itemTotal"
                                                    aria-label="Small" required name="item_total[]" readonly
                                                    placeholder="Item Total" aria-describedby="inputGroup-sizing-sm">
                                            </td>
                                            <td class="col-md-1">
                                                <button type="button" class="form-control form-control-sm"
                                                    id="delete" aria-label="Small" placeholder="Total Amount"
                                                    aria-describedby="inputGroup-sizing-sm"><i
                                                        class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                                <div id="measurement">
                                </div> --}}
                                {{-- <div class="measurement pl-3 mt-3 mb-3">
                                    <div id="blowse">
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Shoulder (ખભો)</label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="Shoulder" name="b_shoulder" placeholder="Enter Shoulder"
                                                    value="">
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Length (લંબાઈ)</label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="length" name="b_length" placeholder="Enter Length"
                                                    value="">
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Chest (છાતી)</label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="chest" name="b_chest" placeholder="Enter Chest"
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Waist (કમર)</label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="chest" name="b_waist" placeholder="Enter Waist"
                                                    value="">
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Chest Up (છાતી અપ)</label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="chest" name="b_chest_up" placeholder="Enter Chest Up"
                                                    value="">
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Sleeves (બાંય)</label>
                                                <input type="text" class="form-control form-control-sm" id="sleeves"
                                                    name="b_Sleeves" placeholder="Enter Front" value="">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Mori (મોરી)</label>
                                                <input type="text" class="form-control form-control-sm" id="mori"
                                                    name="b_mori" placeholder="Enter Mori" value="">
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Mundo (મુંડો)</label>
                                                <input type="text" class="form-control form-control-sm" id="mundo"
                                                    name="b_mundo" placeholder="Enter Mundo" value="">
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Magismory(મેગીયસમોરી)</label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="length" name="b_magismory" placeholder="Enter Length"
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Front Neck (ગળું આ)</label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="frontNeck" name="b_front_neck" placeholder="Enter Front"
                                                    value="">
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Back Neck (ગળું પા)</label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="backNeck" name="b_back_neck" placeholder="Enter Back"
                                                    value="">
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Other(અન્ય)</label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="other" name="b_other" placeholder="Enter other measurement"
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Huk :</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="huk"
                                                        required id="huk" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Front </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" required
                                                        name="huk" id="huk" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">Back</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" required
                                                        name="huk" id="huk" value="3">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Pad :</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" required
                                                        name="pad" id="pad" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Yes </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" required
                                                        name="pad" id="pad" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Sample :</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sample"
                                                        required id="sample" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Yes </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sample"
                                                        required id="sample" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Design :</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="design"
                                                        required id="design" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Yes </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="design"
                                                        required id="design" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="kurti">
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Shoulder (ખભો)</label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="k_shoulder" name="k_shoulder" placeholder="Enter Shoulder"
                                                    value="">
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Length (લંબાઈ)</label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="k_length" name="k_length" placeholder="Enter Length"
                                                    value="">
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Chest (છાતી)</label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="k_chest" name="k_chest" placeholder="Enter Chest"
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Waist (કમર)</label>
                                                <input type="text" class="form-control form-control-sm" id="k_waist"
                                                    name="k_waist" placeholder="Enter Waist" value="">
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Chest Up (છાતી અપ)</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    id="k_chest_up" name="k_chest_up" placeholder="Enter Chest Up"
                                                    value="">
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Sleeves (બાંય)</label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="k_Sleeves" name="k_Sleeves" placeholder="Enter Front"
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Mori (મોરી)</label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="k_mori" name="k_mori" placeholder="Enter Mori"
                                                    value="">
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Mundo (મુંડો)</label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="k_mundo" name="k_mundo" placeholder="Enter Mundo"
                                                    value="">
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Magismory(મેગીયસમોરી)</label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="k_magismory" name="k_magismory" placeholder="Enter Magismory"
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Front Neck (ગળું આ)</label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="k_front_neck" name="k_front_neck" placeholder="Enter Front"
                                                    value="">
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Back Neck (ગળું પા)</label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="k_back_neck" name="k_back_neck" placeholder="Enter Back"
                                                    value="">
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Full Length(સંપૂર્ણ લંબાઈ)</label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="k_full_length" name="k_full_length"
                                                    placeholder="Enter Full Length" value="">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Kotho (કોઠો)</label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="k_kotho" name="k_kotho" placeholder="Enter Kotho"
                                                    value="">
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Other(અન્ય)</label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="k_other" name="k_other" placeholder="Enter other measurement"
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Huk :</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="huk"
                                                        required id="huk" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Front </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" required
                                                        name="huk" id="huk" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">Back</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" required
                                                        name="huk" id="huk" value="3">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Pad :</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" required
                                                        name="pad" id="pad" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Yes </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" required
                                                        name="pad" id="pad" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Sample :</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sample"
                                                        required id="sample" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Yes </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sample"
                                                        required id="sample" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Design :</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="design"
                                                        required id="design" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Yes </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="design"
                                                        required id="design" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="pant">
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Length (લંબાઈ)</label>
                                                <input type="text" class="form-control form-control-sm" id="length"
                                                    name="p_length" placeholder="Enter Length" value="">
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Mori (મોરી)</label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="mori" name="p_mori" placeholder="Enter Mori"
                                                    value="">
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Nefo (નેફો)</label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="nafo" name="p_nefo" placeholder="Enter Nefo"
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">seat (સીટ)</label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="seat" name="p_seat" placeholder="Enter seat"
                                                    value="">
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Thai (થાઈ)</label>
                                                <input type="text" class="form-control form-control-sm" id="thai"
                                                    name="p_thai" placeholder="Enter thai" value="">
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Knee (ઘૂટણ)</label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="knee" name="p_knee" placeholder="Enter knee"
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Other(અન્ય)</label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="other" name="p_other" placeholder="Enter other measurement"
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Huk :</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="huk"
                                                        required id="huk" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Front </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" required
                                                        name="huk" id="huk" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">Back</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" required
                                                        name="huk" id="huk" value="3">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Pad :</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" required
                                                        name="pad" id="pad" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Yes </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" required
                                                        name="pad" id="pad" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Sample :</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sample"
                                                        required id="sample" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Yes </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sample"
                                                        required id="sample" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Design :</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="design"
                                                        required id="design" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Yes </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="design"
                                                        required id="design" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="Petticoat">
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Length (લંબાઈ)</label>
                                                <input type="text" class="form-control form-control-sm" id="length"
                                                    name="pe_length" placeholder="Enter Length" value="">

                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Nefo (નેફો)</label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="nafo" name="pe_nefo" placeholder="Enter Nefo"
                                                    value="">

                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">seat (સીટ)</label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="seat" name="pe_seat" placeholder="Enter seat"
                                                    value="">

                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Gher (ઘેર)</label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="gher" name="pe_gher" placeholder="Enter Gher"
                                                    value="">

                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Type of (પ્રકાર)</label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="kadi" name="pe_typeof" placeholder="Enter Kali"
                                                    value="">

                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">other (અન્ય)</label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="kadi" name="pe_other" placeholder="Enter Oher Measurement"
                                                    value="">

                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Huk :</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="huk"
                                                        required id="huk" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Front </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" required
                                                        name="huk" id="huk" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">Back</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" required
                                                        name="huk" id="huk" value="3">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Pad :</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" required
                                                        name="pad" id="pad" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Yes </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" required
                                                        name="pad" id="pad" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Sample :</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sample"
                                                        required id="sample" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Yes </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sample"
                                                        required id="sample" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Design :</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="design"
                                                        required id="design" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Yes </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="design"
                                                        required id="design" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div> --}}
                                <div class="form-row ">
                                    <div class="btn btn-secondary bt-lg mb-3 ml-3 addRow"> Add Item</div>
                                </div>
                                <div class="form-row mt-3">
                                    <div class="col-md-9">
                                        <div class="mb-3 col-md-5">
                                            {{-- <div class="btn btn-secoundary add"><i class="fas fa-paperclip"></i> Add
                                                Attachments</div>
                                            <input type="file" class="open " id="uploadFile" multiple
                                                name="upload_file[]" onchange="imageSelect();"> --}}
                                        </div>

                                        <div class="d-flex flex-wrap " id="imgContainer">
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <hr>
                                        <h5>Total Amt :&nbsp;₹<b><input class="border-0" type="text" id="grandTotal"
                                                    readonly name="grandTotal" style="width: 90px;"></b></h5>

                                        <h5>Advance &nbsp; :&nbsp;₹<b><input class="border-0" type="text"
                                                    id="advance" class="@error('advanceAmt') is-invalid @enderror"
                                                    onkeyup="calculate()" name="advanceAmt" style="width:90px;">
                                                @if ($errors->has('advanceAmt'))
                                                    <div class="text-danger">{{ $errors->first('advanceAmt') }}</div>
                                                @endif
                                            </b></h5>

                                        <h5>Pending &nbsp;&nbsp; :&nbsp;₹<b><input class="border-0" type="text"
                                                    id="pending" readonly name="pending" style="width:90px;"></b></h5>

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
                                    <textarea class="ckeditor form-control form-control-sm card" name="termsAndConditions"></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-secondary btn-block">Create Order <i
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
    <script></script>
@endsection

@section('scripts')
    @include('jpanel.orders.ajax')
@endsection
