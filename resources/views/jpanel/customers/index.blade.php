@extends('jpanel.layouts.app')
@section('title')
    Customer
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 flash-message">
            <div class="col-sm-3">
                <h1>Customer</h1>
            </div>
            <div class="col-6 messageArea">
                @include('jpanel/flash-message')
            </div>
            <div class="col-sm-3">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Customer List</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="row">
            @if(hasPermission('customers',2))
            <div class="col-12">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Customer List</h3>
                        <div class="card-tools">
                            @if(hasPermission('customers',1))
                            <a href="{{route('create.customers')}}" class="btn btn-sm btn-secondary">
                                <i class="fas fa-plus-square"></i> Add New Customer
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
                        <table class="table table-bordered table-hover" id="customerDataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Number</th>
                                    <th>city</th>
                                    <th>state</th>
                                    <th>country</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($customers as $key =>$customer)

                                <tr class="dataRow{{$customer->users->id}}">
                                    <td>{{++$key}}</td>
                                    <td>{{$customer->users->name}}</td>
                                    <td>{{$customer->users->email}}</td>
                                    <td>{{$customer->number}}</td>
                                    <td>{{$customer->city}}</td>
                                    <td>{{$customer->state}}</td>
                                    <td>{{$customer->country}}</td>
                                    <td>
                                        @if(hasPermission('customers',2))
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input data-id="{{$customer->users->id}}" type="checkbox" class="custom-control-input customerStatus" id="status{{$customer->users->id}}" name="status{{$customer->users->id}}" {{ $customer->users->status ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="status{{$customer->users->id}}"></label>
                                        </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if(hasPermission('customers',2))
                                        <a href="{{ route('view.customers',$customer->id) }}" class="text-success" data-toggle="tooltip" data-placement="top" title="View"><i class="fas fa-eye"></i></a> |
                                        @endif
                                        @if(hasPermission('customers',3))
                                        <a href="{{ route('edit.customers',$customer->id) }}" class="text-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a> |
                                        @endif
                                        @if(hasPermission('customers',4))
                                        <a href="javascript:void(0)" data-id="{{$customer->users->id}}" class="text-danger delete" id="delete{{$customer->users->id}}" name="delete{{$customer->users->id}}" data-toggle="tooltip" data-placement="top" title="Trash"><i class="fas fa-trash"></i></a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Number</th>
                                    <th>city</th>
                                    <th>state</th>
                                    <th>country</th>
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
    @include('jpanel.customers.ajax')
@endsection
