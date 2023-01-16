@extends('jpanel.layouts.app')
@section('title')
    Orders
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 flash-message">
            <div class="col-sm-3">
                <h1>Orders</h1>
            </div>
            <div class="col-6 messageArea">
                @include('jpanel/flash-message')
            </div>
            <div class="col-sm-3">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Order List</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="row">
            @if(hasPermission('order',2))
            <div class="col-12">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Order List</h3>
                        <div class="card-tools">
                            @if(hasPermission('order',1))
                            <a href="{{route('create.order')}}" class="btn btn-sm btn-secondary">
                                <i class="fas fa-plus-square"></i> Add New Order
                            </a>
                            @endif
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body ">
                        <table class="table table-bordered table-hover " id="orderDataTable">
                            <thead>
                                <tr>
                                    <th> No </th>
                                    <th>Date</th>
                                    <th>Order No</th>
                                    <th>Customer Name</th>
                                    <th>total Amount</th>
                                    <th>Advance Payment</th>
                                    <th>Payment Status</th>
                                    <th>Delivery Status</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($order as $key =>$order)

                                <tr class="dataRow{{$order->id}}">
                                    <td>{{++$key}}</td>
                                    <td>{{getFormatedDate($order->order_date,"d/m/Y")}}</td>
                                    <td>{{$order->order_no}}</td>
                                    <td>{{$order->customer_name}}</td>
                                    <td>{{$order->total_amt}}</td>
                                    <td>{{$order->advance_amt}}</td>
                                    <td>
                                        @if(hasPermission('order',2))
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input data-id="{{$order->id}}" type="checkbox" class="custom-control-input orderStatus" id="status{{$order->id}}" name="status{{$order->id}}" {{ $order->status ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="status{{$order->id}}"></label>
                                        </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if(hasPermission('order',2))
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input data-id="{{$order->id}}" type="checkbox" class="custom-control-input delivery_Status" id="delivery_status{{$order->id}}" name="delivery_status{{$order->id}}" {{ $order->delivery_status ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="delivery_status{{$order->id}}"></label>
                                        </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if(hasPermission('order',2))
                                        <a href="{{ route('view.order', $order->id) }}" class="text-success" data-toggle="tooltip" data-placement="top" title="View"><i class="fas fa-eye"></i></a>|
                                        @endif
                                        @if(hasPermission('order',3))
                                        <a href="{{ route('edit.order',$order->id) }}" class="text-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>|
                                        @endif
                                        @if(hasPermission('order',4))
                                        <a href="javascript:void(0)" data-id="{{$order->id}}" class="text-danger delete" id="delete{{$order->id}}" name="delete{{$order->id}}" data-toggle="tooltip" data-placement="top" title="Trash"><i class="fas fa-trash"></i></a>
                                        @endif
                                      
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th> No </th>
                                    <th>Date</th>
                                    <th>Order No</th>
                                    <th>Customer Name</th>
                                    <th>total Amount</th>
                                    <th>Advance Payment</th>
                                    <th>Payment Status</th>
                                    <th>Delivery Status</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">

                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </div>
            @endif
        </div>
    </div>
</section>
<!-- /.content -->
@endsection

@section('scripts')
    @include('jpanel.orders.ajax')
@endsection
