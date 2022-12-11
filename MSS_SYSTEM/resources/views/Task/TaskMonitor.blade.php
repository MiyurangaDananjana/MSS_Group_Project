@extends('comman.main') @section('TaskMonitor')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Task Monitor</h1>
    </div>

    <!-- Page Heading -->
    <div class="d-flex align-items-center">
        <div class="w-100">

            <div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">

                            <div class="card shadow mb-4 w-100">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Task List</h6>
                                </div>
                                <div class="card-body">

                                    <div>
                                        <div class="row">

                                            @foreach($tasks as $allTaskRow)
                                                <div class="col-md-3">
                                                    <div class="card">
                                                        <div class="card-header text-left">

                                                            <div class="row">
                                                                <div class="col-md-6 text-left">
                                                                    Task : {{$allTaskRow->TaskId}}
                                                                </div>
                                                                <div class="col-md-6 text-right">
                                                                    @if($allTaskRow->Status==1)
                                                                        <div class="badge badge-primary">
                                                                            Active
                                                                        </div>
                                                                    @else
                                                                        <div class="badge badge-danger">
                                                                            Not Active
                                                                        </div>  
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card-body">

                                                          
                                                            <div class="shadow" style="padding:20px;">

                                                                <!-- Progress bar 1 -->
                                                                <div class="progress mx-auto" data-value="{{$allTaskRow->Progress}}">
                                                                <span class="progress-left">
                                                                     <span class="progress-bar border-primary" style="transform: rotate(108deg);"></span>
                                                                </span>
                                                                <span class="progress-right">
                                                                    <span class="progress-bar border-primary" style="transform: rotate(180deg);"></span>
                                                                </span>
                                                                    <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                                                        <div class="h2 font-weight-bold">{{$allTaskRow->Progress}}<sup class="small">%</sup></div>
                                                                    </div>
                                                                </div>
                                                                <!-- END -->

                                                            </div>
                                                                   
  
                                                           <br/>
                                                           <button class="btn btn-success btn-block btn-sm viewTaskDescription" data-value="{{$allTaskRow->TaskDescription}}">Description</button>
                                                           <hr>
                                                           Factory     : {{$allTaskRow->factory}}
                                                           <br/>
                                                           Assigned To : {{$allTaskRow->supervicer}}
                                                        </div>
                                                        
                                                        <div class="card-footer">
                                                        
                                                            <b class="text-info">Created Date : {{date('Y-m-d', strtotime($allTaskRow->created_at))}}</b>
                                                            <br/>
                                                            <b class="text-danger">Dead Line &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{date('Y-m-d', strtotime($allTaskRow->Deadline))}}</b>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endforeach

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

    @endsection('TaskMonitor')