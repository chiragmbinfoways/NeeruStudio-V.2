  @extends('jpanel.layouts.app')
  @section('title')
      Add New Customer
  @endsection

  @section('content')
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Add New Customer</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                          <li class="breadcrumb-item"><a href="{{ route('list.customers') }}">View Customer</a></li>
                          <li class="breadcrumb-item active">Add Customer</li>
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
                      <form action="{{ route('add.customers') }}" method="post">
                          @csrf

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
                                              class="form-control form-control-sm @error('customerName') is-invalid @enderror"
                                              id="fname" name="customerfName" placeholder="Enter Name"
                                              value={{ old('customerfName') }}>
                                          @if ($errors->has('customerfName'))
                                              <div class="text-danger">{{ $errors->first('customerfName') }}</div>
                                          @endif
                                      </div>
                                      <div class="col-md-6 mb-3">
                                          <label for="name">Last Name</label>
                                          <input type="text"
                                              class="form-control form-control-sm @error('customerName') is-invalid @enderror"
                                              id="lname" name="customerlName" placeholder="Enter Name"
                                              value={{ old('customerlName') }}>
                                          @if ($errors->has('customerlName'))
                                              <div class="text-danger">{{ $errors->first('customerlName') }}</div>
                                          @endif
                                      </div>
                                      {{-- <div class="col-md-4 mb-3">
                                        <label for="name">User Name</label>
                                        <input type="text"
                                            class="form-control form-control-sm @error('username') is-invalid @enderror"
                                            id="username" name="username" placeholder="Enter User Name" value={{ old('username') }}>
                                        @if ($errors->has('username'))
                                            <div class="text-danger">{{ $errors->first('username') }}</div>
                                        @endif
                                     </div>
                                     <div class="col-md-4 mb-3">
                                        <label for="name">Password</label>
                                        <input type="password"
                                            class="form-control form-control-sm @error('password') is-invalid @enderror"
                                            id="password" name="password" placeholder="Enter Password" value={{ old('password') }}>
                                        @if ($errors->has('password'))
                                            <div class="text-danger">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div> --}}
                                  </div>
                                  <div class="form-group">
                                      <div class="form-row">
                                          <div class="col-md-6 mb-3">
                                              <label for="name">Phone</label>
                                              <input type="text"
                                                  class="form-control form-control-sm @error('phone') is-invalid @enderror"
                                                  id="phone" name="phone" placeholder="Enter Phone Number"
                                                  value={{ old('phone') }}>
                                              @if ($errors->has('phone'))
                                                  <div class="text-danger">{{ $errors->first('phone') }}</div>
                                              @endif
                                          </div>
                                          <div class="col-md-6 mb-3">
                                              <label for="exampleInputEmail1">Email address</label>
                                              <input type="email"
                                                  class="form-control form-control-sm @error('email') is-invalid @enderror"
                                                  id="email" name="email" placeholder="Enter email"
                                                  value={{ old('email') }}>
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
                                                  <option value="India" @if (old('country') == 'India') {{ 'selected' }} @endif selected>India<option>
                                                  <option value="America" @if (old('country') == 'America') {{ 'selected' }} @endif >America<option>
                                                  <option value="Australia" @if (old('country') == 'Australia') {{ 'selected' }} @endif >Australia<option>
                                                  <option value="Denmark" @if (old('country') == 'Denmark') {{ 'selected' }} @endif >Denmark<option>
                                                  <option value="Denmark" @if (old('country') == 'Denmark') {{ 'selected' }} @endif >Denmark<option>
                                                  <option value="Malaysia" @if (old('country') == 'Malaysia') {{ 'selected' }} @endif >Malaysia<option>
                                                  <option value="Taiwan" @if (old('country') == 'Taiwan') {{ 'selected' }} @endif >Taiwan<option>
                                                  <option value="United Kingdom" @if (old('country') == 'United Kingdom') {{ 'selected' }} @endif >United Kingdom<option>
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
                                              value={{ old('state') }}>
                                              @if ($errors->has('state'))
                                                  <div class="text-danger">{{ $errors->first('state') }}</div>
                                              @endif
                                          </div>
                                          <div class="col-md-4 mb-3">
                                              <label for="city">City</label>
                                              <input type="text"
                                                  class="form-control form-control-sm @error('city') is-invalid @enderror"
                                                  id="city" name="city" placeholder="Enter City Name"
                                                  value={{ old('city') }}>
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
                                                  id="address1" name="address1" placeholder="Enter Address"
                                                  value={{ old('address1') }}>
                                              @if ($errors->has('address1'))
                                                  <div class="text-danger">{{ $errors->first('address1') }}</div>
                                              @endif
                                          </div>

                                          <div class="col-md-4 mb-3">
                                              <label for="country">Address 2</label>
                                              <input type="text"
                                                  class="form-control form-control-sm @error('address2') is-invalid @enderror"
                                                  id="address2" name="address2" placeholder="Enter Address"
                                                  value={{ old('address2') }}>
                                              @if ($errors->has('address2'))
                                                  <div class="text-danger">{{ $errors->first('address2') }}</div>
                                              @endif
                                          </div>

                                          <div class="col-md-4 mb-3">
                                              <label for="country">Zipcode</label>
                                              <input type="text"
                                                  class="form-control form-control-sm @error('zipcode') is-invalid @enderror"
                                                  id="zipcode" name="zipcode" placeholder="Enter Zip Code"
                                                  value={{ old('zipcode') }}>
                                              @if ($errors->has('zipcode'))
                                                  <div class="text-danger">{{ $errors->first('zipcode') }}</div>
                                              @endif
                                          </div>
                                      </div>
                                      <div class="form-row">
                                          <div class="col-md-4">
                                              <label for="country">Reference (Optional)</label>
                                              <input type="text"
                                                  class="form-control form-control-sm @error('reference') is-invalid @enderror"
                                                  id="reference" name="reference" placeholder="Enter Reference"
                                                  value={{ old('reference') }}>
                                              @if ($errors->has('reference'))
                                                  <div class="text-danger">{{ $errors->first('reference') }}</div>
                                              @endif
                                          </div>
                                      </div>
                                  </div>
                                  <!-- /.card-body -->
                                  <div class="card-footer">
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
