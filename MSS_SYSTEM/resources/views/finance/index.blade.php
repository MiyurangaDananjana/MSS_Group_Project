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
                                        <img src="https://img.icons8.com/fluency/512/bank-card-dollar.png" alt="" style="width:100px;">
                                            <h1>Income</h1>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('expence')}}">
                                    <div class="card shadow-sm p-3 mb-5 bg-white rounded">
                                        <div class="card-body text-center">
                                        <img src="https://img.icons8.com/fluency/512/expand-arrow.png" alt="" style="width:100px;">
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