@extends('comman.main') @section('HRModule')

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
                                <a href="{{route('hr_users')}}">
                                    <div class="card shadow-sm p-3 mb-5 bg-white rounded">
                                        <div class="card-body text-center">
                                            <img src="https://img.icons8.com/fluency/512/approve-and-update.png" alt="" style="width:100px;">
                                            <h1>Update Users</h1>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('hr_create')}}">
                                    <div class="card shadow-sm p-3 mb-5 bg-white rounded">
                                        <div class="card-body text-center">
                                            <img src="https://img.icons8.com/color/512/add-file.png" alt="" style="width:100px;">
                                            <h1>Create Users</h1>
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




    @endsection('HRModule')