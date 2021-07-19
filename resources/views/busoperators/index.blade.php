@extends('layouts.app')

@section('content')

    <div class="content-page">
        <div class="content">
            
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active">Bus Operators</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Bus Operators</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            {{-- my Container --}}
            <div class="container">
                <div class="float-right">
                    <a href="{{ route('busoperators.create') }}" class="btn btn-info mb-2"><i class="mdi mdi-plus-circle mr-2"></i> Add Bus Operator</a>
                </div> 
                <br> <br> <hr>
                <table id="busoperator-laratable" class="table table-centered w-100 dt-responsive nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Bus No</th>
                            <th>National Id</th>
                            <th style="width: 85px;">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
            
            <script src="js/jquery-3.4.1.min.js"></script>
            <script src="js/jquery.dataTables.min.js"></script>
            <script src="js/dataTables.bootstrap4.min.js"></script>
            <script>
                $(document).ready(function(){
                    $("#busoperator-laratable").DataTable({
                        serverSide: true,
                        ajax: "{{ route('busoperators.index') }}",
                        columns: [
                            { name: 'name' },
                            { name: 'phone' },
                            { name: 'busNo' },
                            { name: 'nationalId' },
                            { name: 'action', orderable: false, searchable: false, className: "table-action" },
                        ],
                    });
                });
            </script>
            
        </div>
    </div>
@endsection

