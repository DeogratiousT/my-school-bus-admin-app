@extends('layouts.app')

@section('content')
        
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Layout</a></li>
                        <li class="breadcrumb-item active">Detached</li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard</h4>
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                @endif 
            </div>
        </div>
    </div>     
    <!-- end page title --> 
    
    {{-- my row --}}
    <div class="row">
        <div class="col-lg-4">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-right">
                        <i class="mdi mdi-account-multiple widget-icon bg-success-lighten text-success"></i>
                    </div>
                    <h5 class="text-muted font-weight-normal mt-0" title="Number of Pupils">Pupils</h5>
                    <h3 class="mt-3 mb-3">254</h3>
                    {{-- <p class="mb-0 text-muted">
                        <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i> 5.27%</span>
                        <span class="text-nowrap">Since last month</span>  
                    </p> --}}
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-lg-4">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-right">
                        <i class="mdi mdi-account-multiple widget-icon bg-success-lighten text-success"></i>
                    </div>
                    <h5 class="text-muted font-weight-normal mt-0" title="Number of Parents">Parents</h5>
                    <h3 class="mt-3 mb-3">300</h3>
                    {{-- <p class="mb-0 text-muted">
                        <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i> 5.27%</span>
                        <span class="text-nowrap">Since last month</span>  
                    </p> --}}
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-lg-4">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-right">
                        <i class="mdi mdi-cart-plus widget-icon bg-danger-lighten text-danger"></i>
                    </div>
                    <h5 class="text-muted font-weight-normal mt-0" title="Number of Bus Operators">Bus Operators</h5>
                    <h3 class="mt-3 mb-3">12</h3>
                    {{-- <p class="mb-0 text-muted">
                        <span class="text-danger mr-2"><i class="mdi mdi-arrow-down-bold"></i> 1.08%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p> --}}
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div><!-- end row-->
                        
@endsection
