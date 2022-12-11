@extends('comman.main') @section('home')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex align-items-center">
        <div class="card w-100">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{asset('Template/img/Home/75705-welcome-animation.gif')}}" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="d-flex align-items-center">
                            <h1 class="h1 mb-4 text-gray-800" style="text-transform:uppercase;text-align: left;">
                                {{ Auth::user()->name }} <br/>wellcome to the lock hood
                            </h1>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->




    @endsection('home')