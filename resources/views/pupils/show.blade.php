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
                        <li class="breadcrumb-item active">{{ $pupil->name }}</li>
                    </ol>
                </div>
                <h4 class="page-title">Pupils</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 
              
    <div class="row">        
        <div class="col-lg-4 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <p>Pupil Details</p><hr>
                    <div class="list-group">
                        <span><b>Name</b> : {{$pupil->name}}</span><br>
                        <span><b>Adm No.</b> : {{$pupil->admissionNo}}</span><br>
                        <span><b>Grade</b> : 
                            &nbsp;<button type="button"  data-toggle="modal" data-target="#decrement-grade-modal" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Decrement Grade"> <i class="mdi mdi-minus-circle"></i> </button>
                            {{$pupil->grade}}
                            <button type="button"  data-toggle="modal" data-target="#increment-grade-modal" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Increment Grade"> <i class="mdi mdi-plus-circle"></i> </button>
                        </span><br>
                    </div>
                    <br> <br>
                    <div>
                        <div style="float:left">
                            <a href="{{ route('pupils.edit',$pupil) }}" class="btn btn-secondary">Edit Pupil</a>
                        </div>
                        <div style="float:right">
                            <button class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">Delete Pupil</button>
                        </div> 
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->

        <div class="col-lg-8 col-xl-3">
            <div class="card">
                <div class="card-body"> 
                    <div>
                        <div class="mt-2" style="float:left">
                            <p>Linked children details</p>
                        </div>

                        <div style="float:right">
                            <a href="{{ route('link-parent',$pupil) }}" class="btn btn-primary">
                                <span class="mdi mdi-plus-circle"></span>
                                Add Parent
                            </a>
                        </div>
                    </div>   <br><br><br>


                    @if(count($pupil->guardians) > 0)
                        <table class="table table-striped table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Phone:</th>
                                    <th>Email</th>
                                    <th>NationalId</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pupil->guardians as $guardian)
                                    <tr>
                                        <td class="table-user">
                                            {{-- <img src="assets/images/users/avatar-2.jpg" alt="table-user" class="mr-2 rounded-circle" /> --}}
                                            {{ $guardian->name}}
                                        </td>
                                        <td>{{ $guardian->phone }}</td>
                                        <td>{{ $guardian->email }}</td>
                                        <td>{{ $guardian->nationalId}}</td>
                                        <td class="table-action">
                                            <a href="{{ route('remove-parent', [$pupil , $guardian]) }}" class="action-icon"  data-toggle="tooltip" data-placement="bottom" title="Remove Parent" onclick="event.preventDefault();document.getElementById('remove-parent-form_{{ $pupil->id}}_{{$guardian->id }}').submit();"> <i class="mdi mdi-delete"></i></a>

                                            <form id="remove-parent-form_{{ $pupil->id}}_{{$guardian->id }}" action="{{ route('remove-parent', [$pupil , $guardian]) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    @else
                        <p style="text-align:center"><b>No Parent(s) linked to this pupil</b></p>
                    @endif
                        
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
    
    <!-- Delete modal -->
    <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="delete-modalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-warning">
                    <h4 class="modal-title" id="delete-modalLabel">Delete Pupil</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <p>Are you sure that you want to delete <b>{{$pupil->name}}</b> ?</p>
                        <i class="dripicons-warning h1 text-warning"></i> <br> <br> 
                        <p>Deleting this pupil removes all links betweens this pupil and related parents</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                    <form action="{{ action('PupilController@destroy',$pupil) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-warning">Confirm Delete</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Increment modal -->
    <div id="increment-grade-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="increment-modalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="increment-modalLabel">Increment Pupil Grade</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <p>Are you sure that you want to increment <b>{{$pupil->name}}'s grade</b> ?</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                    <form action="{{ action('GradeController@incrementGrade',$pupil) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning">Confirm Increment</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Decrement modal -->
    <div id="decrement-grade-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="decrement-modalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="decrement-modalLabel">Decrement Pupil Grade</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <p>Are you sure that you want to decrement <b>{{$pupil->name}}'s grade</b> ?</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                    <form action="{{ action('GradeController@decrementGrade',$pupil) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning">Confirm Decrement</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    
@endsection