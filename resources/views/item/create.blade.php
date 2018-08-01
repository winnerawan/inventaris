@extends('template')

@section('content')

    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor"> Barang</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item">Master Barang</li>
                </ol>
            </div>
            <div class="">
                <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <!-- Row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">Form Tambah Barang</h4>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route' => 'item.store', 'data-parsley-validate' => '', 'files' => true, 'method' => 'POST  ']) !!}
                            <div class="form-group">
                                <div class="form-body">
                                    <h3 class="card-title">Info Barang</h3>
                                    <hr>
                                    <div class="row p-t-20">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Barang</label>
                                                    <select name="stuff_id" id="stuff_id" class="form-control custom-select">
                                                        @foreach($stuffs as $stuff)
                                                            <option value="{{ $stuff->id }}">{{ $stuff->name . ' - ' . $stuff->program->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Kondisi</label>
                                                {{--<input class="form-control" name="condition_id" value="1"/>--}}
                                                <select name="items[0][condition_id]" id="items[0][condition_id]" class="form-control custom-select" readonly="">
                                                        <option value="{{ $conditions[0]->id }}">{{ $conditions[0]->name }}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Lokasi</label>
                                                {{ Form::text('items[0][location]', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Jumlah</label>
                                                {{ Form::text('items[0][quantity]', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Kondisi</label>
                                                {{--<input class="form-control" name="condition_id" value="1"/>--}}
                                                <select name="items[1][condition_id]" id="items[1][condition_id]" class="form-control custom-select" readonly="">
                                                    <option value="{{ $conditions[1]->id }}">{{ $conditions[1]->name }}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Lokasi</label>
                                                {{ Form::text('items[1][location]', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Jumlah</label>
                                                {{ Form::text('items[1][quantity]', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Kondisi</label>
                                                {{--<input class="form-control" name="condition_id" value="1"/>--}}
                                                <select name="items[2][condition_id]" id="items[2][condition_id]" class="form-control custom-select" readonly="">
                                                    <option value="{{ $conditions[2]->id }}">{{ $conditions[2]->name }}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Lokasi</label>
                                                {{ Form::text('items[2][location]', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Jumlah</label>
                                                {{ Form::text('items[2][quantity]', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
                                            </div>
                                        </div>


                                    </div>
                                    <!--/row-->


                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                    <a href="{{ url()->previous() }}" class="btn btn-inverse">Cancel</a>                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
@endsection
