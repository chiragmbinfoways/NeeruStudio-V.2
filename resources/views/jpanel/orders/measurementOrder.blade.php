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
                                                    id="Shoulder" name="b_shoulder" placeholder="Enter Shoulder"
                                                    value="{!! $ordercheck->b_shoulder !!}">
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
                                                    id="length" name="b_length" placeholder="Enter Length"
                                                    value="{!! $ordercheck->b_length !!}">
                                                @if ($errors->has('length1'))
                                                    <div class="text-danger">{{ $errors->first('length') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Chest (છાતી)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('chest') is-invalid @enderror"
                                                    id="chest" name="b_chest" placeholder="Enter Chest"
                                                    value="{!!$ordercheck->b_chest!!}">
                                                @if ($errors->has('chest'))
                                                    <div class="text-danger">{{ $errors->first('chest') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Waist (કમર)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('chest') is-invalid @enderror"
                                                    id="chest" name="b_waist" placeholder="Enter Waist"
                                                    value="{!!$ordercheck->b_waist !!}">
                                                @if ($errors->has('chest'))
                                                    <div class="text-danger">{{ $errors->first('chest') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Chest Up (છાતી અપ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('chestUp') is-invalid @enderror"
                                                    id="chest" name="b_chest_up" placeholder="Enter Chest Up"
                                                    value="{!!$ordercheck->b_chest_up !!}">
                                                @if ($errors->has('chestUp'))
                                                    <div class="text-danger">{{ $errors->first('chestUp') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Sleeves (બાંય)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('sleeves') is-invalid @enderror"
                                                    id="sleeves" name="b_Sleeves" placeholder="Enter Front"
                                                    value="{!!$ordercheck->b_Sleeves!!}">
                                                @if ($errors->has('sleeves'))
                                                    <div class="text-danger">{{ $errors->first('sleeves') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Mori (મોરી)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('mori') is-invalid @enderror"
                                                    id="mori" name="b_mori" placeholder="Enter Mori"
                                                    value="{!!$ordercheck->b_mori !!}">
                                                @if ($errors->has('mori'))
                                                    <div class="text-danger">{{ $errors->first('mori') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Mundo (મુંડો)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('mundo') is-invalid @enderror"
                                                    id="mundo" name="b_mundo" placeholder="Enter Mundo"
                                                    value="{!!$ordercheck->b_mundo!!}">
                                                @if ($errors->has('mundo'))
                                                    <div class="text-danger">{{ $errors->first('mundo') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Magismory(મેગીયસમોરી)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('length') is-invalid @enderror"
                                                    id="length" name="b_magismory" placeholder="Enter Length"
                                                    value="{!!$ordercheck->b_magismory !!}">
                                                @if ($errors->has('length'))
                                                    <div class="text-danger">{{ $errors->first('length') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Front Neck (ગળું આ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('frontNeck') is-invalid @enderror"
                                                    id="frontNeck" name="b_front_neck" placeholder="Enter Front"
                                                    value="{!!$ordercheck->b_front_neck!!}">
                                                @if ($errors->has('frontNeck'))
                                                    <div class="text-danger">{{ $errors->first('frontNeck') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Back Neck (ગળું પા)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('backNeck') is-invalid @enderror"
                                                    id="backNeck" name="b_back_neck" placeholder="Enter Back"
                                                    value="{!!$ordercheck->b_back_neck!!}">
                                                @if ($errors->has('backNeck'))
                                                    <div class="text-danger">{{ $errors->first('backNeck') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Other(અન્ય)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('other') is-invalid @enderror"
                                                    id="other" name="b_other" placeholder="Enter other measurement"
                                                    value="{!!$ordercheck->b_other!!}">
                                                @if ($errors->has('other'))
                                                    <div class="text-danger">{{ $errors->first('other') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row mt-5">
                                            <div class="form-group col-md-6">
                                                <h5 for="name" class="underlined">Kurti/Anarkali/Gaun (કુર્તી/અનારકલી/ગૌન)</h5>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Shoulder (ખભો)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm  @error('Shoulder') is-invalid @enderror"
                                                    id="Shoulder" name="k_shoulder" placeholder="Enter Shoulder"
                                                    value="{!! $ordercheck->k_shoulder !!}">
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
                                                    id="length" name="k_length" placeholder="Enter Length"
                                                    value="{!! $ordercheck->k_length !!}">
                                                @if ($errors->has('length1'))
                                                    <div class="text-danger">{{ $errors->first('length') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Chest (છાતી)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('chest') is-invalid @enderror"
                                                    id="chest" name="k_chest" placeholder="Enter Chest"
                                                    value="{!!$ordercheck->k_chest!!}">
                                                @if ($errors->has('chest'))
                                                    <div class="text-danger">{{ $errors->first('chest') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Waist (કમર)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('chest') is-invalid @enderror"
                                                    id="chest" name="k_waist" placeholder="Enter Waist"
                                                    value="{!!$ordercheck->k_waist !!}">
                                                @if ($errors->has('chest'))
                                                    <div class="text-danger">{{ $errors->first('chest') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Chest Up (છાતી અપ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('chestUp') is-invalid @enderror"
                                                    id="chest" name="k_chest_up" placeholder="Enter Chest Up"
                                                    value="{!!$ordercheck->k_chest_up !!}">
                                                @if ($errors->has('chestUp'))
                                                    <div class="text-danger">{{ $errors->first('chestUp') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Sleeves (બાંય)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('sleeves') is-invalid @enderror"
                                                    id="sleeves" name="k_Sleeves" placeholder="Enter Front"
                                                    value="{!!$ordercheck->k_Sleeves!!}">
                                                @if ($errors->has('sleeves'))
                                                    <div class="text-danger">{{ $errors->first('sleeves') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Mori (મોરી)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('mori') is-invalid @enderror"
                                                    id="mori" name="k_mori" placeholder="Enter Mori"
                                                    value="{!!$ordercheck->k_mori !!}">
                                                @if ($errors->has('mori'))
                                                    <div class="text-danger">{{ $errors->first('mori') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Mundo (મુંડો)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('mundo') is-invalid @enderror"
                                                    id="mundo" name="k_mundo" placeholder="Enter Mundo"
                                                    value="{!!$ordercheck->k_mundo!!}">
                                                @if ($errors->has('mundo'))
                                                    <div class="text-danger">{{ $errors->first('mundo') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Magismory(મેગીયસમોરી)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('length') is-invalid @enderror"
                                                    id="length" name="k_magismory" placeholder="Enter Length"
                                                    value="{!!$ordercheck->k_magismory !!}">
                                                @if ($errors->has('length'))
                                                    <div class="text-danger">{{ $errors->first('length') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Front Neck (ગળું આ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('frontNeck') is-invalid @enderror"
                                                    id="frontNeck" name="k_front_neck" placeholder="Enter Front"
                                                    value="{!!$ordercheck->k_front_neck!!}">
                                                @if ($errors->has('frontNeck'))
                                                    <div class="text-danger">{{ $errors->first('frontNeck') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Back Neck (ગળું પા)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('backNeck') is-invalid @enderror"
                                                    id="backNeck" name="k_back_neck" placeholder="Enter Back"
                                                    value="{!!$ordercheck->k_back_neck!!}">
                                                @if ($errors->has('backNeck'))
                                                    <div class="text-danger">{{ $errors->first('backNeck') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Full Length(સંપૂર્ણ લંબાઈ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('full_length') is-invalid @enderror"
                                                    id="full_length" name="k_full_length" placeholder="Enter other measurement"
                                                    value="{!!$ordercheck->k_full_length!!}">
                                                @if ($errors->has('full_length'))
                                                    <div class="text-danger">{{ $errors->first('full_length') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Kotho (કોઠો)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('kotho') is-invalid @enderror"
                                                    id="kotho" name="k_kotho" placeholder="Enter other measurement"
                                                    value="{!!$ordercheck->k_kotho!!}">
                                                @if ($errors->has('kotho'))
                                                    <div class="text-danger">{{ $errors->first('kotho') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Other(અન્ય)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('other') is-invalid @enderror"
                                                    id="other" name="k_other" placeholder="Enter other measurement"
                                                    value="{!!$ordercheck->k_other!!}">
                                                @if ($errors->has('other'))
                                                    <div class="text-danger">{{ $errors->first('other') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row mt-5">
                                            <div class="form-group col-md-6">
                                                <h5 for="name" class="underlined">Pant/Salwar/Plazo (કુર્તી/અનારકલી/પ્લાઝો)</h5>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Length (લંબાઈ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('length') is-invalid @enderror"
                                                    id="length" name="p_length" placeholder="Enter Length"
                                                    value="{!! $ordercheck->p_length !!}">
                                                @if ($errors->has('length1'))
                                                    <div class="text-danger">{{ $errors->first('length') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Mori (મોરી)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('mori') is-invalid @enderror"
                                                    id="mori" name="p_mori" placeholder="Enter Mori"
                                                    value="{!!$ordercheck->p_mori !!}">
                                                @if ($errors->has('mori'))
                                                    <div class="text-danger">{{ $errors->first('mori') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Nefo (નેફો)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('nefo') is-invalid @enderror"
                                                    id="nafo" name="p_nefo" placeholder="Enter Nefo"
                                                    value="{!!$ordercheck->p_nefo!!}">
                                                @if ($errors->has('nefo'))
                                                    <div class="text-danger">{{ $errors->first('nefo') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">seat (સીટ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('seat') is-invalid @enderror"
                                                    id="seat" name="p_seat" placeholder="Enter seat"
                                                    value="{!!$ordercheck->p_seat!!}">
                                                @if ($errors->has('seat'))
                                                    <div class="text-danger">{{ $errors->first('seat') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Thai (થાઈ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('thai') is-invalid @enderror"
                                                    id="thai" name="p_thai" placeholder="Enter thai"
                                                    value="{!!$ordercheck->p_thai!!}">
                                                @if ($errors->has('thai'))
                                                    <div class="text-danger">{{ $errors->first('thai') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Knee (ઘૂટણ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('knee') is-invalid @enderror"
                                                    id="knee" name="p_knee" placeholder="Enter knee"
                                                    value="{!!$ordercheck->p_knee!!}">
                                                @if ($errors->has('knee'))
                                                    <div class="text-danger">{{ $errors->first('knee') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Other(અન્ય)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('other') is-invalid @enderror"
                                                    id="other" name="p_other" placeholder="Enter other measurement"
                                                    value="{!!$ordercheck->p_other!!}">
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
                                                    id="length" name="pe_length" placeholder="Enter Length"
                                                    value="{!!$ordercheck->pe_length!!}">
                                                @if ($errors->has('length'))
                                                    <div class="text-danger">{{ $errors->first('length') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Nefo (નેફો)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('nefo') is-invalid @enderror"
                                                    id="nafo" name="pe_nefo" placeholder="Enter Nefo"
                                                    value="{!!$ordercheck->pe_nefo!!}">
                                                @if ($errors->has('nefo'))
                                                    <div class="text-danger">{{ $errors->first('nefo') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">seat (સીટ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('seat') is-invalid @enderror"
                                                    id="seat" name="pe_seat" placeholder="Enter seat"
                                                    value="{!!$ordercheck->pe_seat!!}">
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
                                                    id="gher" name="pe_gher" placeholder="Enter Gher"
                                                    value="{!!$ordercheck->pe_gher!!}">
                                                @if ($errors->has('gher'))
                                                    <div class="text-danger">{{ $errors->first('gher') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Type of (પ્રકાર)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('kadi') is-invalid @enderror"
                                                    id="kadi" name="pe_typeof" placeholder="Enter Kali"
                                                    value="{!!$ordercheck->pe_typeof!!}">
                                                @if ($errors->has('kadi'))
                                                    <div class="text-danger">{{ $errors->first('kadi') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">other (અન્ય)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('kadi') is-invalid @enderror"
                                                    id="kadi" name="pe_other"
                                                    placeholder="Enter Oher Measurement"
                                                    value="{!!$ordercheck->pe_other!!}">
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
                                                    value={{ old('remarks') }}>{!!$ordercheck->remarks!!}</textarea>
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
                                                    <input class="form-check-input" type="radio"
                                                        @if ($ordercheck->huk == '1') {{ 'checked' }} @endif
                                                        name="huk" required id="hukYes" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Front </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        @if ($ordercheck->huk == '0') {{ 'checked' }} @endif
                                                        required name="huk" id="hukNo" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">Back</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        @if ($ordercheck->huk == '3') {{ 'checked' }} @endif
                                                        required name="huk" id="hukNo" value="3">
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
                                                    id="b_shoulder" name="b_shoulder" placeholder="Enter Shoulder"
                                                    value="">
                                                <input type="text"
                                                    class="form-control form-control-sm d-none   @error('Shoulder') is-invalid @enderror"
                                                    id="Shoulder" name="order_detail_id" placeholder="Enter Shoulder"
                                                    value="{{$id}}">
                                                @if ($errors->has('Shoulder'))
                                                    <div class="text-danger">{{ $errors->first('Shoulder') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Length (લંબાઈ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('length') is-invalid @enderror"
                                                    id="b_length" name="b_length" placeholder="Enter Length"
                                                    value="">
                                                @if ($errors->has('length1'))
                                                    <div class="text-danger">{{ $errors->first('length') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Chest (છાતી)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('chest') is-invalid @enderror"
                                                    id="b_chest" name="b_chest" placeholder="Enter Chest"
                                                    value="">
                                                @if ($errors->has('chest'))
                                                    <div class="text-danger">{{ $errors->first('chest') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Waist (કમર)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('chest') is-invalid @enderror"
                                                    id="b_waist" name="b_waist" placeholder="Enter Waist"
                                                    value="">
                                                @if ($errors->has('chest'))
                                                    <div class="text-danger">{{ $errors->first('chest') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Chest Up (છાતી અપ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('chestUp') is-invalid @enderror"
                                                    id="b_chest_up" name="b_chest_up" placeholder="Enter Chest Up"
                                                    value="">
                                                @if ($errors->has('chestUp'))
                                                    <div class="text-danger">{{ $errors->first('chestUp') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Sleeves (બાંય)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('sleeves') is-invalid @enderror"
                                                    id="b_Sleeves" name="b_Sleeves" placeholder="Enter sleeves"
                                                    value="">
                                                @if ($errors->has('sleeves'))
                                                    <div class="text-danger">{{ $errors->first('sleeves') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Mori (મોરી)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('mori') is-invalid @enderror"
                                                    id="b_mori" name="b_mori" placeholder="Enter Mori"
                                                    value="">
                                                @if ($errors->has('mori'))
                                                    <div class="text-danger">{{ $errors->first('mori') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Mundo (મુંડો)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('mundo') is-invalid @enderror"
                                                    id="b_mundo" name="b_mundo" placeholder="Enter Mundo"
                                                    value="">
                                                @if ($errors->has('mundo'))
                                                    <div class="text-danger">{{ $errors->first('mundo') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Magismory(મેગીયસમોરી)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('length') is-invalid @enderror"
                                                    id="b_magismory" name="b_magismory" placeholder="Enter Magismory"
                                                    value="">
                                                @if ($errors->has('length'))
                                                    <div class="text-danger">{{ $errors->first('length') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Front Neck (ગળું આ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('frontNeck') is-invalid @enderror"
                                                    id="b_front_neck" name="b_front_neck" placeholder="Enter Front"
                                                    value="">
                                                @if ($errors->has('frontNeck'))
                                                    <div class="text-danger">{{ $errors->first('frontNeck') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Back Neck (ગળું પા)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('backNeck') is-invalid @enderror"
                                                    id="b_back_neck" name="b_back_neck" placeholder="Enter Back"
                                                    value="">
                                                @if ($errors->has('backNeck'))
                                                    <div class="text-danger">{{ $errors->first('backNeck') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Other(અન્ય)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('other') is-invalid @enderror"
                                                    id="b_other" name="b_other" placeholder="Enter other measurement"
                                                    value="">
                                                @if ($errors->has('other'))
                                                    <div class="text-danger">{{ $errors->first('other') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row mt-5">
                                            <div class="form-group col-md-6">
                                                <h5 for="name" class="underlined">Kurti/Anarkali/Gaun (કુર્તી/અનારકલી/ગૌન)</h5>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Shoulder (ખભો)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm  @error('Shoulder') is-invalid @enderror"
                                                    id="k_shoulder" name="k_shoulder" placeholder="Enter Shoulder"
                                                    value="">
                                                @if ($errors->has('Shoulder'))
                                                    <div class="text-danger">{{ $errors->first('Shoulder') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Length (લંબાઈ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('length') is-invalid @enderror"
                                                    id="k_length" name="k_length" placeholder="Enter Length"
                                                    value="">
                                                @if ($errors->has('length1'))
                                                    <div class="text-danger">{{ $errors->first('length') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Chest (છાતી)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('chest') is-invalid @enderror"
                                                    id="k_chest" name="k_chest" placeholder="Enter Chest"
                                                    value="">
                                                @if ($errors->has('chest'))
                                                    <div class="text-danger">{{ $errors->first('chest') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Waist (કમર)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('chest') is-invalid @enderror"
                                                    id="k_waist" name="k_waist" placeholder="Enter Waist"
                                                    value="">
                                                @if ($errors->has('chest'))
                                                    <div class="text-danger">{{ $errors->first('chest') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Chest Up (છાતી અપ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('chestUp') is-invalid @enderror"
                                                    id="k_chest_up" name="k_chest_up" placeholder="Enter Chest Up"
                                                    value="">
                                                @if ($errors->has('chestUp'))
                                                    <div class="text-danger">{{ $errors->first('chestUp') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Sleeves (બાંય)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('sleeves') is-invalid @enderror"
                                                    id="k_Sleeves" name="k_Sleeves" placeholder="Enter Front"
                                                    value="">
                                                @if ($errors->has('sleeves'))
                                                    <div class="text-danger">{{ $errors->first('sleeves') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Mori (મોરી)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('mori') is-invalid @enderror"
                                                    id="k_mori" name="k_mori" placeholder="Enter Mori"
                                                    value="">
                                                @if ($errors->has('mori'))
                                                    <div class="text-danger">{{ $errors->first('mori') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Mundo (મુંડો)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('mundo') is-invalid @enderror"
                                                    id="k_mundo" name="k_mundo" placeholder="Enter Mundo"
                                                    value="">
                                                @if ($errors->has('mundo'))
                                                    <div class="text-danger">{{ $errors->first('mundo') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Magismory(મેગીયસમોરી)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('length') is-invalid @enderror"
                                                    id="k_magismory" name="k_magismory" placeholder="Enter Magismory"
                                                    value="">
                                                @if ($errors->has('length'))
                                                    <div class="text-danger">{{ $errors->first('length') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Front Neck (ગળું આ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('frontNeck') is-invalid @enderror"
                                                    id="k_front_neck" name="k_front_neck" placeholder="Enter Front"
                                                    value="">
                                                @if ($errors->has('frontNeck'))
                                                    <div class="text-danger">{{ $errors->first('frontNeck') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Back Neck (ગળું પા)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('backNeck') is-invalid @enderror"
                                                    id="k_back_neck" name="k_back_neck" placeholder="Enter Back"
                                                    value="">
                                                @if ($errors->has('backNeck'))
                                                    <div class="text-danger">{{ $errors->first('backNeck') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Full Length(સંપૂર્ણ લંબાઈ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('full_length') is-invalid @enderror"
                                                    id="k_full_length" name="k_full_length" placeholder="Enter Full Length"
                                                    value="">
                                                @if ($errors->has('full_length'))
                                                    <div class="text-danger">{{ $errors->first('full_length') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Kotho (કોઠો)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('kotho') is-invalid @enderror"
                                                    id="k_kotho" name="k_kotho" placeholder="Enter Kotho"
                                                    value="">
                                                @if ($errors->has('kotho'))
                                                    <div class="text-danger">{{ $errors->first('kotho') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Other(અન્ય)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('other') is-invalid @enderror"
                                                    id="k_other" name="k_other" placeholder="Enter other measurement"
                                                    value="">
                                                @if ($errors->has('other'))
                                                    <div class="text-danger">{{ $errors->first('other') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row mt-5">
                                            <div class="form-group col-md-6">
                                                <h5 for="name" class="underlined">Pant/Salwar/Plazo (કુર્તી/અનારકલી/પ્લાઝો)</h5>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Length (લંબાઈ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('length') is-invalid @enderror"
                                                    id="p_length" name="p_length" placeholder="Enter Length"
                                                    value="">
                                                @if ($errors->has('length1'))
                                                    <div class="text-danger">{{ $errors->first('length') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Mori (મોરી)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('mori') is-invalid @enderror"
                                                    id="p_mori" name="p_mori" placeholder="Enter Mori"
                                                    value="">
                                                @if ($errors->has('mori'))
                                                    <div class="text-danger">{{ $errors->first('mori') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Nefo (નેફો)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('nefo') is-invalid @enderror"
                                                    id="p_nefo" name="p_nefo" placeholder="Enter Nefo"
                                                    value="">
                                                @if ($errors->has('nefo'))
                                                    <div class="text-danger">{{ $errors->first('nefo') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">seat (સીટ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('seat') is-invalid @enderror"
                                                    id="p_seat" name="p_seat" placeholder="Enter seat"
                                                    value="">
                                                @if ($errors->has('seat'))
                                                    <div class="text-danger">{{ $errors->first('seat') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Thai (થાઈ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('thai') is-invalid @enderror"
                                                    id="p_thai" name="p_thai" placeholder="Enter thai"
                                                    value="">
                                                @if ($errors->has('thai'))
                                                    <div class="text-danger">{{ $errors->first('thai') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Knee (ઘૂટણ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('knee') is-invalid @enderror"
                                                    id="p_knee" name="p_knee" placeholder="Enter knee"
                                                    value="">
                                                @if ($errors->has('knee'))
                                                    <div class="text-danger">{{ $errors->first('knee') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Other(અન્ય)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('other') is-invalid @enderror"
                                                    id="p_other" name="p_other" placeholder="Enter other measurement"
                                                    value="">
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
                                                    id="pe_length" name="pe_length" placeholder="Enter Length"
                                                    value="">
                                                @if ($errors->has('length'))
                                                    <div class="text-danger">{{ $errors->first('length') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Nefo (નેફો)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('nefo') is-invalid @enderror"
                                                    id="pe_nefo" name="pe_nefo" placeholder="Enter Nefo"
                                                    value="">
                                                @if ($errors->has('nefo'))
                                                    <div class="text-danger">{{ $errors->first('nefo') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">seat (સીટ)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('seat') is-invalid @enderror"
                                                    id="pe_seat" name="pe_seat" placeholder="Enter seat"
                                                    value="">
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
                                                    id="pe_gher" name="pe_gher" placeholder="Enter Gher"
                                                    value="">
                                                @if ($errors->has('gher'))
                                                    <div class="text-danger">{{ $errors->first('gher') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">Type of (પ્રકાર)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('kadi') is-invalid @enderror"
                                                    id="pe_typeof" name="pe_typeof" placeholder="Enter Type"
                                                    value="">
                                                @if ($errors->has('kadi'))
                                                    <div class="text-danger">{{ $errors->first('kadi') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="name">other (અન્ય)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('pe_other') is-invalid @enderror"
                                                    id="pe_other" name="pe_other"
                                                    placeholder="Enter Oher Measurement"
                                                    value="">
                                                @if ($errors->has('pe_other'))
                                                    <div class="text-danger">{{ $errors->first('pe_other') }}</div>
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
                                                    <label class="form-check-label" for="inlineRadio1">Front </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" required 
                                                        name="huk" id="huk" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">Back</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" required 
                                                        name="huk" id="huk" value="3">
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
