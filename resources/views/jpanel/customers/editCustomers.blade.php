@extends('jpanel.layouts.app')
@section('title')
    Edit New Customer
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Customer - {{ $customers->id }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('list.customers') }}">View customers</a></li>
                        <li class="breadcrumb-item active">Edit customer</li>
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
                                <h3 class="card-title">New Customer Add Form</h3>
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
                                        <label for="name">First Name</label>
                                        <input type="text"
                                            class="form-control form-control-sm @error('customerfName') is-invalid @enderror"
                                            id="customerfName" name="customerfName" placeholder="Enter first Name" value="{{ $customers->users->name }}">
                                        @if ($errors->has('customerfName'))
                                            <div class="text-danger">{{ $errors->first('customerfName') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="name">Last Name</label>
                                        <input type="text"
                                            class="form-control form-control-sm @error('customerlName') is-invalid @enderror"
                                            id="customerlName" name="customerlName" placeholder="Enter Last Name" value="{{ $customers->users->name }}">
                                        @if ($errors->has('customerlName'))
                                            <div class="text-danger">{{ $errors->first('customerlName') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="name">Phone</label>
                                        <input type="text"
                                            class="form-control form-control-sm @error('phone') is-invalid @enderror"
                                            id="phone" name="phone" placeholder="Enter Phone Number" value="{{ $customers->users->phone}}">
                                        @if ($errors->has('phone'))
                                            <div class="text-danger">{{ $errors->first('phone') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email"
                                            class="form-control form-control-sm @error('email') is-invalid @enderror"
                                            id="email" name="email" placeholder="Enter email" value="{{  $customers->email }}">
                                        @if ($errors->has('email'))
                                            <div class="text-danger">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="country">Country</label>
                                        <select
                                            class="form-control form-control-sm select2 @error('country') is-invalid @enderror"
                                            name="country" value={{ old('country') }}>
                                            <option value="">Select Country</option>
                                            <option value="India" @if ($customers->country == "India") {{ 'selected' }} @endif selected>India</option>
                                            <option value="America" @if ($customers->country == 'America') {{ 'selected' }} @endif >America<option>
                                            <option value="Australia" @if ($customers->country == 'Australia') {{ 'selected' }} @endif >Australia<option>
                                            <option value="Denmark" @if ($customers->country == 'Denmark') {{ 'selected' }} @endif >Denmark<option>
                                            <option value="Denmark" @if ($customers->country == 'Denmark') {{ 'selected' }} @endif >Denmark<option>
                                            <option value="Malaysia" @if ($customers->country == 'Malaysia') {{ 'selected' }} @endif >Malaysia<option>
                                            <option value="Taiwan" @if ($customers->country == 'Taiwan') {{ 'selected' }} @endif >Taiwan<option>
                                            <option value="United Kingdom" @if ($customers->country == 'United Kingdom') {{ 'selected' }} @endif >United Kingdom<option>
                                        </select>
                                        @if ($errors->has('country'))
                                            <div class="text-danger">{{ $errors->first('country') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="state">State</label>
                                        <input type="text"
                                              class="form-control form-control-sm @error('state') is-invalid @enderror"
                                              id="state" name="state" placeholder="Enter state Name"
                                              value={{ $customers->state }}>
                                        @if ($errors->has('state'))
                                            <div class="text-danger">{{ $errors->first('state') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="city">City</label>
                                        <input type="text"
                                            class="form-control form-control-sm @error('city') is-invalid @enderror"
                                            id="city" name="city" placeholder="Enter City Name" value="{{ $customers->city }}">
                                        @if ($errors->has('city'))
                                            <div class="text-danger">{{ $errors->first('city') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="country">Address 1</label>
                                        <input type="text"
                                            class="form-control form-control-sm @error('address1') is-invalid @enderror"
                                            id="address1" name="address1" placeholder="Enter Address" value="{{ $customers->address1 }}">
                                        @if ($errors->has('address1'))
                                            <div class="text-danger">{{ $errors->first('address1') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="country">Address 2</label>
                                        <input type="text"
                                            class="form-control form-control-sm @error('address2') is-invalid @enderror"
                                            id="address2" name="address2" placeholder="Enter Address" value="{{ $customers->address2 }}">
                                        @if ($errors->has('address2'))
                                            <div class="text-danger">{{ $errors->first('address2') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="country">Zipcode</label>
                                        <input type="text"
                                            class="form-control form-control-sm @error('zipcode') is-invalid @enderror"
                                            id="zipcode" name="zipcode" placeholder="Enter Zip Code" value="{{ $customers->zipcode }}">
                                        @if ($errors->has('zipcode'))
                                            <div class="text-danger">{{ $errors->first('zipcode') }}</div>
                                        @endif
                                    </div>
                                </div>
                               
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="hidden" name="user_id" value="{{ $customers->user_id }}">
                                <button type="submit" class="btn btn-secondary btn-block">Submit <i
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
    <!-- /.content -->
@endsection

@section('scripts')
    @include('jpanel.customers.ajax')
@endsection
