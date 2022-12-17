@extends('comman.main') @section('kanban')

<style>
    .fsslider {
        position: relative;
        min-width: 250px;
        height: 50px;
        display: inline-block;
        width: 100%;
        color: #000;
        line-height: 24px;
        font-size: 20px;
    }

</style>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex align-items-center">
        <div class="w-100">
            <div class="">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                        <div class="card shadow mb-4 w-100">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Task List</h6>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <div class="row" id="canbankCarsList">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">
                                                <img src="{{asset('Template/loading/99297-loading-files.gif')}}" class="img-fluid">
                                            </div>
                                            <div class="col-md-4"></div>
                                        </div>
                                    </div>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="viewDescriptionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header"></div>
                    <div class="modal-body" id="TaskSheduledescription" style="text-align: justify;">
                         
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->




    @endsection('Task')