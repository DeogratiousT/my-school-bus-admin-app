@extends('layouts.app')

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('parents.index') }}">Parents</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('parents.show',$guardian) }}">{{ $guardian->name }}</a></li>
                        <li class="breadcrumb-item active">Link-Child</li>
                    </ol>
                </div>
                <h4 class="page-title">Parents</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 

    @if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

    <div class="row">        
        <div class="col-lg-4 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('link-parent-pupil', $guardian) }}" method="post">
                        @csrf
                        <div class="row mt-2 mx-auto">
                            <span>Parent's Name &nbsp;:&nbsp; </span> <input name="parent" type="text" value="{{ $guardian->name }}" disabled/>
                        </div> <!-- end row-->
                        <div class="row mt-2 mx-auto">
                            <span>Pupil's Name &nbsp; &nbsp; </span> <input name="pupil" type="text" id="pupilsName" disabled/>
                        </div> <!-- end row-->
                        <div class="row mt-2 mx-auto">
                            <input type="hidden" name="guardian_id" id="parentId" value="{{ $guardian->id }}">
                            <input type="hidden" name="pupil_id" id="pupilId">
                        </div>
                        <div class="row mt-2 mx-auto">
                            <button type="submit" class="btn btn-primary">Link Pupil to Parent</button>
                        </div> <!-- end row-->
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->

        <div class="col-lg-8 col-xl-3">
            <div class="card">
                <div class="card-body">                                    
                    <table id="child-laratable" class="table table-centered w-100 dt-responsive nowrap">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Admission No</th>
                                <th>Grade</th>
                            </tr>
                        </thead>
                    </table>                                    
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>                    


    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $("#child-laratable").DataTable({
                serverSide: true,
                ajax: "{{ route('pupils.index') }}",
                columns: [
                    { name: 'id'},
                    { name: 'name' },
                    { name: 'admissionNo' },
                    { name: 'grade'},                                
                ]
            });

            // $('#child-laratable tbody').load(function(){
            //     // Get the column API object
            //     var column = $('#child-laratable').DataTable().column( $(this).attr('id') );
                
            //     // Toggle the visibility
            //     column.visible( ! column.visible() );
            // });

            $('#child-laratable tbody').on('click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    $('#child-laratable').DataTable().$('tr.selected').removeClass('selected text-light');
                    $(this).addClass('selected text-light');
                }

                var details = $('#child-laratable').DataTable().row( this ).data();
                $("#pupilId").val(details[0]);
                $("#pupilsName").val(details[1]);

            } );
        });
    </script>
    
@endsection