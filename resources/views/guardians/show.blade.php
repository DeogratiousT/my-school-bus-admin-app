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
                        <li class="breadcrumb-item active">{{ $guardian->name }}</li>
                    </ol>
                </div>
                <h4 class="page-title">Parents</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 
              
    <div class="row">        
        <div class="col-lg-4 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <p>Parent Details</p><hr>
                    <div class="list-group">
                        <span><b>Name</b> : {{$guardian->name}}</span><br>
                        <span><b>Phone</b> : {{$guardian->phone}}</span><br>
                        <span><b>Email</b> : {{$guardian->email}}</span><br>
                        <span><b>National ID</b> : {{$guardian->nationalId}}</span>
                    </div>
                    <br> <br>
                    <div>
                        <div style="float:left">
                            <a href="{{ route('parents.edit',$guardian) }}" class="btn btn-secondary">Edit Parent</a>
                        </div>
                        <div style="float:right">
                            <button class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">Delete Parent</button>
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
                            <a href="{{ route('link-pupil',$guardian) }}" class="btn btn-primary">
                                <span class="mdi mdi-plus-circle"></span>
                                Add Child
                            </a>
                        </div>
                    </div>   <br><br><br>


                    @if(count($guardian->pupils) > 0)
                        <table class="table table-striped table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Adm No:</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($guardian->pupils as $pupil)
                                    <tr>
                                        <td class="table-user">
                                            {{-- <img src="assets/images/users/avatar-2.jpg" alt="table-user" class="mr-2 rounded-circle" /> --}}
                                            {{ $pupil->name}}
                                        </td>
                                        <td>{{ $pupil->admissionNo}}</td>
                                        <td class="table-action">
                                            <a href="{{ route('remove-pupil', [$guardian, $pupil]) }}" class="action-icon"  data-toggle="tooltip" data-placement="bottom" title="Remove Pupil" onclick="event.preventDefault();document.getElementById('remove-pupil-form_{{ $guardian->id}}_{{$pupil->id }}').submit();"> <i class="mdi mdi-delete"></i></a>

                                            <form id="remove-pupil-form_{{ $guardian->id}}_{{$pupil->id }}" action="{{ route('remove-pupil', [$guardian, $pupil]) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    @else
                        <p style="text-align:center"><b>No pupil(s) linked to this parent</b></p>
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
                    <h4 class="modal-title" id="delete-modalLabel">Delete Parent</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <p>Are you sure that you want to delete <b>{{$guardian->name}}</b> ?</p>
                        <i class="dripicons-warning h1 text-warning"></i> <br> <br> 
                        <p>Deleting this parent removes all links betweens this parent and related pupils</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                    <form action="{{ action('GuardianController@destroy',$guardian) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-warning">Confirm Delete</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    
@endsection