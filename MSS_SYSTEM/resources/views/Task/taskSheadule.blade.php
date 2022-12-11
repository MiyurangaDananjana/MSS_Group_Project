@extends('comman.main') @section('TaskShedule')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Task Shedule</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm newTaskCreate"> Generate Task</a>
    </div>


    <!-- Page Heading -->
    <div class="d-flex align-items-center">
        <div class="w-100">

            @if(Session::has('msg'))
            <div class="row">
                <div class="alert-success btn-block p-3 text-center">
                        {{Session::get('msg')}}
                </div>
            </div>
            <br/>
            @endif

            <div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">

                            <div class="card shadow mb-4 w-100">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Task List</h6>
                                </div>
                                <div class="card-body">

                                    <div class="table-responsive">
										<table  class="table table-center table-hover datatable display nowrap" style="width:100%">
											<thead class="thead-light">
												<tr>
                                                    <th>Created User</th>
                                                    <th>Task Name</th>
													<th>Task Description</th>
													<th>factory</th>
													<th>Status</th>
													<th>Progress</th>
													<th>Dead Line</th>
													<th>Asigned Supervicer</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
                                            @foreach($tasks as $allTaskRow)
                                                <tr>
                                                    <td>{{$allTaskRow->name}}</td>
                                                    <td>{{$allTaskRow->TaskName}}</td>
                                                    <td>
                                                        <button class="btn btn-success viewTaskDescription" data-value="{{$allTaskRow->TaskDescription}}">View</button>
                                                    
                                                    </td>
                                                    <td>{{$allTaskRow->factory}}</td>
                                                    <td>@if($allTaskRow->Status==1)
                                                            Active
                                                        @else
                                                            Not Active
                                                        @endif
                                                    </td>
                                                    <td>{{$allTaskRow->Progress}}</td>
                                                    <td style="color:red;"><b>{{$allTaskRow->Deadline}}</b></td>
                                                    <td>{{$allTaskRow->supervicer}}</td>
                                                    <td style="display: flex;">

                                                        <form method="POST" action="{{ route('deleteTask') }}">
                                                         @csrf
                                                            <input type="hidden" name="taskId" value="{{$allTaskRow->TaskId}}">
                                                            <button type="submit" onclick="return confirm('Are you sure you want to do that?');" class="btn btn-danger">Delete</button>
                                                        </form>

                                                        <form method="POST" action="{{route('changeStstus')}}">
                                                         @csrf
                                                            <input type="hidden" name="taskId" value="{{$allTaskRow->TaskId}}">
                                                            <button type="submit" onclick="return confirm('Are you sure you want to do that?');" class="btn btn-warning">Change Status</button>
                                                        </form>

                                                    </td>
                                                </tr>
                                            @endforeach

                                            </tbody>
										</table>
									</div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="newTaskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Task</h5>
                    </div>
                    <div class="modal-body">

                        <form method="POST" action="{{ route('taskSheadule') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Task Name</label>
                                    <input type="text" required class="form-control @error('taskName') is-invalid @enderror" name="taskName" placeholder="Task">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Task Description</label>
                                    <textarea required class="form-control @error('taskDescription') is-invalid @enderror" name="taskDescription" id="taskDescription" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Factory</label>
                                    <select name="factory" required class="form-control @error('factory') is-invalid @enderror">
                                        <option value="1">Factory 01</option>
                                        <option value="2">Factory 02</option>
                                        <option value="3">Factory 03</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Supervicer</label>
                                    <select name="supervicer" required class="form-control @error('supervicer') is-invalid @enderror">
                                        <option value="1">supervicer 1</option>
                                        <option value="2">supervicer 2</option>
                                        <option value="3">supervicer 3</option>
                                        <option value="4">supervicer 4</option>
                                    </select>
                                </div>
                            </div>
                            
                            <input type="hidden"  class="form-control" value="{{ Auth::user()->id }}" name="createdUser">

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Dead Line</label>
                                    <input type="date" required class="form-control @error('deadLine') is-invalid @enderror" name="deadLine">
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




    @endsection('TaskShedule')