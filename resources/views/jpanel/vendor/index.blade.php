@extends('jpanel.layouts.app')
@section('title')
    Vendor
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 flash-message">
            <div class="col-sm-3">
                <h1>Vendor</h1>
            </div>
            <div class="col-6 messageArea">
                @include('jpanel/flash-message')
            </div>
            <div class="col-sm-3">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Vendors List</li>
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
                        <h3 class="card-title">Vendor List</h3>
                        <div class="card-tools">
                            @if(hasPermission('vendors',1))
                            <a href="{{route('create.vendors')}}" class="btn btn-sm btn-secondary">
                                <i class="fas fa-plus-square"></i> Add New Vendor
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
                        <table class="table table-bordered table-hover" id="vendorDataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Number</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($vendors as $key =>$vendor)

                                <tr class="dataRow{{$vendor->users->id}}">
                                    <td>{{++$key}}</td>
                                    <td>{{$vendor->users->name}}</td>
                                    <td>{{$vendor->users->email}}</td>
                                    <td>{{$vendor->users->phone}}</td>
                                    <td>
                                        @if(hasPermission('vendors',2))
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input data-id="{{$vendor->users->id}}" type="checkbox" class="custom-control-input vendorStatus" id="status{{$vendor->users->id}}" name="status{{$vendor->users->id}}" {{ $vendor->users->status ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="status{{$vendor->users->id}}"></label>
                                        </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if(hasPermission('vendors',2))
                                        <a href="{{ route('view.vendor',$vendor->id) }}" class="text-success" data-toggle="tooltip" data-placement="top" title="View"><i class="fas fa-eye"></i></a> |
                                        @endif
                                        @if(hasPermission('vendors',3))
                                        <a href="{{ route('edit.vendor',$vendor->id) }}" class="text-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a> |
                                        @endif
                                        @if(hasPermission('vendors',4))
                                        <a href="javascript:void(0)" data-id="{{$vendor->users->id}}" class="text-danger delete" id="delete{{$vendor->users->id}}" name="delete{{$vendor->users->id}}" data-toggle="tooltip" data-placement="top" title="Trash"><i class="fas fa-trash"></i></a>
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
    @include('jpanel.vendor.ajax')
@endsection
