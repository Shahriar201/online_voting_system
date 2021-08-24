@extends('backend.layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Category</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
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
                                @if(isset($editData))
                                    Edit Category
                                @else
                                    Add Category
                                @endif

                                <a class="btn btn-success float-right btn-sm" href="{{ route('categories.view') }}">
                                    <i class="fa fa-list"></i>Category List</a>
                            </h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">

                        {{-- User add form --}}
                        <form method="post" action="{{ (@$editData)? route('categories.update', $editData->id): route('categories.store') }}" id="myForm" enctype="multipart/form-data">
                            @csrf

                            <div class="form-row">
                               
                                <div class="form-group col-md-6">
                                    <label for="name">Name</label></label>
                                    <input type="text" name="name" value="{{ @$editData->name }}" id="name" class="form-control">
                                    <font color="red">{{ ($errors->has('name'))? ($errors->first('name')) : '' }}</font>
                                </div>

                                <div class="form-group col-md-6" style="padding-top:30px">
                                    <input type="submit" value="{{ (@$editData)? 'Update': 'Submit' }}" class="btn btn-primary">
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

<!-- Page specific script validation -->
<script>
    $(function () {
      
      $('#myForm').validate({
        rules: {
          name: {
            required: true,
          },
    
        },
        messages: {
          name: {
            required: "Please category name"
          },
         
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