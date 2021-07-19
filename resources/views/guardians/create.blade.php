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
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
                <h4 class="page-title">Parents</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 

    {{-- my Container --}}
    <div class="container">                            
        <form action="{{ route('parents.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Full Name</label>
                <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Enter the Parent's Full Name" required>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('name') }}
                    </span>
                @endif
            </div>
    
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" id="phone" name="phone" placeholder="Parent's Phone" value="{{ old('phone') }}" type="number">
                @if ($errors->has('phone'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('phone') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="Parent's Email" value="{{ old('email') }}" type="email">
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('email') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="nationalId">National ID Number</label>
                <input class="form-control {{ $errors->has('nationalId') ? ' is-invalid' : '' }}" id="nationalId" name="nationalId" placeholder="Parent's National ID" value="{{ old('nationalId') }}" type="number">
                @if ($errors->has('nationalId'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('nationalId') }}
                    </span>
                @endif
            </div>

            <div class="form-group mb-0 text-center">
                <button class="btn btn-primary btn-block" type="submit">
                    <i class="mdi mdi-content-save"></i> Save and Continue 
                </button>
            </div>
        </form>
    </div>      
        
@endsection