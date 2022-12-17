@extends('comman.main') @section('finance')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex align-items-center">
        <div class="card w-100">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{route('income')}}">
                                    <div class="card shadow-sm p-3 mb-5 bg-white rounded">
                                        <div class="card-body text-center">
                                            <h1><i class="fa fa-money" aria-hidden="true"></i></h1>
                                            <h1>Income</h1>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('expence')}}">
                                    <div class="card shadow-sm p-3 mb-5 bg-white rounded">
                                        <div class="card-body text-center">
                                            <h1><i class="fa fa-exclamation-circle " aria-hidden="true"></i></h1>
                                            <h1>Expences</h1>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->




    @endsection('finance')