@extends('jpanel.layouts.app')
@section('title')
    Dashboard
@endsection

@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Layout</a></li>
                    <li class="breadcrumb-item active">Dashboard</li> --}}
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    @if (hasPermission('dashboard', 1))
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Default box -->

                        <div class="card">
                            {{-- <div class="card-header">
                        <h3 class="card-title">Dashboard</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div> --}}
                            {{-- <div class="card-body">
                        Start creating your amazing application!
                        Role Permission = {{hasPermission('roles',1)}} - {{ getModuleId('roles') }}
                    </div> --}}
                            <div class="row">
                                @if (hasAnyOnePermission('order'))
                                    <div class="col-md-3 col-sm-6 col-12">
                                        <div class="small-box bg-info bg-primary">
                                            <div class="inner">
                                                <h3>{{ $totalOrder }}</h3>
                                                <p>Orders</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-shopping-cart"></i>
                                            </div>
                                            <a href="{{ route('list.order') }}" class="small-box-footer">
                                                Manage Orders <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                                @if (hasAnyOnePermission('customers'))
                                    <div class="col-md-3 col-sm-6 col-12">
                                        <div class="small-box bg-warning">
                                            <div class="inner">
                                                <h3>{{ $totalCustomers }}</h3>
                                                <p>Customers</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-users"></i>
                                            </div>
                                            <a href="{{ route('list.customers') }}" class="small-box-footer">
                                                Manage Customers <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                                @if (hasAnyOnePermission('order'))
                                    <div class="col-md-3 col-sm-6 col-12">
                                        <div class="small-box bg-success">
                                            <div class="inner">
                                                <h3>{{ $grandtotal }}</h3>
                                                <p>Total Amount</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-money"></i>
                                            </div>
                                            <a href="" class="small-box-footer">
                                                Total Amount <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                @endif
                            </div>
                            @if (hasAnyOnePermission('order'))
                                <div class="col-md-3 col-sm-6 col-12">
                                    <div class="small-box  bg-danger">
                                        <div class="inner">
                                            <h3>{{ $pendingAmount }}</h3>
                                            <p>Pending Amount</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-exclamation-circle"></i>
                                        </div>
                                        <a href="" class="small-box-footer">
                                            Pending Amount <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            @endif


                        </div>
                    </div>

                    {{-- table  --}}

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Pending Amount</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered table-hover " id="Orderdatatable">
                                <thead>
                                    <tr>
                                        <th> No </th>
                                        <th> Order No</th>
                                        <th> Name</th>
                                        <th>Pending </th>
                                        <th>products</th>


                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($pending as $key => $pending)
                                        <tr class="dataRow{{ $pending->id }}">
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $pending->order_no }}</td>
                                            <td>{{ $pending->customer_name }}</td>
                                            <td>{{ $pending->total_amt - $pending->advance_amt }}</td>
                                            <td>{{ $pending->num_products }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">

                        </div>
                        <!-- /.card-footer-->

                    </div>
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Upcoming deliveries</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered table-hover" id="Orderdatatable">
                                <thead>
                                    <tr>
                                        <th> No </th>
                                        <th> Delivery </th>
                                        <th> Order No</th>
                                        <th> Customer Name</th>
                                        <th> Phone Number</th>
                                        <th> Payment</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($delivery as $key => $delivery)
                                        <tr class="dataRow{{ $delivery->id }}">
                                            <td>{{ ++$key }}</td>
                                            <td>{{ getFormatedDate($delivery->delivery_date, 'd/m/Y') }}</td>
                                            <td>{{ $delivery->order_no }}</td>
                                            <td>{{ $delivery->customer_name }}</td>
                                            <td>{{ $delivery->customers->number }}</td>
                                            <td>
                                                @if ($delivery->status == '0')
                                                    <p class="text-danger">Pending</p>
                                                @endif
                                                @if ($delivery->status == '1')
                                                    <p class="text-success">Done</p>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">

                        </div>
                        <!-- /.card-footer-->

                    </div>



                </div>
            </div>
            </div>
        </section>
    @endif
    <!-- /.content -->
@endsection
@section('scripts')
    @include('jpanel.orders.ajax')
@endsection

