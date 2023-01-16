@extends('jpanel.layouts.app')
@section('title')
    Product List
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 flash-message">
                <div class="col-sm-3">
                    <h1>Product List</h1>
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
                @if (hasPermission('measurement', 2))
                    <div class="col-12">
                        <!-- Default box -->
                        <div class="card">
                            <div class="card-header">
                                {{-- <h3 class="card-title">Product List</h3> --}}
                                <div class="card-tools">
                                    {{-- @if (hasPermission('order', 1))
                            <a href="{{route('create.order')}}" class="btn btn-sm btn-secondary">
                                <i class="fas fa-plus-square"></i> Add New Order
                            </a>
                            @endif --}}
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
                                <table class="table table-bordered table-hover" id="orderDataTable">
                                    <thead>

                                        <th>No</th>
                                        <th>Order No</th>
                                        <th>Customer Name</th>
                                        <th>Product Name</th>
                                        <th>Status</th>
                                        <th>Work Status</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($products as $key => $products)
                                        <tr class="dataRow{{ $products->id }}">
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $products->order->order_no }}</td>
                                            <td>{{ $products->order->customer_name }}</td>
                                            <td>{{ $products->product_name }}</td>
                                            <td>
                                                @if (hasPermission('measurement', '3'))
                                                    <select class="form-select select2 itemStatus" data-user="{{ $products->status }}"
                                                        data-id="{{ $products->id }}" id="status{{ $products->id }}"
                                                        name="status{{ $products->id }}">
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}"
                                                                @if ($products->status == $user->id) {{ 'selected' }} @endif>
                                                                {{ $user->name }} (@foreach ($user->roles as $role) {{ $role->name }}
                                                                @endforeach)</option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <p>-</p>
                                                @endif

                                            </td>
                                            <td>
                                                @foreach ($myItem as $item)
                                                
                                                    @if ($products->id == $item->order_detail_id)
                                                    
                                                        @if (hasPermission('measurement', 2))
                                                        <label class="">{{$item->users->name}}</label>
                                                            <div
                                                            
                                                                class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                                <input data-id="{{ $item->id }}" type="checkbox" class="custom-control-input task_Status" id="task_Status{{ $item->id }}"  name="task_Status{{ $item->id }}"  {{ $item->status ? 'checked' : '' }}>  
                                                                <label class="custom-control-label"
                                                                    for="task_Status{{ $item->id }}"></label>
                                                            </div>
                                                          
                                                        @endif
                                                    @endif
                                                    {{-- {{$item->id}}
                                                    {{$task->order_detail_id}}
                                                    {{$task->status}} --}}
                                                @endforeach

                                            </td>
                                            <td>
                                                @if (hasPermission('measurement', 3))
                                                    <a href="{{ route('measurement.order', $products->id) }}"
                                                        class="text-primary" data-toggle="tooltip" data-placement="top"
                                                        title="Measurement"><i class="fas fa-scissors"></i></a> |
                                                @endif
                                                @if(hasPermission('measurement',2))
                                                <a href="{{ route('image.order', $products->id) }}" class="text-success" data-toggle="tooltip" data-placement="top" title="upload"><i class="fas fa-upload"></i></a> 
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Order No</th>
                                            <th>Customer Name</th>
                                            <th>Product Name</th>
                                            <th>Status</th>
                                            <th>Work Status</th>
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
