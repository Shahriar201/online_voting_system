@extends('backend.layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Vice President Candid</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Vice President</li>
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
                                    Edit Vice President
                                    
                                    @else
                                    Add Vice President

                                @endif
                                <a class="btn btn-success float-right btn-sm" href="{{ route('candidates.vicepresident.view') }}">
                                    <i class="fa fa-list"></i>Vice President List</a>
                            </h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">

                        {{-- User add form --}}
                        <form method="post" action="{{ (@$editData)?route('candidates.vicepresident.update', $editData->id): route('candidates.vicepresident.store') }}" id="myForm" enctype="multipart/form-data">
                            @csrf

                            <div class="form-row">

                                {{-- <div class="form-group col-md-4">
                                    <label>Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ (@$editData->category_id==$category->id)? "selected": "" }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                               
                                <div class="form-group col-md-6">
                                    <label>Candidate Name</label>
                                    <input type="text" name="name" value="{{ (@$editData->name) }}" class="form-control form-control-sm" placeholder="Write Name">
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