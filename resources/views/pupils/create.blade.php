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
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
                <h4 class="page-title">Pupils</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 

    {{-- my Container --}}
    <div class="container">
        <div class="float-left">
            <a href="{{ route('pupils.index') }}" class=" text-info mb-2"><i class="mdi mdi-chevron-double-left mr-2"></i>Pupils</a>
        </div> 
        <br> <hr>
        <form action="{{ route('pupils.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Full Name</label>
                <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Enter the Pupil's name" required>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('name') }}
                    </span>
                @endif
            </div>
    
            <div class="form-group">
                <label for="admissionNo">Admission Number</label>
                <input class="form-control {{ $errors->has('admissionNo') ? ' is-invalid' : '' }}" id="admissionNo" name="admissionNo" placeholder="Pupil's admissionNo" value="{{ old('admissionNo') }}" type="number">
                @if ($errors->has('admissionNo'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('admissionNo') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="grade">Grade</label>
                <select class="form-control {{ $errors->has('grade') ? ' is-invalid' : '' }}" name="grade" id="grade">
                    @foreach ($grades as $grade)
                        <option value="{{ $grade }}">{{ $grade }}</option>
                    @endforeach
                </select>
                @if ($errors->has('grade'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('grade') }}
                    </span>
                @endif
            </div>

            <div class="form-group mb-0 text-center">
                <button class="btn btn-primary btn-block" type="submit">
                    <i class="mdi mdi-content-save"></i> Submit
                </button>
            </div>
        </form>
    </div>      
    
@endsection