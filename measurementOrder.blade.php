@extends('jpanel.layouts.app')
@section('title')
    Measurement
@endsection

@section('content')
    @if ($measurementStatus == 'old')
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
                            <li class="breadcrumb-item active">Measurement</li>
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
                                    <h3 class="card-title">Measurement Details </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove"
                                            title="Remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <form action="{{ route('measurement.update.order') }}" method="post">
                                        @csrf
                                        <div class="form-row mt-4">
                                            {{-- <div class="col-md-12 mb-3">
                               {{-- <big class=" ">Product Name :</big> --}}
                                            {{-- <span class="font-weight-bold"> {{$detail_id->product_name}}</span> --}}
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            {{-- <big  class="">Quantity :</big> --}}
                                            {{-- <span class="font-weight-bold">20</span> 
                            </div> --}}
                                        </div>
                                        <div class="form-row ">
                                            <div class="form-group col-md-6">
                                                <h5 for="name" class="underlined">Blowse(બ્લાઉસ)</h5>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Shoulder (ખભો)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm  @error('Shoulder') is-invalid @enderror"
                                                    id="Shoulder" name="Shoulder" placeholder="Enter Shoulder"
                                                    value="{{ !! $ordercheck->shoulder !! }}">
                                                <input type="text"
                                                    class="form-control form-control-sm d-none   @error('Shoulder') is-invalid @enderror"
                                                    id="Shoulder" name="orderDetailId" placeholder="Enter Shoulder"
                                                    value="{{ $ordercheck->id }}">
                                                @if ($errors->has('Shoulder'))
                                                    <div class="text-danger">{{ $errors->first('Shoulder') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Length (લંબાઈ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('length') is-invalid @enderror"
                                                    id="length" name="length" placeholder="Enter Length"
                                                    value={{ $ordercheck->length_1 }}>
                                                @if ($errors->has('length1'))
                                                    <div class="text-danger">{{ $errors->first('length') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Mori (મોરી)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('mori') is-invalid @enderror"
                                                    id="mori" name="mori" placeholder="Enter Mori"
                                                    value={{ $ordercheck->mori }}>
                                                @if ($errors->has('mori'))
                                                    <div class="text-danger">{{ $errors->first('mori') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Length (લંબાઈ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('length') is-invalid @enderror"
                                                    id="length" name="length2" placeholder="Enter Length"
                                                    value={{ $ordercheck->length_2 }}>
                                                @if ($errors->has('length'))
                                                    <div class="text-danger">{{ $errors->first('length') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Chest (છાતી)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('chest') is-invalid @enderror"
                                                    id="chest" name="chest" placeholder="Enter Chest"
                                                    value={{ $ordercheck->chest }}>
                                                @if ($errors->has('chest'))
                                                    <div class="text-danger">{{ $errors->first('chest') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Front Neck (ગળું આ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('frontNeck') is-invalid @enderror"
                                                    id="frontNeck" name="frontNeck" placeholder="Enter Front"
                                                    value={{ $ordercheck->front_neck }}>
                                                @if ($errors->has('frontNeck'))
                                                    <div class="text-danger">{{ $errors->first('frontNeck') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Waist (કમર)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('chest') is-invalid @enderror"
                                                    id="chest" name="waist" placeholder="Enter Waist"
                                                    value={{ $ordercheck->waist }}>
                                                @if ($errors->has('chest'))
                                                    <div class="text-danger">{{ $errors->first('chest') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Back Neck (ગળું પા)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('backNeck') is-invalid @enderror"
                                                    id="backNeck" name="backNeck" placeholder="Enter Back"
                                                    value={{ $ordercheck->back_neck }}>
                                                @if ($errors->has('backNeck'))
                                                    <div class="text-danger">{{ $errors->first('backNeck') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Chest Up (છાતી અપ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('chestUp') is-invalid @enderror"
                                                    id="chest" name="chestUp" placeholder="Enter Chest Up"
                                                    value={{ $ordercheck->chest_up }}>
                                                @if ($errors->has('chestUp'))
                                                    <div class="text-danger">{{ $errors->first('chestUp') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">

                                            <div class="col-md-3 mb-3">
                                                <label for="name">Mundo (મુંડો)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('mundo') is-invalid @enderror"
                                                    id="mundo" name="mundo" placeholder="Enter Mundo"
                                                    value={{ $ordercheck->mundo }}>
                                                @if ($errors->has('mundo'))
                                                    <div class="text-danger">{{ $errors->first('mundo') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Other(અન્ય)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('other') is-invalid @enderror"
                                                    id="other" name="other" placeholder="Enter other measurement"
                                                    value={{ $ordercheck->other }}>
                                                @if ($errors->has('other'))
                                                    <div class="text-danger">{{ $errors->first('other') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row mt-5">
                                            <div class="form-group col-md-6">
                                                <h5 for="name" class="underlined">Petticoat(ચણીયો)</h5>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Length (લંબાઈ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('length') is-invalid @enderror"
                                                    id="length" name="length_Peticoat" placeholder="Enter Length"
                                                    value={{ $ordercheck->length_peticoat }}>
                                                @if ($errors->has('length'))
                                                    <div class="text-danger">{{ $errors->first('length') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Nefo (નેફો)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('nefo') is-invalid @enderror"
                                                    id="nafo" name="nefo" placeholder="Enter Nefo"
                                                    value={{ $ordercheck->nefo }}>
                                                @if ($errors->has('nefo'))
                                                    <div class="text-danger">{{ $errors->first('nefo') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">seat (સીટ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('seat') is-invalid @enderror"
                                                    id="seat" name="seat" placeholder="Enter seat"
                                                    value={{ $ordercheck->seat }}>
                                                @if ($errors->has('seat'))
                                                    <div class="text-danger">{{ $errors->first('seat') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Gher (ઘેર)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('gher') is-invalid @enderror"
                                                    id="gher" name="gher" placeholder="Enter Gher"
                                                    value={{ $ordercheck->gher }}>
                                                @if ($errors->has('gher'))
                                                    <div class="text-danger">{{ $errors->first('gher') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Kali (કળી)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('kadi') is-invalid @enderror"
                                                    id="kadi" name="kadi" placeholder="Enter Kali"
                                                    value={{ $ordercheck->kali }}>
                                                @if ($errors->has('kadi'))
                                                    <div class="text-danger">{{ $errors->first('kadi') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">other (અન્ય)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('kadi') is-invalid @enderror"
                                                    id="kadi" name="other_peticoat"
                                                    placeholder="Enter Oher Measurement"
                                                    value={{ $ordercheck->other_peticoat }}>
                                                @if ($errors->has('kadi'))
                                                    <div class="text-danger">{{ $errors->first('kadi') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row mt-5">
                                            <div class="form-group col-md-6">
                                                <h5 for="name" class="underlined">Additional Items</h5>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Huk :</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        @if ($ordercheck->huk == '1') {{ 'checked' }} @endif
                                                        name="huk" required id="hukYes" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Yes </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        @if ($ordercheck->huk == '0') {{ 'checked' }} @endif
                                                        required name="huk" id="hukNo" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                                @if ($errors->has('huk'))
                                                    <div class="text-danger">{{ $errors->first('huk') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Pad :</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        @if ($ordercheck->pad == '1') {{ 'checked' }} @endif
                                                        required name="pad" id="padYes" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Yes </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        @if ($ordercheck->pad == '0') {{ 'checked' }} @endif
                                                        required name="pad" id="padNo" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                                @if ($errors->has('pad'))
                                                    <div class="text-danger">{{ $errors->first('pad') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Sample :</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        @if ($ordercheck->sample == '1') {{ 'checked' }} @endif
                                                        name="sample" required id="sampleYes" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Yes </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        @if ($ordercheck->sample == '0') {{ 'checked' }} @endif
                                                        name="sample" required id="sampleNo" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                                @if ($errors->has('sample'))
                                                    <div class="text-danger">{{ $errors->first('sample') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Design :</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        @if ($ordercheck->design == '1') {{ 'checked' }} @endif
                                                        name="design" required id="designYes" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Yes </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        @if ($ordercheck->design == '0') {{ 'checked' }} @endif
                                                        name="design" required id="designNo" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                                @if ($errors->has('design'))
                                                    <div class="text-danger">{{ $errors->first('design') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    @if (hasPermission('measurement', 3))
                                        <button type="submit" class="btn btn-secondary btn-block">Update <i
                                                class="fas fa-angle-double-right"></i></button>
                                    @endif
                                </div>
                                <!-- /.card-footer-->
                            </div>
                            <!-- /.card -->
                        </div>
                        </form>
                    @endif
                </div>
            </div>
        </section>
    @endif
    @if ($measurementStatus == 'new')
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
                            <li class="breadcrumb-item active">Measurement</li>
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
                                    <h3 class="card-title">Measurement Details </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove"
                                            title="Remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <form action="{{ route('measurement.add.order') }}" method="post">
                                        @csrf
                                        <div class="form-row mt-4">
                                            {{-- <div class="col-md-12 mb-3">
                               {{-- <big class=" ">Product Name :</big> --}}
                                            {{-- <span class="font-weight-bold"> {{$detail_id->product_name}}</span> --}}
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            {{-- <big  class="">Quantity :</big> --}}
                                            {{-- <span class="font-weight-bold">20</span> 
                            </div> --}}
                                        </div>
                                        <div class="form-row ">
                                            <div class="form-group col-md-3">
                                                <h5 for="name" class="underlined">Blowse(બ્લાઉસ)</h5>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="checkbox" value="{{ $id }}" class="form-check-input" name="blowseCheck">
                                                <label class="form-check-label mt-1" for="blowse" >Same as previous</label>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Shoulder (ખભો)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm  @error('Shoulder') is-invalid @enderror"
                                                    id="shoulder" name="Shoulder" placeholder="Enter Shoulder"
                                                    value="">
                                                <input type="text"
                                                    class="form-control form-control-sm d-none  @error('Shoulder') is-invalid @enderror"
                                                     name="orderDetailId" placeholder="Enter Shoulder"
                                                    value="{{ $id }}">
                                                @if ($errors->has('Shoulder'))
                                                    <div class="text-danger">{{ $errors->first('Shoulder') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Length (લંબાઈ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('length') is-invalid @enderror"
                                                    id="length_1" name="length" placeholder="Enter Length"
                                                    value={{ old('length') }}>
                                                @if ($errors->has('length1'))
                                                    <div class="text-danger">{{ $errors->first('length') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Mori (મોરી)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('mori') is-invalid @enderror"
                                                    id="mori" name="mori" placeholder="Enter Mori"
                                                    value={{ old('mori') }}>
                                                @if ($errors->has('mori'))
                                                    <div class="text-danger">{{ $errors->first('mori') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Length (લંબાઈ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('length') is-invalid @enderror"
                                                    id="length_2" name="length2" placeholder="Enter Length"
                                                    value={{ old('length') }}>
                                                @if ($errors->has('length'))
                                                    <div class="text-danger">{{ $errors->first('length') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Chest (છાતી)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('chest') is-invalid @enderror"
                                                    id="chest" name="chest" placeholder="Enter Chest"
                                                    value={{ old('chest') }}>
                                                @if ($errors->has('chest'))
                                                    <div class="text-danger">{{ $errors->first('chest') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Front Neck (ગળું આ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('frontNeck') is-invalid @enderror"
                                                    id="front_neck" name="frontNeck" placeholder="Enter Front"
                                                    value={{ old('frontNeck') }}>
                                                @if ($errors->has('frontNeck'))
                                                    <div class="text-danger">{{ $errors->first('frontNeck') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Waist (કમર)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('chest') is-invalid @enderror"
                                                    id="waist" name="waist" placeholder="Enter Waist"
                                                    value={{ old('chest') }}>
                                                @if ($errors->has('chest'))
                                                    <div class="text-danger">{{ $errors->first('chest') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Back Neck (ગળું પા)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('backNeck') is-invalid @enderror"
                                                    id="back_neck" name="backNeck" placeholder="Enter Back"
                                                    value={{ old('backNeck') }}>
                                                @if ($errors->has('backNeck'))
                                                    <div class="text-danger">{{ $errors->first('backNeck') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Chest Up (છાતી અપ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('chestUp') is-invalid @enderror"
                                                    id="chest_up" name="chestUp" placeholder="Enter Chest Up"
                                                    value={{ old('chestUp') }}>
                                                @if ($errors->has('chestUp'))
                                                    <div class="text-danger">{{ $errors->first('chestUp') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">

                                            <div class="col-md-3 mb-3">
                                                <label for="name">Mundo (મુંડો)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('mundo') is-invalid @enderror"
                                                    id="mundo" name="mundo" placeholder="Enter Mundo"
                                                    value={{ old('mundo') }}>
                                                @if ($errors->has('mundo'))
                                                    <div class="text-danger">{{ $errors->first('mundo') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Other(અન્ય)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('other') is-invalid @enderror"
                                                    id="other" name="other" placeholder="Enter other measurement"
                                                    value={{ old('other') }}>
                                                @if ($errors->has('other'))
                                                    <div class="text-danger">{{ $errors->first('other') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row mt-5">
                                            <div class="form-group col-md-3">
                                                <h5 for="name" class="underlined">Petticoat(ચણીયો)</h5>
                                            </div>
                                            {{-- <div class="form-group col-md-3 ml-3">
                                                <input type="checkbox" class="form-check-input" name="peticoat">
                                                <label class="form-check-label mt-1" for="peticoat" >Same as previous</label>
                                            </div> --}}
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Length (લંબાઈ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('length') is-invalid @enderror"
                                                    id="length_peticoat" name="length_Peticoat" placeholder="Enter Length"
                                                    value={{ old('length') }}>
                                                @if ($errors->has('length'))
                                                    <div class="text-danger">{{ $errors->first('length') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Nefo (નેફો)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('nefo') is-invalid @enderror"
                                                    id="nefo" name="nefo" placeholder="Enter Nefo"
                                                    value={{ old('nefo') }}>
                                                @if ($errors->has('nefo'))
                                                    <div class="text-danger">{{ $errors->first('nefo') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">seat (સીટ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('seat') is-invalid @enderror"
                                                    id="seat" name="seat" placeholder="Enter seat"
                                                    value={{ old('seat') }}>
                                                @if ($errors->has('seat'))
                                                    <div class="text-danger">{{ $errors->first('seat') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Gher (ઘેર)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('gher') is-invalid @enderror"
                                                    id="gher" name="gher" placeholder="Enter Gher"
                                                    value={{ old('gher') }}>
                                                @if ($errors->has('gher'))
                                                    <div class="text-danger">{{ $errors->first('gher') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Kali (કળી)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('kadi') is-invalid @enderror"
                                                    id="kali" name="kadi" placeholder="Enter Kali"
                                                    value={{ old('kadi') }}>
                                                @if ($errors->has('kadi'))
                                                    <div class="text-danger">{{ $errors->first('kadi') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">other (અન્ય)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('kadi') is-invalid @enderror"
                                                    id="other_peticoat" name="other_peticoat"
                                                    placeholder="Enter Oher Measurement" value={{ old('kadi') }}>
                                                @if ($errors->has('kadi'))
                                                    <div class="text-danger">{{ $errors->first('kadi') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row mt-5">
                                            <div class="form-group col-md-6">
                                                <h5 for="name" class="underlined">Remarks (ટિપ્પણી)</h5>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <textarea  cols="6" rows="3"
                                                    class="form-control form-control-sm @error('remarks') is-invalid @enderror"
                                                    id="remarks" name="remarks" placeholder="Enter remarks"
                                                    value={{ old('remarks') }}></textarea>
                                                @if ($errors->has('remarks'))
                                                    <div class="text-danger">{{ $errors->first('remarks') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row mt-5">
                                            <div class="form-group col-md-6">
                                                <h5 for="name" class="underlined">Additional Items</h5>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Huk :</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="huk" 
                                                    {{-- @if ($("#huk").val() == '1') {{ 'checked' }} @endif --}}
                                                        required id="huk" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Yes </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" required 
                                                        name="huk" id="huk" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                                @if ($errors->has('huk'))
                                                    <div class="text-danger">{{ $errors->first('huk') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Pad :</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" required
                                                        name="pad" id="pad" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Yes </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" required
                                                        name="pad" id="pad" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                                @if ($errors->has('pad'))
                                                    <div class="text-danger">{{ $errors->first('pad') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Sample :</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sample"
                                                        required id="sample" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Yes </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sample"
                                                        required id="sample" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                                @if ($errors->has('sample'))
                                                    <div class="text-danger">{{ $errors->first('sample') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Design :</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="design"
                                                        required id="design" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Yes </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="design"
                                                        required id="design" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                                @if ($errors->has('design'))
                                                    <div class="text-danger">{{ $errors->first('design') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    @if (hasPermission('measurement', 1))
                                        <button type="submit" class="btn btn-secondary btn-block">Submit <i
                                                class="fas fa-angle-double-right"></i></button>
                                    @endif


                                </div>
                                <!-- /.card-footer-->
                            </div>
                            <!-- /.card -->
                        </div>
                        </form>
                    @endif
                </div>
            </div>
        </section>
    @endif



@endsection

@section('scripts')

    @include('jpanel.orders.ajax')
@endsection
