@extends('jpanel.layouts.app')
@section('title')
{{ $customers->users->name }} | Customer Detail
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Customer - {{ $customers->users->name }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('list.customers') }}">View Customers</a></li>
                        <li class="breadcrumb-item active">Customers Details</li>
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
                    <form action="{{ route('update.customers',$customers->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header">
                                
                                <div class="card-tools">
                                    <a href="{{ route('list.customers') }}" class="btn btn-sm btn-secondary">
                                        <i class="fas fa-eye"></i> View All Customers
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
                                    <h5 for="name">Customer Personal Details</h5>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name">First Name: </label>
                                        {{ $customers->users->name }}
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="name">Last Name: </label>
                                        {{ $customers->users->name }}
                                    </div>
                                </div>
                                <div class="form-row">
                                   
                                    <div class="col-md-6 mb-3">
                                        <label for="name">Phone: </label>
                                        {{ $customers->users->phone}}
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="exampleInputEmail1">Email address: </label>
                                        {{  $customers->users->email }}
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="country">Country: </label>
                                       {{ $customers->country }}
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="state">State: </label>
                                        {{ $customers->state }}
                                    </div>
                                  
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="city">City: </label>
                                        {{ $customers->city }}
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="address1">Address 1: </label>
                                        {{ $customers->address1 }}
                                    </div>
                                </div>  
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="address2">Address 2: </label>
                                        {{ $customers->address2 }}
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="Zipcode">Zip Code: </label>
                                        {{ $customers->zipcode }}
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
    @include('jpanel.customers.ajax')
@endsection
