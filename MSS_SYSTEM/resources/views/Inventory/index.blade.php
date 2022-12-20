@extends('comman.main') @section('Inventory')

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
                                <a href="{{route('Items')}}">
                                    <div class="card shadow-sm p-3 mb-5 bg-white rounded">
                                        <div class="card-body text-center">
                                            <img src="https://img.icons8.com/fluency/512/ingredients.png" alt="" style="width:100px;">
                                            <h1>Manage Item</h1>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('InventoryControle')}}">
                                    <div class="card shadow-sm p-3 mb-5 bg-white rounded">
                                        <div class="card-body text-center">
                                            <img src="https://img.icons8.com/fluency/512/warehouse-1.png" alt="" style="width:100px;">
                                            <h1>Inventory</h1>
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




    @endsection('Inventory')