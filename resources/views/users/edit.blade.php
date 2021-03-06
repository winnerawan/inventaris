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
                <h3 class="text-themecolor">Pengguna</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item">Pengguna</li>
                </ol>
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
                            <h4 class="m-b-0 text-white">Form Edit Pengguna</h4>
                        </div>
                        <div class="card-body">
                            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT', 'files' => true]) !!}
                            <div class="form-group">
                                <div class="form-body">
                                    <h3 class="card-title">Info Pengguna</h3>
                                    <hr>
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Nama</label>
                                                {{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Email</label>
                                                {{ Form::email('email', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Password</label>
                                                {{ Form::password('password', array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Roles</label>
                                                <select name="role" id="role" class="form-control custom-select">
                                                    @if($user->role == 'admin')
                                                        <option value="admin" selected="selected">Admin</option>
                                                        <option value="unit">Unit Inventaris</option>
                                                        <option value="program_study">Prodi</option>
                                                    @elseif($user->role == 'unit')
                                                        <option value="admin">Admin</option>
                                                        <option value="unit" selected="selected">Unit Inventaris</option>
                                                        <option value="program_study">Prodi</option>
                                                    @else
                                                        <option value="admin">Admin</option>
                                                        <option value="unit">Unit Inventaris</option>
                                                        <option value="program_study" selected="selected">Prodi</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Prodi</label>
                                                <select name="program_id" id="program_id" class="form-control custom-select">
                                                    @foreach($programs as $program)
                                                        <option value="{{ $program->id }}">{{ $program->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                    {!! Form::close() !!}
                                    <a href="{{ url()->previous() }}" class="btn btn-inverse">Cancel</a>
                                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE']) !!}
                                    <button type="submit" style="margin-top: 10px;" class="btn btn-danger"> <i class="fa fa-times"></i> Delete</button>
                                    {!! Form::close() !!}

                                </div>
                            </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
            <!-- Row -->
@endsection
