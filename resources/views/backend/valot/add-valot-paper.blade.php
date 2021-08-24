@extends('backend.layouts.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Vote</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Vote</li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-md-12">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3>
                                    {{-- @if (isset($editData))
                                        Edit Nomination
                                    @else --}}
                                        Add Vote
                                    {{-- @endif --}}

                                    <a class="btn btn-success float-right btn-sm"
                                        href="{{ route('nominations.president.view') }}">
                                        <i class="fa fa-list"></i>Vote List</a>
                                </h3>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">

                                {{-- User add form --}}
                                <form method="post"
                                    action="{{ (@$editData) ? route('valots.update', $editData->id) : route('valots.store') }}"
                                    id="myForm" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-row">

                                        <div class="form-group col-md-3">
                                            <label>Date</label></label>
                                            <input type="text" name="date" id="date" class="form-control datepicker form-control-sm"
                                                placeholder="YYYY-MM-DD" readonly>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Purpose</label>
                                            <select name="vote_purpose_id" id="vote_purpose_id" class="form-control select2">
                                                <option value="">Select Purpose</option>
                                                    @foreach ($vote_purposes as $purpose)
                                                        <option value="{{ $purpose->id }}">{{ $purpose->name }}</option>
                                                    @endforeach
                                            </select>
                                            
                                        </div>
                                        
                                        <div class="form-group col-md-3">
                                            <label>Category</label>
                                            <select name="category_id" id="category_id" class="form-control select2">
                                                <option value="">Select Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                            </select>
                                            
                                        </div>
                                        
                                        <div class="form-group col-md-3">
                                            <label for="candidate_id">Candidate Name</label>
                                            <select name="candidate_id" id="candidate_id" class="form-control select2">
                                                <option value="">Select Candidate</option>

                                                @foreach ($candidates as $candid)
                                                    <option value="{{ $candid->id }}">{{ $candid->name }}</option>
                                                @endforeach

                                            </select>
                                            
                                        </div>
                                        
                                        <div class="form-group col-md-2" style="padding-top:35px"> &nbsp;&nbsp &nbsp;&nbsp
                                            <input type="checkbox" name="result" value="result"> Give Vote
                                        </div>

                                        <div class="form-group col-md-1" style="padding-top:30px">
                                            <input type="submit" value="{{ @$editData ? 'Update' : 'Submit' }}"
                                                class="btn btn-primary btn-sm">
                                        </div>
                                    </div>


                                </form>


                            </div>
                            <!-- /.card-body -->
                        </div>

                    </section>

                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!--Datepicker-->
    <script>
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
    </script>

    <!-- Page specific script validation -->
    <script>
        $(function() {

            $('#myForm').validate({
                rules: {
                    vote_purpose_id: {
                        required: true,
                    },
                    category_id: {
                        required: true,
                    },
                    candidate_id: {
                        required: true,
                    },
                    result: {
                        required: true,
                    },
                    date: {
                        required: true,
                    },


                },
                messages: {

                    //terms: "Please accept our terms"
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>

    {{-- Get Candidate Name using Category_id Select by Ajax --}}
    <script type="text/javascript">
        $(function() {
            $(document).on('change', '#category_id', function() {
                var category_id = $(this).val();
                $.ajax({
                    url: "{{ route('get-candidate-name') }}",
                    type: "GeT",
                    data: {
                        category_id: category_id
                    },
                    success: function(data) {
                        var html = '<option value="">Select Candidate</option>';
                        $.each(data, function(key, v) {
                            html += '<option value="' + v.id + '">' + v.name +
                                '</option>';
                        });
                        $('#candidate_id').html(html);
                    }
                });
            });
        });
    </script>

@endsection
