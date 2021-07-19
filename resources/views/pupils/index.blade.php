@extends('layouts.app')

@section('content')
            
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Pupils</li>
                    </ol>
                </div>
                <h4 class="page-title">Pupils</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 

    {{-- my Container --}}
    <div class="container">
        <div class="float-right">
            <a href="{{ route('pupils.create') }}" class="btn btn-info"><i class="mdi mdi-plus-circle mr-2"></i> Add Pupil</a>
        </div> 
        <br><br><hr>
        <table id="child-laratable" class="table table-centered w-100 dt-responsive nowrap">
            <thead class="thead-light">
                <tr>
                    <th>Name</th>
                    <th>Admission No</th>
                    <th>Grade</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
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
                    { name: 'name' },
                    { name: 'admissionNo' },
                    { name: 'grade'},
                    { name: 'action' , orderable: false, searchable: false }                                
                ]
            });

            // $('#child-laratable tbody').on('click', 'tr', function () {
            //     if ( $(this).hasClass('selected') ) {
            //         $(this).removeClass('selected text-light');
                    
            //     }
            //     else {
            //         $('#child-laratable').DataTable().$('tr.selected').removeClass('selected text-light');
            //         $(this).addClass('selected text-light');
            //     }

            //     var details = $('#child-laratable').DataTable().row( this ).data();
            //     $("#pupilId").val(details[0]);
            //     $("#pupilsName").val(details[1]);

            // } );
        });
    </script>
   
@endsection

