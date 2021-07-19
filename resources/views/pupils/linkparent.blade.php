@extends('layouts.app')

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pupils.index') }}">Pupils</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pupils.show',$pupil) }}">{{ $pupil->name }}</a></li>
                        <li class="breadcrumb-item active">Link-Parent</li>
                    </ol>
                </div>
                <h4 class="page-title">Pupils</h4>
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
                    <form action="{{ route('link-pupil-parent', $pupil) }}" method="post">
                        @csrf
                        <div class="row mt-2 mx-auto">
                            <span>Pupil's Name &nbsp;:&nbsp; </span> <input name="pupil" type="text" value="{{ $pupil->name }}" disabled/>
                        </div> <!-- end row-->
                        <div class="row mt-2 mx-auto">
                            <span>Parent's Name &nbsp; &nbsp; </span> <input name="guardian" type="text" id="guardiansName" disabled/>
                        </div> <!-- end row-->
                        <div class="row mt-2 mx-auto">
                            <input type="hidden" name="pupil_id" id="pupilId" value="{{ $pupil->id }}">
                            <input type="hidden" name="guardian_id" id="guardianId">
                        </div>
                        <div class="row mt-2 mx-auto">
                            <button type="submit" class="btn btn-primary">Link Parent to Pupil</button>
                        </div> <!-- end row-->
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->

        <div class="col-lg-8 col-xl-3">
            <div class="card">
                <div class="card-body">                                    
                    <table id="guardian-laratable" class="table table-centered w-100 dt-responsive nowrap">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>National ID</th>
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
            $("#guardian-laratable").DataTable({
                serverSide: true,
                ajax: "{{ route('parents.index') }}",
                columns: [
                    { name: 'id'},
                    { name: 'name' },
                    { name: 'phone' },
                    { name: 'nationalId'},                                
                ]
            });

            // $('#child-laratable tbody').load(function(){
            //     // Get the column API object
            //     var column = $('#child-laratable').DataTable().column( $(this).attr('id') );
                
            //     // Toggle the visibility
            //     column.visible( ! column.visible() );
            // });

            $('#guardian-laratable tbody').on('click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    $('#guardian-laratable').DataTable().$('tr.selected').removeClass('selected text-light');
                    $(this).addClass('selected text-light');
                }

                var details = $('#guardian-laratable').DataTable().row( this ).data();
                $("#guardianId").val(details[0]);
                $("#guardiansName").val(details[1]);

            } );
        });
    </script>
    
@endsection