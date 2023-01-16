@extends('jpanel.layouts.app')
@section('title')
    Products
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 flash-message">
            <div class="col-sm-3">
                {{-- <h1>Order No: 556</h1> --}}
            </div>
            <div class="col-6 messageArea">
                @include('jpanel/flash-message')
            </div>
            <div class="col-sm-3">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Product List</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="row">
            @if(hasPermission('users',2))
            <div class="col-12">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Product List</h3>
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
                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="orderDataTable">
                            <thead>
                            
                                    <th>No</th>
                                    <th>Product Name</th>
                                    <th>Rate</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                                @foreach ($order as $key =>$order)

                                <tr class="dataRow{{$order->id}}">
                                    <td>{{++$key}}</td>
                                    <td>{{$order->product_name}}</td>
                                    <td>{{$order->rate}}</td>
                                    <td>{{$order->quantity}}</td>
                                     <td>
                                         {{-- <select class="form-select  select2 @error('orderBy') is-invalid @enderror"
                                                    name=""> --}}
                                                    {{-- <option selected disable hidden value="Select Customer">Select Customer </option> --}}
                                                    {{-- @foreach ($users as $user)
                                                        <option value="" class="w-75"> {{$user->name}}</option>
                                                    @endforeach
                                                </select> --}}
                                                <select class="form-select select2 itemStatus" data-id="{{ $order->id }}"
                                                    id="status{{ $order->id }}" name="status{{ $order->id }}">
                                                    @foreach ($users as $user)
                                                        <option value="{{$user->id}}" @if ( $order->status == $user->id) {{ 'selected' }} @endif>{{ $user->name }} (@foreach ($user->roles as $role) {{ $role->name }}  @endforeach)</option>
                                                    @endforeach
                                                </select>
                                    </td>
                                    <td>
                                        @if(hasPermission('measurement',2))
                                        <a href="{{route('measurement.order', $order->id)}}" class="text-primary" data-toggle="tooltip" data-placement="top" title="Measurement"><i class="fas fa-scissors"></i></a> |
                                        @endif
                                        @if(hasPermission('order',2))
                                        <a href="{{ route('image.order', $order->id) }}" class="text-success" data-toggle="tooltip" data-placement="top" title="upload"><i class="fas fa-upload"></i></a> 
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Product Name</th>
                                    <th>Rate</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
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
