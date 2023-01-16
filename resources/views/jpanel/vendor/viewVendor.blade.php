@extends('jpanel.layouts.app')
@section('title')
{{ $vendor->users->name }} | Vendor Detail
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Vendor - {{ $vendor->users->name }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('list.users') }}">View Vendor</a></li>
                        <li class="breadcrumb-item active">Vendor Details</li>
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
                    <form action="{{ route('update.vendor',$vendor->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">New Vendor Add Form</h3>
                                <div class="card-tools">
                                    <a href="{{ route('list.vendors') }}" class="btn btn-sm btn-secondary">
                                        <i class="fas fa-eye"></i> View All Vendor
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
                                    <h5 for="name">Vendor Personal Details</h5>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="name">Full Name: </label>
                                        {{ $vendor->users->name }}
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="name">User Name: </label>
                                        {{ $vendor->users->username }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5 for="name">Vendor Company Details</h5>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="name">Company Name: </label>
                                        {{ $vendor->company_name }}
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="name">Phone: </label>
                                        {{ $vendor->users->phone}}
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="exampleInputEmail1">Email address: </label>
                                        {{  $vendor->users->email }}
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="country">Country: </label>
                                       {{ $vendor->country }}
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="state">State: </label>
                                        {{ $vendor->state }}
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="city">City: </label>
                                        {{ $vendor->city }}
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="address1">Address 1: </label>
                                        {{ $vendor->address1 }}
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="address2">Address 2: </label>
                                        {{ $vendor->address2 }}
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="Zipcode">Zip Code: </label>
                                        {{ $vendor->zipcode }}
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="panNo">Pan No: </label>
                                        {{ $vendor->panNo }}
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="gstNo">GST No: </label>
                                        {{ $vendor->gstNo  }}
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="websiteLink">Website Link: </label>
                                        {{ $vendor->websiteLink }}
                                    </div>
                                </div>



                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">

                            </div>
                            <!-- /.card-footer-->

                        </div>
                        <!-- /.card -->
                    </form>

                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
    @include('jpanel.vendor.ajax')
@endsection
