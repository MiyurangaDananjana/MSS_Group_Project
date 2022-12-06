@extends('comman.main') @section('TaskShedule')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Task Shedule</h1>
        <a href="#"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm newTaskCreate"> Generate Task</a>
    </div>
    <!-- Page Heading -->
    <div class="d-flex align-items-center">
        <div class="card w-100">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            
                        <div class="card shadow mb-4 w-100">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Task List</h6>
                                </div>
                                <div class="card-body">

                                    <br/>
                                    <h4 class="small font-weight-bold">Server Migration</h4>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="modal fade" id="newTaskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Task</h5>
                </div>
                <div class="modal-body">

                <form>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Task Name</label>
                            <input type="email" class="form-control" name="taskName" placeholder="Task">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Task Description</label>
                            <textarea class="form-control" id="taskDescription" rows="5"></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Department</label>
                            <select id="inputState" class="form-control">
                                <option>Choose...</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Supervicer</label>
                            <select id="inputState" class="form-control">
                                <option>Choose...</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Dead Line</label>
                            <input type="date" class="form-control"  name="deadLine">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>

                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>


    </div>
    <!-- /.container-fluid -->




    @endsection('TaskShedule')