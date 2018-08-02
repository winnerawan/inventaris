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
                <h3 class="text-themecolor">Perbaikan</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item">Perbaikan</li>
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
                            <h4 class="m-b-0 text-white">Form Tambah Perbaikan</h4>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route' => 'repair.store', 'data-parsley-validate' => '', 'files' => true, 'method' => 'POST  ']) !!}
                            <div class="form-group">
                                <div class="form-body">
                                    <h3 class="card-title">Info Perbaikan</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Barang</label>
                                                <select name="item_id" id="item_id" class="form-control custom-select">
                                                    <option value="0">--pilih--</option>
                                                    @foreach($items as $item)
                                                        <option value="{{ $item->id }}" data-quantity="{{ $item->quantity }}">{{ $item->name .' - '. $item->program .' - '.$item->location }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Jumlah</label>
                                                <select name="quantity" id="quantity" class="form-control custom-select">
                                                    <option value="0">--pilih--</option>
                                                    {{--@for($i=1; $i<=$item->quantity; $i++)--}}
                                                        {{--<option value="{{ $i }}" class="{{ $item->id }}" data-qty="{{ $i }}" data-chained="{{ $i }}">{{ $i }}</option>--}}
                                                    {{--@endfor--}}
                                                </select>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                    <a href="{{ url()->previous() }}" class="btn btn-inverse">Cancel</a>
                                </div>
                                {!! Form::close() !!}
                            </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
            <!-- Row -->
@endsection

@section('extra-script')

                    <script>

                        $alloption=$("#quantity").html();
                        $("#item_id").change(function(){

                            // $("#quantity").html($alloption);

                            var val=$("#item_id").find(":selected").data("quantity");

                            console.log(val);
                            $("#quantity option[value!="+val+"]").remove();
                            for (var i=1; i<=val; i++) {
                                // $("#quantity").append($('<option></option>').val(val[i]).html([i]));
                                $('#quantity')
                                    .append($("<option></option>")
                                        .attr("value",val[i])
                                        .text(i));
                            }

                        });

                        // $("#quantity").chained("#item_id");

                        {{--jQuery(document).ready(function($){--}}
                            {{--$('#stuff_id').change(function(){--}}
                                {{--$.get("{{ url('http://localhost:8000/getJsonQty/3')}}",--}}
                                    {{--{ option: $(this).val() },--}}
                                    {{--function(data) {--}}
                                        {{--var model = $('#quantity');--}}
                                        {{--model.empty();--}}
                                        {{--console.log(model);--}}
                                        {{--$.each(data, function(index, element) {--}}
                                            {{--model.append("<option value='"+ element.quantity +"'>" + element.quantity + "</option>");--}}
                                        {{--});--}}
                                    {{--});--}}
                            {{--});--}}
                        {{--});--}}
                        // function courier_function(e) {
                        //     var qty = $("#item_id option:selected").data('qty');
                        //
                        // }
                    </script>
@endsection
