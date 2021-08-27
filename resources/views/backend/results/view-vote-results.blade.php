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

                                <h3>Vote List</h3>
                            
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="6%">SL.</th>
                                        <th>Date</th>
                                        <th>Vote Purpose</th>
                                        <th>Category</th>
                                        <th>Nominate Candidate</th>
                                        <th>Total Vote</th>
                                        {{-- <th width="12%">Action</th> --}}
                                    </tr>
                                </thead>

                                <tbody>

                                    @php
                                        // $allData['candidates'] = App\Model\Candidate::orderBy('id', 'asc')->get();
                                        // $count = App\Model\Valot::where('candidate_id', $candidates->id)->where('result', 1)->count();
                                        // dd($count);
                                        // $count++;
                                        $valots = App\Model\Valot::where('vote_purpose_id', 1)->with(['category'])->get();
                                        // dd($valots->toArray());
                                        $total = 0;
                                        // if ($valots->result == 1) {
                                        //     $result = total++;
                                        //     dd($result);
                                        // }
                                    @endphp

                                    @foreach ($valots as $key => $vote)
                                        {{-- @php
                                            $count_category = App\Model\Candidate::where('category_id', $vice_president->category_id)->count();
                                        @endphp --}}

                                            <tr class= {{ $vote->id }}>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $vote->date }}</td>
                                                <td>{{ $vote['vote_purpose']['name'] }}</td>
                                                <td>{{ $vote['category']['name'] }}</td>
                                                {{-- <td>{{ $vote['nomination']['name'] }}</td> --}}
                                                <td>{{ $vote['candidate']['name'] }}</td>
                                                <td>{{ $vote->count }}</td>
                                            </tr>
                                        
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            
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

@endsection