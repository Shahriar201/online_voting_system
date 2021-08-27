@extends('backend.layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage President Candid</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">President</li>
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
                                @if (isset($editData))
                                    Edit President
                                    
                                    @else
                                    Add President

                                @endif
                                <a class="btn btn-success float-right btn-sm" href="{{ route('candidates.president.view') }}">
                                    <i class="fa fa-list"></i>President List</a>
                            </h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">

                        {{-- User add form --}}
                        <form method="post" action="{{ (@$editData)?route('candidates.president.update', $editData->id): route('candidates.president.store') }}" id="myForm" enctype="multipart/form-data">
                            @csrf

                            <div class="form-row">

                                <div class="form-group col-md-4">
                                    <label>Vote Purpose</label>
                                    <select name="vote_purpose_id" id="vote_purpose_id" class="form-control">
                                        <option value="">Select purpose</option>
                                            @foreach ($vote_purposes as $purpose)
                                                <option value="{{ $purpose->id }}" {{ (@$editData->vote_purpose_id==$purpose->id)? "selected": "" }}>{{ $purpose->name }}</option>
                                            @endforeach
                                    </select>
                                </div>
                               
                                <div class="form-group col-md-4">
                                    <label>Candidate Name</label>
                                    <input type="text" name="name" value="{{ (@$editData->name) }}" class="form-control form-control-sm" placeholder="Write Brand Name">
                                    <font color="red">{{ ($errors->has('name'))?($errors->first('name')): '' }}</font>
                                </div>

                                <div class="form-group col-md-2" style="padding-top:30px">
                                    <button type="submit" class="btn btn-primary btn-sm">{{ (@$editData)? 'Update': 'Submit' }}</button>
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

{{-- jQuary validation --}}
<script>
    $(function () {
      
      $('#myForm').validate({
        rules: {
          category_id: {
            required: true,
          },
          name: {
            required: true,
          },
        },
        messages: {
          //terms: "Please accept our terms"
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
    </script>

@endsection