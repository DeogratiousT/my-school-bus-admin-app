@extends('layouts.app')

@section('content')
            
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Parents</li>
                    </ol>
                </div>
                <h4 class="page-title">Parents</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 

    {{-- my Container --}}
    <div class="container">
        <div class="float-right">
            <a href="{{ route('parents.create') }}" class="btn btn-info mb-2"><i class="mdi mdi-plus-circle mr-2"></i> Add Parent</a>
        </div> 
        <br> <br> <hr>
        <table id="parents-laratable" class="table table-centered w-100 dt-responsive nowrap">
            <thead class="thead-light">
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>National Id</th>
                    <th style="width: 85px;">Action</th>
                </tr>
            </thead>
        </table>
    </div>
    
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $("#parents-laratable").DataTable({
                serverSide: true,
                ajax: "{{ route('parents.index') }}",
                columns: [
                    { name: 'name' },
                    { name: 'phone' },
                    { name: 'email' },
                    { name: 'nationalId' },
                    { name: 'action', orderable: false, searchable: false, className: "table-action" },
                ],
            });
        });
    </script>
   
@endsection

