@extends('comman.main') @section('income')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex align-items-center">
        <div class="card w-100">
            <div class="card-body">

                @if(Session::has('msg'))
                <div class="row">
                    <div class="alert-success btn-block p-3 text-center">
                        {{Session::get('msg')}}
                    </div>
                </div>
                <br/> @endif

                <form method="POST" action="{{route('incomeExpencesSave')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 text-info">
                            <b><a href="#" class="reportModalBtn">Download Income Report</a></b>
                            <hr/>
                        </div>
                        <div class="col-md-4">
                            <lable>Amount</lable>
                            <br/>
                            <input type="number" required name="amount" class="form-control btn-block">
                        </div>
                        <div class="col-md-6 ">
                            <lable>Description</lable>
                            <br/>
                            <input type="text" required name="description" class="form-control btn-block">
                            <input type="hidden" name="type" value="income" class="formcontrole">
                        </div>
                        <div class="col-md-2 ">
                            <lable style="visibility: hidden;">...</lable>
                            <br/>
                            <button type="submit" class="btn btn-primary btn-block">Save</button>
                        </div>
                    </div>
                </form>

                <br>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Added by
                            </th>
                            <th>
                                Amount
                            </th>
                            <th>
                                Description
                            </th>

                            <th>
                                Added Date
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($income as $incomeItem)
                        <tr>
                            <td>{{$incomeItem->incomeId}}</td>
                            <td>{{$incomeItem->name}}</td>


                            <td>
                                <form method="POST" action="{{ route('editIncomExpences') }}" style="display: flex;">
                                    @csrf
                                    <input type="hidden" name="incomeId" value="{{$incomeItem->incomeId}}">
                                    <input type="hidden" name="type" value="incomeAmount" class="formcontrole">
                                    <input type="number" required name="amount" value="{{$incomeItem->Amount}}" class="form-control btn-block">
                                    <button type="submit" onclick="return confirm('Are you sure you want to do that?');" class="btn btn-warning">Edit</button>
                                </form>
                            </td>

                            <td>
                                <form method="POST" action="{{ route('editIncomExpences') }}" style="display: flex;">
                                    @csrf
                                    <input type="hidden" name="incomeId" value="{{$incomeItem->incomeId}}">
                                    <input type="hidden" name="type" value="incomeDescription" class="formcontrole">
                                    <input type="text" required name="description" value="{{$incomeItem->Description}}" class="form-control btn-block">
                                    <button type="submit" onclick="return confirm('Are you sure you want to do that?');" class="btn btn-warning">Edit</button>
                                </form>
                            </td>
                            <td>{{$incomeItem->created_at}}</td>
                            <td>
                                <form method="POST" action="{{ route('deleteIncomExpences') }}">
                                    @csrf
                                    <input type="hidden" name="incomeId" value="{{$incomeItem->incomeId}}">
                                    <input type="hidden" name="type" value="income" class="formcontrole">
                                    <button type="submit" onclick="return confirm('Are you sure you want to do that?');" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

         <!-- Modal -->
         <div id="reportModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="GET" action="{{route('incomeExpencesReoprt')}}">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <lable>Start Date</lable>
                                    <br/>
                                    <input type="date" required name="strDate" class="form-control btn-block">
                                </div>
                                <div class="col-md-6 ">
                                    <lable>End Date</lable>
                                    <br/>
                                    <input type="date" required name="endDate" class="form-control btn-block">
                                    <input type="hidden" name="type" value="income" class="formcontrole">
                                </div>
                                <div class="col-md-12">
                                    <lable style="visibility: hidden;">...</lable>
                                    <br/>
                                    <button type="submit" class="btn btn-primary btn-block">Downlaod</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>



    </div>
    <!-- /.container-fluid -->



    @endsection('income')