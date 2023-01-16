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
                                        </select>
                                        @if ($errors->has('country'))
                                            <div class="text-danger">{{ $errors->first('country') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="state">State</label>
                                        <select
                                            class="form-control form-control-sm select2 @error('state') is-invalid @enderror"
                                            name="state">
                                            <option value="">Select State</option>
                                            <option value="AN" @if ($customers->state == "AN") {{ 'selected' }} @endif>Andaman and Nicobar Islands</option>
                                            <option value="AP" @if ($customers->state == "AP") {{ 'selected' }} @endif>Andhra Pradesh</option>
                                            <option value="AR" @if ($customers->state == "AR") {{ 'selected' }} @endif>Arunachal Pradesh</option>
                                            <option value="AS" @if ($customers->state == "AS") {{ 'selected' }} @endif>Assam</option>
                                            <option value="BR" @if ($customers->state == "BR") {{ 'selected' }} @endif>Bihar</option>
                                            <option value="CH" @if ($customers->state == "CH") {{ 'selected' }} @endif>Chandigarh</option>
                                            <option value="CT" @if ($customers->state == "CT") {{ 'selected' }} @endif>Chhattisgarh</option>
                                            <option value="DN" @if ($customers->state == "DN") {{ 'selected' }} @endif>Dadra and Nagar Haveli</option>
                                            <option value="DD" @if ($customers->state == "DD") {{ 'selected' }} @endif>Daman and Diu</option>
                                            <option value="DL" @if ($customers->state == "DL") {{ 'selected' }} @endif>Delhi</option>
                                            <option value="GA" @if ($customers->state == "GA") {{ 'selected' }} @endif>Goa</option>
                                            <option value="GJ" @if ($customers->state == "GJ") {{ 'selected' }} @endif selected>Gujarat</option>
                                            <option value="HR" @if ($customers->state == "HR") {{ 'selected' }} @endif>Haryana</option>
                                            <option value="HP" @if ($customers->state == "HP") {{ 'selected' }} @endif>Himachal Pradesh</option>
                                            <option value="JK" @if ($customers->state == "JK") {{ 'selected' }} @endif>Jammu and Kashmir</option>
                                            <option value="JH" @if ($customers->state == "JH") {{ 'selected' }} @endif>Jharkhand</option>
                                            <option value="KA" @if ($customers->state == "KA") {{ 'selected' }} @endif>Karnataka</option>
                                            <option value="KL" @if ($customers->state == "KL") {{ 'selected' }} @endif>Kerala</option>
                                            <option value="LA" @if ($customers->state == "LA") {{ 'selected' }} @endif>Ladakh</option>
                                            <option value="LD" @if ($customers->state == "LD") {{ 'selected' }} @endif>Lakshadweep</option>
                                            <option value="MP" @if ($customers->state == "MP") {{ 'selected' }} @endif>Madhya Pradesh</option>
                                            <option value="MH" @if ($customers->state == "MH") {{ 'selected' }} @endif>Maharashtra</option>
                                            <option value="MN" @if ($customers->state == "MN") {{ 'selected' }} @endif>Manipur</option>
                                            <option value="ML" @if ($customers->state == "ML") {{ 'selected' }} @endif>Meghalaya</option>
                                            <option value="MZ" @if ($customers->state == "MZ") {{ 'selected' }} @endif>Mizoram</option>
                                            <option value="NL" @if ($customers->state == "NL") {{ 'selected' }} @endif>Nagaland</option>
                                            <option value="OR" @if ($customers->state == "OR") {{ 'selected' }} @endif>Odisha</option>
                                            <option value="PY" @if ($customers->state == "PY") {{ 'selected' }} @endif>Puducherry</option>
                                            <option value="PB" @if ($customers->state == "PB") {{ 'selected' }} @endif>Punjab</option>
                                            <option value="RJ" @if ($customers->state == "RJ") {{ 'selected' }} @endif>Rajasthan</option>
                                            <option value="SK" @if ($customers->state == "SK") {{ 'selected' }} @endif>Sikkim</option>
                                            <option value="TN" @if ($customers->state == "TN") {{ 'selected' }} @endif>Tamil Nadu</option>
                                            <option value="TG" @if ($customers->state == "TG") {{ 'selected' }} @endif>Telangana</option>
                                            <option value="TR" @if ($customers->state == "TR") {{ 'selected' }} @endif>Tripura</option>
                                            <option value="UP" @if ($customers->state == "UP") {{ 'selected' }} @endif>Uttar Pradesh</option>
                                            <option value="UT" @if ($customers->state == "UT") {{ 'selected' }} @endif>Uttarakhand</option>
                                            <option value="WB" @if ($customers->state == "WB") {{ 'selected' }} @endif>West Bengal</option>
                                        </select>
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
